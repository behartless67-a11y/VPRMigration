<?php
/**
 * Make Submissions page content editable via WordPress admin
 * This moves the content from the template to the WordPress page editor
 */

require_once('wp-load.php');

// Find the Submissions page
$page = get_page_by_path('submissions');

if (!$page) {
    die("<h1>Error: Submissions page not found</h1>");
}

// Set the content that users can edit
$content = <<<'EOD'
<p>Thank you for your interest in Virginia Policy Review! Submissions for the 2025-2026 Journal will open soon!</p>

<h2>Research Article</h2>
<p>These articles are typically longer and reflect some kind of research in a particular policy area of interest. This can include an empirical analysis of a government program or a case study of some kind. These articles can take a position, make recommendations, or suggest specific improvements to a particular program or policy. Length may vary, but they must be no longer than 7000 words. Please also include an abstract no longer than 250 words and a short biography on each author no longer than 100 words.</p>

<h2>Commentary/Op-ed</h2>
<p>These entries are generally shorter and are intended to reflect different perspectives on a particular issue. These articles should take a position on a particular topic and must be no longer than 2,000 words. Please include a short biography no longer than 100 words on each author.</p>

<h2>Citations</h2>
<p>All citations must follow the APA or Chicago Citation Style.</p>

<h2>Style</h2>
<ul>
<li>Use Times New Roman font in 12pt.</li>
<li>Double-space your submission.</li>
</ul>

<h2>2025-2026 theme: "Policy for the Public Good."</h2>

<p style="margin-top: 3rem; padding: 1.5rem; background: #f8f9fa; border-left: 4px solid #e57200;">For more information, email Executive Editor Sarah King and Managing Editor George Langhammer.</p>
EOD;

// Update the page content
wp_update_post([
    'ID' => $page->ID,
    'post_content' => $content
]);

echo "<h1>✓ Success!</h1>";
echo "<p>The Submissions page content is now editable in WordPress admin.</p>";
echo "<p>Your team can edit it at: <a href='/wp-admin/post.php?post={$page->ID}&action=edit'>Edit Submissions Page</a></p>";
echo "<p><strong>Now I need to update the template to display this content...</strong></p>";
echo "<p>Delete this file after use.</p>";
?>
