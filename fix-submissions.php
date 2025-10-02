<?php
/**
 * Fix Submissions page template assignment
 * Upload to public_html/ and visit: https://keq.lpf.mybluehost.me/fix-submissions.php
 */

require_once('wp-load.php');

// Find the Submissions page
$page = get_page_by_path('submissions');

if ($page) {
    // Update to correct template
    update_post_meta($page->ID, '_wp_page_template', 'page-journal-submissions.php');
    echo "<h1>✓ Fixed!</h1>";
    echo "<p>Submissions page now uses the correct template: page-journal-submissions.php</p>";
    echo "<p><a href='/submissions'>View Submissions Page</a></p>";
    echo "<p><strong>Now delete this file for security.</strong></p>";
} else {
    echo "<h1>Error</h1>";
    echo "<p>Submissions page not found.</p>";
}
?>
