<?php
/**
 * Migrate ALL articles from old VPR site - All categories
 * Upload to public_html/ and visit once
 * WARNING: This may take several minutes to complete
 */

set_time_limit(600); // 10 minutes
require_once('wp-load.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Migrating ALL Articles from Old VPR Site</h1>";
echo "<p><strong>This will take a few minutes. Please be patient...</strong></p>";

// Function to fetch URL with curl
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

// All categories from the old site
$categories = array(
    'Domestic',
    'Economics',
    'Education',
    'Electoral Politics',
    'Environment',
    'Gun Rights',
    'Health',
    'International',
    'Justice',
    'Law',
    'Politics',
    'Social',
    'Urban'
);

$total_imported = 0;
$total_skipped = 0;
$total_failed = 0;

foreach ($categories as $category_name) {
    $category_slug = strtolower(str_replace(' ', '-', $category_name));
    $category_url = "http://www.virginiapolicyreview.org/the-third-rail/category/{$category_slug}";

    echo "<h2 style='background: #232d4b; color: white; padding: 1rem;'>Processing Category: {$category_name}</h2>";
    echo "<p>URL: <a href='{$category_url}' target='_blank'>{$category_url}</a></p>";

    // Fetch the category page
    $html = fetch_url($category_url);

    if (!$html) {
        echo "<p style='color:red;'>✗ Failed to fetch category page. Skipping.</p><hr>";
        continue;
    }

    // Parse HTML to find articles
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    // Find all blog posts
    $posts = $xpath->query("//div[contains(@class, 'blog-post')]");

    echo "<p>Found {$posts->length} articles in this category.</p>";

    $imported = 0;
    $skipped = 0;

    foreach ($posts as $dom_post) {
        // Extract title and link
        $titleNode = $xpath->query(".//h2[@class='blog-title']/a", $dom_post)->item(0);
        if (!$titleNode) continue;

        $title = trim($titleNode->textContent);
        $link = $titleNode->getAttribute('href');

        // Make link absolute
        if (strpos($link, '//') === 0) {
            $link = 'http:' . $link;
        } elseif (strpos($link, 'http') !== 0) {
            $link = 'http://www.virginiapolicyreview.org' . $link;
        }

        echo "<h4>{$title}</h4>";

        // Check if article already exists - use direct DB query for accurate title matching
        global $wpdb;
        $existing_post = $wpdb->get_var($wpdb->prepare(
            "SELECT ID FROM {$wpdb->posts} WHERE post_title = %s AND post_type = 'post' AND post_status = 'publish'",
            $title
        ));

        if ($existing_post) {
            echo "<p style='color:orange;'>⚠ Already exists (ID: {$existing_post}). Skipping.</p>";
            $skipped++;
            continue;
        }

        // Fetch full article
        $article_html = fetch_url($link);

        if (!$article_html) {
            echo "<p style='color:red;'>✗ Failed to fetch article.</p>";
            $total_failed++;
            continue;
        }

        // Parse article content
        $article_dom = new DOMDocument();
        @$article_dom->loadHTML($article_html);
        $article_xpath = new DOMXPath($article_dom);

        // Extract date
        $dateNode = $article_xpath->query("//div[@class='blog-date']//span[@class='date-text']")->item(0);
        $date_str = $dateNode ? trim($dateNode->textContent) : date('Y-m-d');

        // Try to parse date
        $date_obj = DateTime::createFromFormat('n/j/Y', $date_str);
        if ($date_obj) {
            $post_date = $date_obj->format('Y-m-d H:i:s');
        } else {
            $post_date = date('Y-m-d H:i:s');
        }

        // Extract full content
        $content_nodes = $article_xpath->query("//div[@class='blog-body']//div[@class='paragraph']");

        if ($content_nodes->length == 0) {
            $content_nodes = $article_xpath->query("//div[@id='blog-post']//div[@class='paragraph']");
        }

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
            echo "<p style='color:red;'>✗ No content found.</p>";
            $total_failed++;
            continue;
        }

        // Get or create category
        $category = get_term_by('name', $category_name, 'category');
        if (!$category) {
            $new_cat = wp_insert_term($category_name, 'category');
            $category_id = $new_cat['term_id'];
        } else {
            $category_id = $category->term_id;
        }

        // Create the post
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
            echo "<p style='color:green;'>✓ Imported (ID: $post_id)</p>";
            $imported++;
            $total_imported++;
        } else {
            echo "<p style='color:red;'>✗ Failed to create post.</p>";
            $total_failed++;
        }

        // Be nice to the server
        usleep(500000); // 0.5 second delay
        flush();
        ob_flush();
    }

    echo "<p><strong>Category Summary:</strong> Imported: $imported, Skipped: $skipped</p>";
    $total_skipped += $skipped;
    echo "<hr>";
}

echo "<h2 style='background: #e57200; color: white; padding: 1rem;'>Migration Complete!</h2>";
echo "<div style='background: #f8f9fa; padding: 2rem; border-radius: 8px;'>";
echo "<p><strong style='font-size: 1.2rem;'>Total Statistics:</strong></p>";
echo "<ul style='font-size: 1.1rem;'>";
echo "<li><strong style='color: green;'>Imported:</strong> $total_imported articles</li>";
echo "<li><strong style='color: orange;'>Skipped:</strong> $total_skipped articles (already existed)</li>";
echo "<li><strong style='color: red;'>Failed:</strong> $total_failed articles</li>";
echo "</ul>";
echo "<p><a href='/wp-admin/edit.php' style='background: #232d4b; color: white; padding: 1rem 2rem; text-decoration: none; border-radius: 4px; display: inline-block; margin-top: 1rem;'>View All Posts in WordPress</a></p>";
echo "</div>";
echo "<p style='margin-top: 2rem;'><strong>⚠️ IMPORTANT: Delete this file immediately for security!</strong></p>";
?>
