<?php
/**
 * Template for Contact page
 */

get_header(); ?>

<main class="main-content">

    <!-- Hero Header with Background -->
    <section class="hero" style="min-height: 35vh; padding-top: 100px; padding-bottom: var(--spacing-lg);">
        <div class="container">
            <div class="text-center">
                <h1 style="font-size: clamp(2.5rem, 6vw, 4rem); margin-bottom: var(--spacing-sm); font-family: var(--font-secondary); color: var(--primary-color);">Contact Us</h1>
                <p style="font-size: 1.3rem; color: var(--text-primary); max-width: 800px; margin: 0 auto; font-family: var(--font-secondary);">
                    Get in touch with the Virginia Policy Review team
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section style="padding: var(--spacing-lg) 0;">
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
