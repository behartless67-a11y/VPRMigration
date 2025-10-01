<?php
/**
 * The header for Virginia Policy Review theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Crimson+Text:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header class="site-header" id="masthead">
        <div class="container">
            <div class="header-content">
                <div class="site-branding">
                    <?php if (is_front_page() && is_home()) : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <nav class="main-nav" id="site-navigation" aria-label="<?php esc_attr_e('Primary menu', 'vpr'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => 'vpr_fallback_menu',
                    ));
                    ?>
                </nav>

                <!-- Mobile menu toggle (add if implementing mobile menu) -->
                <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false" style="display: none;">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

<?php
/**
 * Fallback menu function
 */
function vpr_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . home_url('/') . '">Home</a></li>';
    echo '<li><a href="' . home_url('/about-us') . '">About Us</a></li>';
    echo '<li><a href="' . home_url('/the-third-rail') . '">The Third Rail</a></li>';
    echo '<li><a href="' . home_url('/academical') . '">Academical</a></li>';
    echo '<li><a href="' . home_url('/journal-issues') . '">Journal Issues</a></li>';
    echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
    echo '</ul>';
}
?>