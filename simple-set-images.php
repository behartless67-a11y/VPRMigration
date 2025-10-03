<?php
/**
 * Simple script to set featured images
 * Upload to public_html, then visit this file
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load WordPress
if (file_exists('wp-load.php')) {
    require_once('wp-load.php');
} else {
    die('wp-load.php not found. Make sure this file is in your public_html directory.');
}

echo "<h1>Set Featured Images for 8 Recent Posts</h1>";

// Get the 8 most recent posts
$posts = get_posts(array(
    'numberposts' => 8,
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC'
));

if (empty($posts)) {
    die('No posts found.');
}

// Manual image assignment by title
$assignments = array(
    'Hiring: Color-Blind Judge, 77002' => 'judge-gavel-justice.jpg',
    'The Bureau of Spousal Assignment' => 'economics-charts.jpg',
    'Ending the Welfare Cycle' => 'welfare-family.jpg',
    'The Problem with Trying' => 'policy-research.jpg',
    'Gritty Educations' => 'education-technology.jpg',
    'Yes WE Ban' => 'social-media-phones.jpg',
    'A Cure for the Common Crimea' => 'ukraine-flag.jpg',
    'Of Unions and Dictators' => 'labor-unions.jpg'
);

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Post</th><th>Image File</th><th>Status</th></tr>";

foreach ($posts as $post) {
    $title = $post->post_title;
    $post_id = $post->ID;

    // Find matching image by partial title match
    $image_file = null;
    foreach ($assignments as $key => $file) {
        if (stripos($title, $key) !== false) {
            $image_file = $file;
            break;
        }
    }

    echo "<tr>";
    echo "<td><strong>$title</strong><br>(ID: $post_id)</td>";
    echo "<td>$image_file</td>";

    if ($image_file) {
        // Path to image in theme
        $image_path = get_stylesheet_directory() . '/images/' . $image_file;

        if (file_exists($image_path)) {
            // Check if already has this image
            $current_thumb = get_post_thumbnail_id($post_id);

            // Upload to media library
            $upload = wp_upload_bits($image_file, null, file_get_contents($image_path));

            if (!$upload['error']) {
                $attachment = array(
                    'post_mime_type' => 'image/jpeg',
                    'post_title' => sanitize_file_name($image_file),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );

                $attach_id = wp_insert_attachment($attachment, $upload['file'], $post_id);
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);
                wp_update_attachment_metadata($attach_id, $attach_data);

                set_post_thumbnail($post_id, $attach_id);

                echo "<td style='color:green;'>✓ Image set successfully!</td>";
            } else {
                echo "<td style='color:red;'>✗ Upload error: " . $upload['error'] . "</td>";
            }
        } else {
            echo "<td style='color:red;'>✗ Image file not found: $image_path</td>";
        }
    } else {
        echo "<td style='color:orange;'>⊘ No image assigned</td>";
    }

    echo "</tr>";
}

echo "</table>";

echo "<h2 style='color:green;'>Done!</h2>";
echo "<p><a href='/'>View Homepage</a></p>";
?>
