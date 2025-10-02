<?php
/**
 * Migrate Domestic articles from old VPR site
 * Upload to public_html/ and visit once
 */

require_once('wp-load.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Migrating Domestic Articles from Old Site</h1>";
echo "<p>Fetching articles from old site...</p>";

// Function to fetch URL with curl
function fetch_url($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

// Fetch the domestic category page
$html = fetch_url('http://www.virginiapolicyreview.org/the-third-rail/category/domestic');

if (!$html) {
    die("<p style='color:red;'>Failed to fetch articles page.</p>");
}

// Parse HTML to find articles
$dom = new DOMDocument();
@$dom->loadHTML($html);
$xpath = new DOMXPath($dom);

// Find all blog posts
$posts = $xpath->query("//div[contains(@class, 'blog-post')]");

echo "<p>Found " . $posts->length . " articles to migrate.</p>";
echo "<hr>";

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

    echo "<h3>Processing: $title</h3>";
    echo "<p>URL: <a href='$link' target='_blank'>$link</a></p>";

    // Check if article already exists using WP_Query instead
    $existing_query = new WP_Query(array(
        'post_type' => 'post',
        'title' => $title,
        'posts_per_page' => 1
    ));

    if ($existing_query->have_posts()) {
        $existing_query->the_post();
        $existing_id = get_the_ID();
        wp_reset_postdata();
        echo "<p style='color:orange;'>⚠ Article already exists (ID: {$existing_id}). Skipping.</p>";
        $skipped++;
        echo "<hr>";
        continue;
    }

    // Fetch full article
    echo "<p>Fetching full article...</p>";
    $article_html = fetch_url($link);

    if (!$article_html) {
        echo "<p style='color:red;'>✗ Failed to fetch article content.</p>";
        echo "<hr>";
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

    // Extract full content - try multiple selectors
    $content_nodes = $article_xpath->query("//div[@class='blog-body']//div[@class='paragraph']");

    if ($content_nodes->length == 0) {
        // Try alternative selector
        $content_nodes = $article_xpath->query("//div[@id='blog-post']//div[@class='paragraph']");
    }

    if ($content_nodes->length == 0) {
        // Try getting all paragraphs in the blog content
        $content_nodes = $article_xpath->query("//div[contains(@class, 'blog-post')]//div[@class='paragraph']");
    }

    echo "<p>Found " . $content_nodes->length . " content blocks.</p>";

    $content = '';
    foreach ($content_nodes as $node) {
        $html = $article_dom->saveHTML($node);
        // Clean up the HTML
        $html = str_replace('<div class="paragraph">', '<p>', $html);
        $html = str_replace('</div>', '</p>', $html);
        $content .= $html . "\n";
    }

    if (empty($content)) {
        echo "<p style='color:red;'>✗ No content found.</p>";
        echo "<hr>";
        continue;
    }

    // Get or create Domestic category
    $category = get_term_by('name', 'Domestic', 'category');
    if (!$category) {
        $new_cat = wp_insert_term('Domestic', 'category');
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
        echo "<p style='color:green;'>✓ Article imported successfully! (ID: $post_id)</p>";
        echo "<p><a href='" . get_permalink($post_id) . "' target='_blank'>View Article</a> | ";
        echo "<a href='/wp-admin/post.php?post={$post_id}&action=edit' target='_blank'>Edit</a></p>";
        $imported++;
    } else {
        echo "<p style='color:red;'>✗ Failed to create post.</p>";
    }

    echo "<hr>";

    // Be nice to the server
    sleep(1);
}

echo "<h2>Migration Complete!</h2>";
echo "<p><strong>Imported:</strong> $imported articles</p>";
echo "<p><strong>Skipped:</strong> $skipped articles (already existed)</p>";
echo "<p><a href='/wp-admin/edit.php?category_name=domestic'>View Domestic Posts in WordPress</a></p>";
echo "<p><strong>Delete this file after use.</strong></p>";
?>
