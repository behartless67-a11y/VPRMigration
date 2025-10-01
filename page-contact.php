<?php
/**
 * Template for Contact page
 */

get_header(); ?>

<style>
/* Hide default header */
.site-header {
    display: none;
}

/* Ensure floating social is always visible */
.floating-social {
    display: flex !important;
    position: fixed !important;
    right: 20px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    flex-direction: column !important;
    gap: 15px !important;
    z-index: 1000 !important;
}

.floating-social .social-float-link {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 50px !important;
    height: 50px !important;
    background: var(--primary-color) !important;
    color: white !important;
    border-radius: 50% !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
}

.floating-social .social-float-link:hover {
    background: var(--accent-color) !important;
    transform: scale(1.1) !important;
    box-shadow: 0 6px 20px rgba(229, 114, 0, 0.4) !important;
}

.floating-social .social-float-link svg {
    width: 22px !important;
    height: 22px !important;
}

/* Reset main content padding */
.main-content {
    padding: 0;
}

/* Header Banner - Cornell Style */
.page-banner {
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 4rem 0 2rem;
    margin-top: 0;
}

.page-banner-content {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 2rem;
    text-align: center;
}

.page-banner h1 {
    font-family: var(--font-secondary);
    font-size: 5rem;
    color: var(--primary-color);
    font-weight: 800;
    margin-bottom: 0.3rem;
    line-height: 1;
}

.page-nav {
    display: flex;
    justify-content: center;
    gap: 2.5rem;
    margin-bottom: 0.5rem;
}

.page-nav a {
    font-family: var(--font-secondary);
    font-size: 1.2rem;
    color: var(--primary-color);
    text-decoration: none;
    position: relative;
    transition: color 0.3s ease;
    white-space: nowrap;
}

.page-nav a:hover {
    color: var(--accent-color);
}

.page-nav a::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--accent-color);
    transition: width 0.3s ease;
}

.page-nav a:hover::after {
    width: 100%;
}

.page-nav a.active {
    color: var(--accent-color);
}

.page-nav a.active::after {
    width: 100%;
}

.page-banner p {
    font-size: 1.4rem;
    color: var(--text-secondary);
    max-width: 1200px;
    margin: 0 auto;
    line-height: 1.3;
}
</style>

<main class="main-content">
    <!-- Page Banner - Cornell Style -->
    <section class="page-banner">
        <div class="page-banner-content">
            <h1 style="font-size: 6.5rem;">
                <span style="font-style: italic; color: var(--primary-color); font-size: 1.1em;">Virginia</span>
                <span style="font-weight: 800; color: var(--accent-color);"> Policy Review</span>
            </h1>
            <nav class="page-nav">
                <a href="<?php echo home_url('/'); ?>">Home</a>
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
                <a href="<?php echo home_url('/the-third-rail'); ?>">The Third Rail</a>
                <a href="<?php echo home_url('/academical'); ?>">Academical</a>
                <a href="<?php echo home_url('/contact'); ?>" class="active">Contact</a>
            </nav>
            <p>Get in touch with the Virginia Policy Review team</p>
        </div>
    </section>

    <!-- Contact Information -->
    <section style="padding: var(--spacing-lg) 0; background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-xl); max-width: 1000px; margin: 0 auto;">

                <!-- Contact Details -->
                <div style="background: var(--white); padding: var(--spacing-lg); border-radius: 16px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);">
                    <h2 style="color: var(--primary-color); margin-bottom: var(--spacing-md);">Get In Touch</h2>

                    <div style="margin-bottom: var(--spacing-md);">
                        <h3 style="color: var(--accent-color); font-size: 1.2rem; margin-bottom: 0.5rem;">Address</h3>
                        <p style="font-size: 1.1rem; line-height: 1.6; color: var(--text-primary);">
                            235 McCormick Rd.<br>
                            Charlottesville, VA 22904
                        </p>
                    </div>

                    <div style="margin-bottom: var(--spacing-md);">
                        <h3 style="color: var(--accent-color); font-size: 1.2rem; margin-bottom: 0.5rem;">Email</h3>
                        <p style="font-size: 1.1rem;">
                            <a href="mailto:contact@virginiapolicyreview.org" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                                contact@virginiapolicyreview.org
                            </a>
                        </p>
                    </div>

                    <div>
                        <h3 style="color: var(--accent-color); font-size: 1.2rem; margin-bottom: 0.5rem;">Social Media</h3>
                        <p style="font-size: 1.1rem;">
                            <a href="#" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                                Follow us on Instagram
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Submission Information -->
                <div style="background: var(--secondary-color); padding: var(--spacing-lg); border-radius: 16px;">
                    <h2 style="color: var(--primary-color); margin-bottom: var(--spacing-md);">Submit Your Work</h2>

                    <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: var(--spacing-md); font-family: var(--font-secondary);">
                        We welcome submissions of research articles, opinion pieces, and policy analysis from students and scholars.
                    </p>

                    <h3 style="color: var(--accent-color); font-size: 1.2rem; margin-bottom: 0.5rem;">Current Theme</h3>
                    <p style="font-size: 1.3rem; font-weight: 600; color: var(--primary-color); margin-bottom: var(--spacing-md);">
                        "Policy for the Public Good"<br>
                        <span style="font-size: 1rem; color: var(--text-secondary); font-weight: 400;">2025-26 Edition</span>
                    </p>

                    <a href="<?php echo home_url('/journal-issues'); ?>"
                       style="display: inline-block; background: var(--accent-color); color: white; padding: 1rem 2rem; text-decoration: none; border-radius: 8px; font-weight: 600; transition: var(--transition);">
                        Learn More About Submissions
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Join Our Mission -->
    <section style="padding: var(--spacing-xl) 0; background: var(--primary-color);">
        <div class="container">
            <div class="text-center" style="color: white;">
                <h2 style="color: white; margin-bottom: var(--spacing-md); font-size: clamp(2rem, 5vw, 3rem);">Join Our Mission</h2>
                <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto var(--spacing-lg); color: rgba(255, 255, 255, 0.9);">
                    Virginia Policy Review is always looking for dedicated students interested in policy research, writing, editing, and podcast production.
                </p>
                <a href="mailto:contact@virginiapolicyreview.org"
                   style="display: inline-block; background: var(--accent-color); color: white; padding: 1.2rem 2.5rem; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 1.1rem; transition: var(--transition);">
                    Contact Us to Get Involved
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
