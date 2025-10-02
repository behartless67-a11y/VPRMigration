<?php
/**
 * Upload this to Bluehost public_html/ and run once
 * Sets featured images for the 8 articles on homepage
 */

require_once('wp-load.php');

echo "<h1>Setting Featured Images for Homepage Articles</h1>";
echo "<p>This will download images from the theme directory and set them as featured images.</p>";

// Map article titles to image files
$article_images = array(
    'Voter ID and The Suppression of the Minority Vote' => 'voter-id.jpg',
    '2016 Presidential Election: What Happened?' => 'election-2016.jpg',
    'Inside the Ivory Tower After the Election' => 'university-tower.jpg',
    'Modernizing Manufacturing in the United States' => 'manufacturing.jpg',
    'Workers\' Rights on the High Seas' => 'cruise-workers.jpg',
    'Virginia\'s Coastal Resiliency' => 'coastal-erosion.jpg',
    'Should We Be Concerned About NATO?' => 'nato-alliance.jpg',
    'Trump Administration Makes Moves towards Asia' => 'asia-diplomacy.jpg'
);

$images_set = 0;
$images_skipped = 0;
$images_failed = 0;

foreach ($article_images as $title => $image_file) {
    echo "<h2>Processing: $title</h2>";

    // Find post by title (using direct DB query for better matching)
    global $wpdb;
    $post = $wpdb->get_row($wpdb->prepare(
        "SELECT ID FROM {$wpdb->posts} WHERE post_title = %s AND post_type = 'post' AND post_status = 'publish' LIMIT 1",
        $title
    ));

    if (!$post) {
        echo "<p style='color:red;'>❌ Post not found</p>";
        $images_failed++;
        continue;
    }

    $post_id = $post->ID;
    echo "<p>✓ Found post ID: $post_id</p>";

    // Check if already has featured image
    if (has_post_thumbnail($post_id)) {
        echo "<p style='color:orange;'>⚠ Already has featured image, skipping</p>";
        $images_skipped++;
        continue;
    }

    // Image path in theme
    $image_path = get_template_directory() . '/images/' . $image_file;

    if (!file_exists($image_path)) {
        echo "<p style='color:red;'>❌ Image not found in theme: $image_file</p>";
        $images_failed++;
        continue;
    }

    echo "<p>✓ Found image: $image_file</p>";

    // Upload to media library
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_path);
    $filename = basename($image_file);

    if (wp_mkdir_p($upload_dir['path'])) {
        $file = $upload_dir['path'] . '/' . $filename;
    } else {
        $file = $upload_dir['basedir'] . '/' . $filename;
    }

    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null);

    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );

    $attach_id = wp_insert_attachment($attachment, $file, $post_id);

    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata($attach_id, $file);
    wp_update_attachment_metadata($attach_id, $attach_data);

    set_post_thumbnail($post_id, $attach_id);

    echo "<p style='color:green;'>✓ Featured image set successfully!</p>";
    $images_set++;
}

echo "<hr>";
echo "<h2>Summary:</h2>";
echo "<p>✅ Images set: $images_set</p>";
echo "<p>⚠ Images skipped: $images_skipped</p>";
echo "<p>❌ Images failed: $images_failed</p>";
echo "<p><strong>Photo credits:</strong> All images from Pexels.com (free for commercial use)</p>";
?>
