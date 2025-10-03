<?php
/**
 * Update featured images for the 8 most recent posts
 */

require_once('/home3/keqlpfmy/public_html/wp-load.php');

echo "<h1>Updating Featured Images for 8 Recent Articles</h1>";

// Get theme directory
$theme_dir = get_stylesheet_directory();

// Map of post titles to new images with photographer credits
$image_map = array(
    'Hiring: Color-Blind Judge, 77002' => array(
        'file' => 'judge-gavel-justice.jpg',
        'credit' => 'Photo by Tingey Injury Law Firm on Unsplash'
    ),
    'The Bureau of Spousal Assignment: Could Recent Economic Research Solve Both Loneliness and Income Inequality?' => array(
        'file' => 'economics-charts.jpg',
        'credit' => 'Photo by Lukas Blazek on Unsplash'
    ),
    'Ending the Welfare Cycle' => array(
        'file' => 'welfare-family.jpg',
        'credit' => 'Photo by Nappy on Unsplash'
    ),
    'The Problem with Trying: What James Piereson and Naomi Riley Got Horribly Wrong' => array(
        'file' => 'policy-research.jpg',
        'credit' => 'Photo by Dmitry Ratushny on Unsplash'
    ),
    'Gritty Educations' => array(
        'file' => 'education-technology.jpg',
        'credit' => 'Photo by Marvin Meyer on Unsplash'
    ),
    'Yes WE Ban: Millennials, Twitter, and Erdogan's Folly' => array(
        'file' => 'social-media-phones.jpg',
        'credit' => 'Photo by dole777 on Unsplash'
    ),
    'A Cure for the Common Crimea' => array(
        'file' => 'ukraine-flag.jpg',
        'credit' => 'Photo by Christian Lue on Unsplash'
    ),
    'Of Unions and Dictators: A Better Way Forward' => array(
        'file' => 'labor-unions.jpg',
        'credit' => 'Photo by Ant Rozetsky on Unsplash'
    )
);

// Get 8 recent articles
$recent_articles = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC'
));

if ($recent_articles->have_posts()) {
    while ($recent_articles->have_posts()) {
        $recent_articles->the_post();
        $post_id = get_the_ID();
        $title = get_the_title();

        echo "<h3>Processing: $title (ID: $post_id)</h3>";

        if (isset($image_map[$title])) {
            $image_file = $theme_dir . '/images/' . $image_map[$title]['file'];
            $credit = $image_map[$title]['credit'];

            if (file_exists($image_file)) {
                // Upload image to WordPress media library
                $upload_file = wp_upload_bits(basename($image_file), null, file_get_contents($image_file));

                if (!$upload_file['error']) {
                    $wp_filetype = wp_check_filetype(basename($upload_file['file']), null);

                    $attachment = array(
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title' => preg_replace('/\.[^.]+$/', '', basename($upload_file['file'])),
                        'post_content' => $credit,
                        'post_status' => 'inherit'
                    );

                    $attach_id = wp_insert_attachment($attachment, $upload_file['file'], $post_id);
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data = wp_generate_attachment_metadata($attach_id, $upload_file['file']);
                    wp_update_attachment_metadata($attach_id, $attach_data);

                    // Set as featured image
                    set_post_thumbnail($post_id, $attach_id);

                    echo "<p style='color:green;'>✓ Featured image set: {$image_map[$title]['file']}</p>";
                    echo "<p style='font-size:0.9em;'>$credit</p>";
                } else {
                    echo "<p style='color:red;'>✗ Error uploading: {$upload_file['error']}</p>";
                }
            } else {
                echo "<p style='color:red;'>✗ Image file not found: $image_file</p>";
            }
        } else {
            echo "<p style='color:orange;'>⊘ No image mapping for this article</p>";
        }
    }
    wp_reset_postdata();
}

echo "<h2 style='color:green;'>Done! All featured images updated.</h2>";
echo "<p><a href='/'>View Homepage</a></p>";
?>
