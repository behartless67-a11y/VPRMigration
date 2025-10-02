<?php
/**
 * Migrate COMPLETE archive from old VPR site - all articles from 2014-2025
 * Upload to public_html/ and visit once
 * WARNING: This will take 10-20 minutes and import 200+ articles
 */

set_time_limit(1200); // 20 minutes
ini_set('max_execution_time', 1200);
require_once('wp-load.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Migrating COMPLETE Third Rail Archive (2014-2025)</h1>";
echo "<p><strong>This will take 15-20 minutes. DO NOT close this page!</strong></p>";
echo "<p>Started at: " . date('g:i:s A') . "</p>";
flush();
ob_flush();

// Function to fetch URL
function fetch_url($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

// Get all archive pages
$archive_urls = array(
    '/the-third-rail/archives/03-2025', '/the-third-rail/archives/02-2025', '/the-third-rail/archives/01-2025',
    '/the-third-rail/archives/04-2022', '/the-third-rail/archives/03-2022', '/the-third-rail/archives/02-2022',
    '/the-third-rail/archives/12-2021', '/the-third-rail/archives/11-2021', '/the-third-rail/archives/10-2021',
    '/the-third-rail/archives/06-2021', '/the-third-rail/archives/05-2021', '/the-third-rail/archives/04-2021',
    '/the-third-rail/archives/03-2021', '/the-third-rail/archives/02-2021', '/the-third-rail/archives/01-2021',
    '/the-third-rail/archives/12-2020', '/the-third-rail/archives/11-2020', '/the-third-rail/archives/10-2020',
    '/the-third-rail/archives/05-2019', '/the-third-rail/archives/03-2019', '/the-third-rail/archives/02-2019',
    '/the-third-rail/archives/01-2019', '/the-third-rail/archives/10-2018', '/the-third-rail/archives/09-2018',
    '/the-third-rail/archives/03-2017', '/the-third-rail/archives/02-2017', '/the-third-rail/archives/01-2017',
    '/the-third-rail/archives/11-2016', '/the-third-rail/archives/10-2016', '/the-third-rail/archives/09-2016',
    '/the-third-rail/archives/08-2016', '/the-third-rail/archives/04-2016', '/the-third-rail/archives/03-2016',
    '/the-third-rail/archives/02-2016', '/the-third-rail/archives/12-2015', '/the-third-rail/archives/11-2015',
    '/the-third-rail/archives/10-2015', '/the-third-rail/archives/09-2015', '/the-third-rail/archives/03-2015',
    '/the-third-rail/archives/02-2015', '/the-third-rail/archives/01-2015', '/the-third-rail/archives/12-2014',
    '/the-third-rail/archives/11-2014', '/the-third-rail/archives/10-2014', '/the-third-rail/archives/09-2014',
    '/the-third-rail/archives/08-2014', '/the-third-rail/archives/07-2014', '/the-third-rail/archives/04-2014',
    '/the-third-rail/archives/03-2014', '/the-third-rail/archives/02-2014'
);

$total_imported = 0;
$total_skipped = 0;
$total_failed = 0;
$archives_processed = 0;

foreach ($archive_urls as $archive_path) {
    $archives_processed++;
    $archive_url = "http://www.virginiapolicyreview.org" . $archive_path;

    echo "<h3 style='background: #232d4b; color: white; padding: 0.5rem;'>[$archives_processed/" . count($archive_urls) . "] {$archive_path}</h3>";
    flush();
    ob_flush();

    $html = fetch_url($archive_url);
    if (!$html) {
        echo "<p style='color:red;'>✗ Failed to fetch</p>";
        continue;
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    $posts = $xpath->query("//div[contains(@class, 'blog-post')]");

    echo "<p>Found {$posts->length} articles</p>";

    foreach ($posts as $dom_post) {
        $titleNode = $xpath->query(".//h2[@class='blog-title']/a", $dom_post)->item(0);
        if (!$titleNode) continue;

        $title = trim($titleNode->textContent);
        $link = $titleNode->getAttribute('href');

        if (strpos($link, '//') === 0) {
            $link = 'http:' . $link;
        } elseif (strpos($link, 'http') !== 0) {
            $link = 'http://www.virginiapolicyreview.org' . $link;
        }

        // Check if exists
        global $wpdb;
        $existing_post = $wpdb->get_var($wpdb->prepare(
            "SELECT ID FROM {$wpdb->posts} WHERE post_title = %s AND post_type = 'post'",
            $title
        ));

        if ($existing_post) {
            echo "⚠ ";
            $total_skipped++;
            flush();
            ob_flush();
            continue;
        }

        // Fetch article
        $article_html = fetch_url($link);
        if (!$article_html) {
            echo "✗ ";
            $total_failed++;
            flush();
            ob_flush();
            continue;
        }

        $article_dom = new DOMDocument();
        @$article_dom->loadHTML($article_html);
        $article_xpath = new DOMXPath($article_dom);

        // Extract date
        $dateNode = $article_xpath->query("//div[@class='blog-date']//span[@class='date-text']")->item(0);
        $date_str = $dateNode ? trim($dateNode->textContent) : '';

        $date_obj = DateTime::createFromFormat('n/j/Y', $date_str);
        $post_date = $date_obj ? $date_obj->format('Y-m-d H:i:s') : date('Y-m-d H:i:s');

        // Extract content
        $content_nodes = $article_xpath->query("//div[@class='blog-body']//div[@class='paragraph']");
        if ($content_nodes->length == 0) {
            $content_nodes = $article_xpath->query("//div[contains(@class, 'blog-post')]//div[@class='paragraph']");
        }

        $content = '';
        foreach ($content_nodes as $node) {
            $html_content = $article_dom->saveHTML($node);
            $html_content = str_replace('<div class="paragraph">', '<p>', $html_content);
            $html_content = str_replace('</div>', '</p>', $html_content);
            $content .= $html_content . "\n";
        }

        if (empty($content)) {
            echo "✗ ";
            $total_failed++;
            flush();
            ob_flush();
            continue;
        }

        // Extract category from article page
        $categoryNode = $article_xpath->query("//div[@class='blog-category']//a")->item(0);
        $category_name = $categoryNode ? trim($categoryNode->textContent) : 'Uncategorized';

        // Get or create category
        $category = get_term_by('name', $category_name, 'category');
        if (!$category) {
            $new_cat = wp_insert_term($category_name, 'category');
            $category_id = is_array($new_cat) ? $new_cat['term_id'] : 0;
        } else {
            $category_id = $category->term_id;
        }

        // Create post
        $post_data = array(
            'post_title'    => $title,
            'post_content'  => $content,
            'post_status'   => 'publish',
            'post_type'     => 'post',
            'post_category' => array($category_id),
            'post_date'     => $post_date,
            'post_author'   => 1
        );

        $post_id = wp_insert_post($post_data);

        if ($post_id) {
            echo "✓ ";
            $total_imported++;
        } else {
            echo "✗ ";
            $total_failed++;
        }

        flush();
        ob_flush();
        usleep(300000); // 0.3 second delay
    }

    echo "<br>";
    flush();
    ob_flush();
}

echo "<h2 style='background: #e57200; color: white; padding: 1rem; margin-top: 2rem;'>Migration Complete!</h2>";
echo "<div style='background: #f8f9fa; padding: 2rem; border-radius: 8px;'>";
echo "<p>Finished at: " . date('g:i:s A') . "</p>";
echo "<p><strong style='font-size: 1.3rem;'>Final Statistics:</strong></p>";
echo "<ul style='font-size: 1.2rem; line-height: 2;'>";
echo "<li><strong style='color: green;'>✓ Imported:</strong> $total_imported articles</li>";
echo "<li><strong style='color: orange;'>⚠ Skipped:</strong> $total_skipped articles (already existed)</li>";
echo "<li><strong style='color: red;'>✗ Failed:</strong> $total_failed articles</li>";
echo "<li><strong>Total Processed:</strong> " . ($total_imported + $total_skipped + $total_failed) . " articles</li>";
echo "</ul>";
echo "<p><a href='/wp-admin/edit.php' style='background: #232d4b; color: white; padding: 1rem 2rem; text-decoration: none; border-radius: 4px; display: inline-block; margin-top: 1rem; font-size: 1.1rem;'>View All Posts in WordPress →</a></p>";
echo "</div>";
echo "<p style='margin-top: 2rem; color: red; font-weight: bold;'>⚠️ DELETE THIS FILE IMMEDIATELY!</p>";
?>
