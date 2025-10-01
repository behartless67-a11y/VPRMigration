<?php
/**
 * Virginia Policy Review Theme functions and definitions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function vpr_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'vpr'),
        'footer'  => esc_html__('Footer Menu', 'vpr'),
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for post formats
    add_theme_support('post-formats', array(
        'aside',
        'gallery',
        'quote',
        'status',
        'video',
        'audio',
        'link',
    ));
}
add_action('after_setup_theme', 'vpr_theme_setup');

/**
 * Enqueue scripts and styles
 */
function vpr_scripts() {
    // Main stylesheet
    wp_enqueue_style('vpr-style', get_stylesheet_uri(), array(), '1.0');

    // Google Fonts are loaded in header.php for performance

    // Main JavaScript file
    wp_enqueue_script('vpr-script', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'vpr_scripts');

/**
 * Register widget areas
 */
function vpr_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'vpr'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'vpr'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'vpr'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'vpr'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'vpr_widgets_init');

/**
 * Custom post types
 */
function vpr_custom_post_types() {
    // Articles/Blog Posts (using default 'post' type with custom categories)

    // Journal Issues
    register_post_type('journal_issue', array(
        'labels' => array(
            'name' => 'Journal Issues',
            'singular_name' => 'Journal Issue',
            'add_new' => 'Add New Issue',
            'add_new_item' => 'Add New Journal Issue',
            'edit_item' => 'Edit Journal Issue',
            'new_item' => 'New Journal Issue',
            'view_item' => 'View Journal Issue',
            'search_items' => 'Search Journal Issues',
            'not_found' => 'No journal issues found',
            'not_found_in_trash' => 'No journal issues found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'journal-issues'),
    ));

    // Podcast Episodes
    register_post_type('podcast_episode', array(
        'labels' => array(
            'name' => 'Podcast Episodes',
            'singular_name' => 'Podcast Episode',
            'add_new' => 'Add New Episode',
            'add_new_item' => 'Add New Podcast Episode',
            'edit_item' => 'Edit Podcast Episode',
            'new_item' => 'New Podcast Episode',
            'view_item' => 'View Podcast Episode',
            'search_items' => 'Search Podcast Episodes',
            'not_found' => 'No podcast episodes found',
            'not_found_in_trash' => 'No podcast episodes found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-microphone',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'podcast'),
    ));

    // Team Members
    register_post_type('team_member', array(
        'labels' => array(
            'name' => 'Team Members',
            'singular_name' => 'Team Member',
            'add_new' => 'Add New Member',
            'add_new_item' => 'Add New Team Member',
            'edit_item' => 'Edit Team Member',
            'new_item' => 'New Team Member',
            'view_item' => 'View Team Member',
            'search_items' => 'Search Team Members',
            'not_found' => 'No team members found',
            'not_found_in_trash' => 'No team members found in trash'
        ),
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    ));
}
add_action('init', 'vpr_custom_post_types');

/**
 * Custom taxonomies
 */
function vpr_custom_taxonomies() {
    // Article Categories (enhanced categories for The Third Rail)
    register_taxonomy('article_category', 'post', array(
        'labels' => array(
            'name' => 'Article Categories',
            'singular_name' => 'Article Category',
            'search_items' => 'Search Categories',
            'all_items' => 'All Categories',
            'edit_item' => 'Edit Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Category',
            'new_item_name' => 'New Category Name',
            'menu_name' => 'Article Categories',
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'category'),
    ));

    // Journal Issue Years
    register_taxonomy('journal_year', 'journal_issue', array(
        'labels' => array(
            'name' => 'Journal Years',
            'singular_name' => 'Journal Year',
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    ));
}
add_action('init', 'vpr_custom_taxonomies');

/**
 * Customize excerpt length
 */
function vpr_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'vpr_excerpt_length', 999);

/**
 * Customize excerpt more
 */
function vpr_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'vpr_excerpt_more');

/**
 * Add custom body classes
 */
