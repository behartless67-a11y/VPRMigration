<?php
/**
 * Script to create missing WordPress pages with templates
 * Upload to public_html/ and run once by visiting: https://keq.lpf.mybluehost.me/create-pages.php
 */

// Load WordPress
require_once('wp-load.php');

// Pages to create with their templates
$pages = array(
    array(
        'post_title'    => 'About Us',
        'post_name'     => 'about-us',
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'page_template' => 'page-about-us.php'
    ),
    array(
        'post_title'    => 'The Third Rail',
        'post_name'     => 'the-third-rail',
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'page_template' => 'page-third-rail.php'
    ),
    array(
        'post_title'    => 'Academical',
        'post_name'     => 'academical',
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'page_template' => 'page-academical.php'
    ),
    array(
        'post_title'    => 'Submissions',
        'post_name'     => 'submissions',
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'page_template' => 'page-journal-submissions.php'
    ),
    array(
        'post_title'    => 'Contact',
        'post_name'     => 'contact',
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'page_template' => 'page-contact.php'
    )
);

echo "<h1>Creating WordPress Pages</h1>";
echo "<ul>";

foreach ($pages as $page) {
    // Check if page already exists
    $existing = get_page_by_path($page['post_name']);

    if ($existing) {
        echo "<li><strong>{$page['post_title']}</strong>: Already exists (ID: {$existing->ID})</li>";
        // Update template
        update_post_meta($existing->ID, '_wp_page_template', $page['page_template']);
    } else {
        // Create the page
        $page_id = wp_insert_post($page);

        if ($page_id) {
            // Set the template
            update_post_meta($page_id, '_wp_page_template', $page['page_template']);
            echo "<li><strong>{$page['post_title']}</strong>: Created successfully (ID: {$page_id})</li>";
        } else {
            echo "<li><strong>{$page['post_title']}</strong>: Failed to create</li>";
        }
    }
}

echo "</ul>";
echo "<h2>Done! Now delete this file for security.</h2>";
echo "<p>Visit your pages:</p>";
echo "<ul>";
echo "<li><a href='/about-us'>About Us</a></li>";
echo "<li><a href='/the-third-rail'>The Third Rail</a></li>";
echo "<li><a href='/academical'>Academical</a></li>";
echo "<li><a href='/submissions'>Submissions</a></li>";
echo "<li><a href='/contact'>Contact</a></li>";
echo "</ul>";
?>
