<?php
/**
 * Create the Undersea Cable article as a WordPress post
 * Upload to public_html/ and visit once
 */

require_once('wp-load.php');

// Article content
$content = <<<'EOD'
<h2>Executive Summary</h2>
<p>Protecting the global network of undersea cables is vital to U.S. national security and global stability. Malign actors can easily target these cables, disrupting the flow of information sharing between the U.S. and its allies. This disruption creates an avenue for competition between the U.S. and its adversaries. Every day, an estimated $10 trillion USD worth of financial transactions flows through undersea cables, as well as 99% of all internet traffic. The importance of securing these cables was highlighted in March 2024, when three damaged undersea cables in the Red Sea affected 25% of internet traffic in the region. Whether intentional or not, this incident called attention to the strategic importance of these cables and the ambiguity surrounding cable regulation, protection, and maintenance.</p>

<h2>Current Landscape</h2>
<p>The current global network of undersea cables is over 750 million miles long, running through various international waters. This makes regulation and risk management more difficult because of the intersection of countries' legal jurisdictions. There have been multiple international conventions to define maritime neutrality and protections for underwater cables, but these structures can be tested in international waters or in times of armed conflict. Holding malign actors accountable can be challenging in the event that a damaged cable affects a country's sovereignty or internet access. This enables those actors to damage neutral cables as means to hurt their adversaries during a period of conflict.</p>

<p>The War in Ukraine highlights threats to undersea cables. Russia relies far less on undersea cables than the U.S. or China, but remains capable of damaging the cables to further antagonize its adversaries. Houthi rebels in Yemen could also target cables in the Red Sea as part of their conflict with the UN-backed Yemeni government and their extended effort against Israel's war in Palestine. The Houthis' ability to damage these cables is uncertain, representing their threat to Western nations and their extended efforts in the Middle East.</p>

<p>Undersea cables are critical to the U.S.'s great power competition with China. Over the past 15 years, the Chinese telecommunications company Huawei has grown into the fourth largest company in undersea cable manufacturing. Huawei is backed by the Chinese government, and has received scrutiny from the international community and US economic sanctions. The US has also pushed for countries to partner with SubCom, an American undersea cable producer, over Huawei. This is in part due to ongoing fears of the Chinese government's ability to tap into undersea cables and gain access to vast amounts of public and private information. Firms such as Google, Amazon, and Meta are also making stronger investments in their undersea cable infrastructure. This is not an issue when they partner with the U.S., but partnership opportunities that arise with international adversaries like China can complicate the U.S. government's relationship with these companies.</p>

<h2>Conclusion</h2>
<p>Undersea cables are critical to U.S. national security and global stability. Malign actors, including Russia and regional groups like the Houthi rebels, pose significant threats to these cables, which are difficult to protect due to jurisdictional challenges. The growing competition between the U.S. and China over undersea cable infrastructure, particularly with Huawei's involvement, further complicates the security landscape and highlights the need for stronger protections.</p>

<div style="margin-top: 3rem; padding: 2rem; background: #f8f9fa; border-left: 4px solid var(--accent-color); border-radius: 4px;">
<h3 style="font-family: 'Crimson Text', serif; font-size: 1.3rem; color: var(--primary-color); margin-bottom: 0.5rem;">Carlos Olivares</h3>
<p style="margin-bottom: 0; line-height: 1.7;">Carlos Olivares is a second year Master of Public Policy student at the Batten School for Leadership and Public Policy, who previously graduated from UVA in December 2022 with a major in foreign affairs. Carlos is interested in nuclear policy and has worked with the Alliance for Nuclear Accountability the past three years coordinating their annual lobbying days in Washington DC. He has also previously interned at the US Department of State, and hopes to pursue a career in national security or diplomacy.</p>
</div>

<div style="margin-top: 2rem; padding: 1.5rem; background: #fff9e6; border: 1px solid #ffd966; border-radius: 4px; font-size: 0.9rem; line-height: 1.6; color: #666;">
<p style="margin: 0;">The views expressed above are solely the author's and are not endorsed by the Virginia Policy Review, The Frank Batten School of Leadership and Public Policy, or the University of Virginia. Although this organization has members who are University of Virginia students and may have University employees associated or engaged in its activities and affairs, the organization is not a part of or an agency of the University. It is a separate and independent organization which is responsible for and manages its own activities and affairs. The University does not direct, supervise or control the organization and is not responsible for the organization's contracts, acts, or omissions.</p>
</div>
EOD;

// Check if Security category exists, if not create it
$category = get_term_by('name', 'Security', 'category');
if (!$category) {
    $category_id = wp_create_category('Security');
} else {
    $category_id = $category->term_id;
}

// Check if post already exists
$existing_post = get_page_by_title('Current Landscape and Challenges With Undersea Cable Infrastructure', OBJECT, 'post');

if ($existing_post) {
    echo "<h1>Article Already Exists!</h1>";
    echo "<p>Post ID: {$existing_post->ID}</p>";
    echo "<p><a href='" . get_permalink($existing_post->ID) . "'>View Article</a></p>";
} else {
    // Create the post
    $post_data = array(
        'post_title'    => 'Current Landscape and Challenges With Undersea Cable Infrastructure',
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_type'     => 'post',
        'post_category' => array($category_id),
        'post_date'     => '2025-02-19 00:00:00',
        'post_author'   => 1
    );

    $post_id = wp_insert_post($post_data);

    if ($post_id) {
        // Set featured image if undersea-cable.jpg exists
        $image_path = get_template_directory() . '/images/undersea-cable.jpg';
        if (file_exists($image_path)) {
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/media.php');

            $attachment_id = media_sideload_image($image_path, $post_id, 'Undersea Cable Infrastructure', 'id');
            if (!is_wp_error($attachment_id)) {
                set_post_thumbnail($post_id, $attachment_id);
            }
        }

        echo "<h1 style='color: green;'>✓ Article Created Successfully!</h1>";
        echo "<p>Post ID: {$post_id}</p>";
        echo "<p>Category: Security</p>";
        echo "<p>Date: February 19, 2025</p>";
        echo "<p><strong><a href='" . get_permalink($post_id) . "'>View Article</a></strong></p>";
        echo "<p><strong><a href='/wp-admin/post.php?post={$post_id}&action=edit'>Edit in WordPress</a></strong></p>";
        echo "<hr>";
        echo "<p>Now update the slideshow link in front-page.php to point to: <code>" . get_permalink($post_id) . "</code></p>";
        echo "<p><strong>Delete this file after use.</strong></p>";
    } else {
        echo "<h1 style='color: red;'>✗ Failed to Create Article</h1>";
    }
}
?>
