<?php
/**
 * Fix article title capitalization using AP/Chicago title case
 * Upload to public_html/ and run once
 */

require_once('wp-load.php');

echo "<h1>Fixing Article Title Capitalization</h1>";
echo "<p>Converting all article titles to proper title case...</p>";

// Title case function following AP/Chicago style
function proper_title_case($title) {
    // Words that should be lowercase (unless first/last word)
    $lowercase_words = array(
        'a', 'an', 'and', 'as', 'at', 'but', 'by', 'for', 'from', 'in', 'into',
        'nor', 'of', 'on', 'or', 'so', 'the', 'to', 'up', 'via', 'with', 'vs'
    );

    // Split into words
    $words = explode(' ', $title);
    $result = array();

    foreach ($words as $i => $word) {
        // Skip empty words
        if (empty($word)) continue;

        // Check for hyphenated words
        if (strpos($word, '-') !== false) {
            $parts = explode('-', $word);
            foreach ($parts as $j => $part) {
                if ($j === 0 || strlen($part) > 3) {
                    $parts[$j] = ucfirst(strtolower($part));
                }
            }
            $word = implode('-', $parts);
        }
        // First or last word - always capitalize
        else if ($i === 0 || $i === count($words) - 1) {
            $word = ucfirst(strtolower($word));
        }
        // Acronyms/abbreviations (all caps, 2-4 letters)
        else if (strlen($word) <= 4 && strtoupper($word) === $word && ctype_alpha($word)) {
            $word = strtoupper($word);
        }
        // Check if it's a lowercase word
        else if (in_array(strtolower($word), $lowercase_words)) {
            $word = strtolower($word);
        }
        // Regular word - capitalize first letter
        else {
            $word = ucfirst(strtolower($word));
        }

        $result[] = $word;
    }

    return implode(' ', $result);
}

// Get all posts
$all_posts = get_posts(array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
));

echo "<p>Found " . count($all_posts) . " articles to process.</p>";
echo "<hr>";

$updated = 0;
$unchanged = 0;

foreach ($all_posts as $post) {
    $old_title = $post->post_title;
    $new_title = proper_title_case($old_title);

    // Skip if title hasn't changed
    if ($old_title === $new_title) {
        $unchanged++;
        continue;
    }

    echo "<div style='margin-bottom: 1.5rem;'>";
    echo "<p><strong>ID: " . $post->ID . "</strong></p>";
    echo "<p style='color: #666;'>Old: " . esc_html($old_title) . "</p>";
    echo "<p style='color: green;'>New: " . esc_html($new_title) . "</p>";

    // Update the post
    wp_update_post(array(
        'ID' => $post->ID,
        'post_title' => $new_title
    ));

    echo "<p style='color: green;'>✓ Updated</p>";
    echo "</div>";

    $updated++;
}

echo "<hr>";
echo "<h2>Summary</h2>";
echo "<p>✅ Updated: <strong>$updated</strong> articles</p>";
echo "<p>⚠ Unchanged: <strong>$unchanged</strong> articles</p>";
echo "<p><a href='/'>← Back to homepage</a></p>";
?>