function vpr_body_classes($classes) {
    // Add class if we're viewing the blog home
    if (is_home()) {
        $classes[] = 'blog-home';
    }

    // Add class for single blog posts
    if (is_singular('post')) {
        $classes[] = 'single-article';
    }

    return $classes;
}
add_filter('body_class', 'vpr_body_classes');

/**
 * Custom comment walker
 */
class VPR_Comment_Walker extends Walker_Comment {
    // Custom comment display can be implemented here
}

/**
 * Add custom fields support (if ACF is not available)
 */
function vpr_add_custom_fields() {
    add_meta_box(
        'article_details',
        'Article Details',
        'vpr_article_details_callback',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'vpr_add_custom_fields');

function vpr_article_details_callback($post) {
    wp_nonce_field('vpr_article_details', 'vpr_article_details_nonce');

    $featured = get_post_meta($post->ID, '_vpr_featured', true);
    $author_bio = get_post_meta($post->ID, '_vpr_author_bio', true);

    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="vpr_featured">Featured Article</label></th>';
    echo '<td><input type="checkbox" id="vpr_featured" name="vpr_featured" value="1"' . checked(1, $featured, false) . '></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="vpr_author_bio">Author Bio</label></th>';
    echo '<td><textarea id="vpr_author_bio" name="vpr_author_bio" rows="3" cols="50">' . esc_textarea($author_bio) . '</textarea></td>';
    echo '</tr>';
    echo '</table>';
}

function vpr_save_article_details($post_id) {
    if (!isset($_POST['vpr_article_details_nonce']) || !wp_verify_nonce($_POST['vpr_article_details_nonce'], 'vpr_article_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['vpr_featured'])) {
        update_post_meta($post_id, '_vpr_featured', 1);
    } else {
        delete_post_meta($post_id, '_vpr_featured');
    }

    if (isset($_POST['vpr_author_bio'])) {
        update_post_meta($post_id, '_vpr_author_bio', sanitize_textarea_field($_POST['vpr_author_bio']));
    }
}
add_action('save_post', 'vpr_save_article_details');

/**
 * Theme customizer
 */
function vpr_customize_register($wp_customize) {
    // Add theme options
    $wp_customize->add_section('vpr_theme_options', array(
        'title'    => __('VPR Theme Options', 'vpr'),
        'priority' => 120,
    ));

    // Featured articles count
    $wp_customize->add_setting('vpr_featured_count', array(
        'default'           => 6,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('vpr_featured_count', array(
        'label'    => __('Number of Featured Articles', 'vpr'),
        'section'  => 'vpr_theme_options',
        'type'     => 'number',
    ));

    // Contact email
    $wp_customize->add_setting('vpr_contact_email', array(
        'default'           => 'contact@virginiapolicyreview.org',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('vpr_contact_email', array(
        'label'   => __('Contact Email', 'vpr'),
        'section' => 'vpr_theme_options',
        'type'    => 'email',
    ));
}
add_action('customize_register', 'vpr_customize_register');

/**
 * Helper function to get featured articles
 */
function vpr_get_featured_articles($count = 6) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $count,
        'meta_query' => array(
            array(
                'key' => '_vpr_featured',
                'value' => '1',
                'compare' => '='
            )
        )
    );

    $featured_posts = get_posts($args);

    // If we don't have enough featured posts, fill with recent posts
    if (count($featured_posts) < $count) {
        $recent_args = array(
            'post_type' => 'post',
            'posts_per_page' => $count - count($featured_posts),
            'post__not_in' => wp_list_pluck($featured_posts, 'ID')
        );
        $recent_posts = get_posts($recent_args);
        $featured_posts = array_merge($featured_posts, $recent_posts);
    }

    return $featured_posts;
}

/**
 * Add admin styles
 */
function vpr_admin_styles() {
    echo '<style>
        .form-table th { width: 150px; }
        #article_details .form-table textarea { width: 100%; }
    </style>';
}
add_action('admin_head', 'vpr_admin_styles');
?>