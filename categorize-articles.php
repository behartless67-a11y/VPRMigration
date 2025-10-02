<?php
/**
 * Auto-categorize articles based on keywords in title/content
 * Upload to public_html/ and run once
 */

require_once('wp-load.php');

echo "<h1>Auto-Categorizing Articles</h1>";
echo "<p>Assigning categories based on article content and keywords...</p>";

// Create categories if they don't exist
$categories = array(
    'Domestic' => 'Domestic policy and US internal affairs',
    'International' => 'Foreign policy and international relations',
    'Economics' => 'Economic policy, business, and finance',
    'Education' => 'Education policy and academic issues',
    'Environment' => 'Environmental policy and climate',
    'Healthcare' => 'Healthcare and public health policy',
    'Social Policy' => 'Social welfare, equality, and justice',
    'Security' => 'National security and defense',
    'Technology' => 'Technology policy and innovation'
);

echo "<h2>Creating Categories</h2>";
foreach ($categories as $cat_name => $description) {
    if (!term_exists($cat_name, 'category')) {
        wp_insert_term($cat_name, 'category', array('description' => $description));
        echo "<p>✓ Created: $cat_name</p>";
    } else {
        echo "<p>⚠ Already exists: $cat_name</p>";
    }
}

echo "<hr><h2>Categorizing Articles</h2>";

// Keyword mapping for auto-categorization
$keyword_categories = array(
    'International' => array('syria', 'israel', 'russia', 'ukraine', 'crimea', 'nato', 'erdogan', 'turkey', 'foreign', 'assad', 'middle east', 'asia', 'diplomatic', 'kremlin'),
    'Domestic' => array('voter', 'election', 'presidential', 'congress', 'trump', 'welfare', 'immigration', 'virginia'),
    'Economics' => array('economic', 'income', 'inequality', 'manufacturing', 'employment', 'job', 'worker', 'union', 'finance', 'poverty'),
    'Education' => array('education', 'school', 'university', 'student', 'academic', 'college', 'grit', 'classroom', 'policy school'),
    'Social Policy' => array('welfare', 'justice', 'judge', 'social', 'civil rights', 'discrimination', 'color-blind', 'marriage', 'spousal'),
    'Healthcare' => array('health', 'medical', 'hospital', 'disease', 'famine', 'humanitarian'),
    'Technology' => array('cable', 'infrastructure', 'cyber', 'internet', 'fiber optic', 'undersea', 'twitter', 'social media'),
    'Environment' => array('coastal', 'resiliency', 'climate', 'environment', 'sea level'),
    'Security' => array('nato', 'security', 'military', 'defense', 'terrorism')
);

// Get all uncategorized posts
$uncategorized_posts = get_posts(array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'category_name' => 'uncategorized'
));

echo "<p>Found " . count($uncategorized_posts) . " uncategorized articles.</p><hr>";

$categorized = 0;

foreach ($uncategorized_posts as $post) {
    echo "<div style='margin-bottom: 1.5rem; padding: 1rem; border: 1px solid #ddd;'>";
    echo "<p><strong>" . esc_html($post->post_title) . "</strong> (ID: " . $post->ID . ")</p>";

    // Get post content for analysis
    $search_text = strtolower($post->post_title . ' ' . $post->post_content);

    $matched_categories = array();

    // Check each category's keywords
    foreach ($keyword_categories as $category => $keywords) {
        foreach ($keywords as $keyword) {
            if (stripos($search_text, $keyword) !== false) {
                $matched_categories[$category] = isset($matched_categories[$category]) ? $matched_categories[$category] + 1 : 1;
                break; // One match per category is enough
            }
        }
    }

    if (empty($matched_categories)) {
        echo "<p style='color: orange;'>⚠ No category match found, leaving as Uncategorized</p>";
    } else {
        // Get the category with most keyword matches
        arsort($matched_categories);
        $best_category = array_key_first($matched_categories);

        // Get category ID
        $term = get_term_by('name', $best_category, 'category');

        if ($term) {
            // Remove Uncategorized
            $uncategorized_term = get_term_by('name', 'Uncategorized', 'category');
            wp_remove_object_terms($post->ID, $uncategorized_term->term_id, 'category');

            // Set new category
            wp_set_post_categories($post->ID, array($term->term_id));

            echo "<p style='color: green;'>✓ Categorized as: <strong>$best_category</strong></p>";
            $categorized++;
        }
    }

    echo "</div>";
}

echo "<hr>";
echo "<h2>Summary</h2>";
echo "<p>✅ Categorized: <strong>$categorized</strong> articles</p>";
echo "<p>⚠ Still uncategorized: <strong>" . (count($uncategorized_posts) - $categorized) . "</strong> articles</p>";
echo "<p><a href='/'>← Back to homepage</a></p>";
?>
