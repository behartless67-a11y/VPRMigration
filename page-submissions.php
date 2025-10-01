<?php
/**
 * Template Name: Submissions
 * Template for Journal Submissions page
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

.submission-box {
    background: var(--white);
    border: 2px solid var(--accent-color);
    border-radius: 8px;
    padding: var(--spacing-lg);
    margin-bottom: var(--spacing-lg);
}

.submission-box h3 {
    color: var(--accent-color);
    margin-bottom: var(--spacing-md);
    font-size: 1.5rem;
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
                <a href="<?php echo home_url('/submissions'); ?>" class="active">Submissions</a>
            </nav>
            <p>Submit your policy research and analysis</p>
        </div>
    </section>

    <!-- Submissions Content -->
    <section style="padding: var(--spacing-lg) 0; background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container" style="max-width: 1200px;">

            <!-- Content -->
            <div style="background: var(--white); border-radius: 8px; padding: 2.5rem; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                <h2 style="font-family: var(--font-secondary); font-size: 2.2rem; color: var(--primary-color); margin-bottom: 1.5rem; text-align: center;">Submission Guidelines</h2>

                <p style="font-size: 1.1rem; line-height: 1.6; color: var(--text-secondary); margin-bottom: 1.5rem; text-align: center;">
                    <strong>Thank you for your interest in Virginia Policy Review! Submissions for the 2025-2026 Journal will open soon!</strong>
                </p>

                <div style="margin-bottom: 1.25rem;">
                    <p style="font-size: 1rem; line-height: 1.7; color: var(--text-secondary); margin: 0;">
                        <strong>Research Article:</strong> These articles are typically longer and reflect some kind of research in a particular policy area of interest. This can include an empirical analysis of a government program or a case study of some kind. These articles can take a position, make recommendations, or suggest specific improvements to a particular program or policy. Length may vary, but they must be no longer than 7000 words. Please also include an abstract no longer than 250 words and a short biography on each author no longer than 100 words.
                    </p>
                </div>

                <div style="margin-bottom: 1.25rem;">
                    <p style="font-size: 1rem; line-height: 1.7; color: var(--text-secondary); margin: 0;">
                        <strong>Commentary/Op-ed:</strong> These entries are generally shorter and are intended to reflect different perspectives on a particular issue. These articles should take a position on a particular topic and must be no longer than 2,000 words. Please include a short biography no longer than 100 words on each author.
                    </p>
                </div>

                <div style="margin-bottom: 1.25rem;">
                    <p style="font-size: 1rem; line-height: 1.7; color: var(--text-secondary); margin: 0;">
                        <strong>Citations:</strong> All citations must follow the <strong>APA or Chicago Citation Style</strong>.
                    </p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <p style="font-size: 1rem; line-height: 1.7; color: var(--text-secondary); margin: 0 0 0.5rem 0;">
                        <strong>Style:</strong>
                    </p>
                    <ul style="font-size: 1rem; line-height: 1.7; color: var(--text-secondary); margin: 0 0 0 1.5rem; padding: 0;">
                        <li>Use Times New Roman font in 12pt.</li>
                        <li>Double-space your submission.</li>
                    </ul>
                </div>

                <div style="background: var(--accent-color); color: white; border-radius: 8px; padding: 1rem 1.5rem; margin-bottom: 1.5rem; text-align: center;">
                    <p style="font-size: 1.2rem; margin: 0;">
                        <strong>2025-2026 theme: "Policy for the Public Good."</strong>
                    </p>
                </div>

                <div style="text-align: center;">
                    <p style="font-size: 1rem; color: var(--text-secondary); margin: 0;">
                        For more information, email Executive Editor Sarah King and Managing Editor George Langhammer.
                    </p>
                </div>
            </div>

        </div>
    </section>
</main>

<?php get_footer(); ?>
