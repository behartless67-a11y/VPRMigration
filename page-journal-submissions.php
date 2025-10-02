<?php
/**
 * Template for Journal Submissions page
 */

get_header(); ?>

<style>
/* Hide default header */
.site-header {
    display: none;
}

.main-content {
    padding: 0;
}

/* Banner matching homepage */
.cornell-banner {
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 4rem 0 2rem;
}

.cornell-banner-content {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 2rem;
    text-align: center;
}

.cornell-banner h1 {
    font-family: var(--font-secondary);
    font-size: 6.5rem;
    color: var(--primary-color);
    font-weight: 800;
    margin-bottom: 0.3rem;
    line-height: 1;
}

.cornell-nav {
    display: flex;
    justify-content: center;
    gap: 2.5rem;
    margin-bottom: 0.5rem;
}

.cornell-nav a {
    font-family: var(--font-secondary);
    font-size: 1.2rem;
    color: var(--primary-color);
    text-decoration: none;
    position: relative;
    transition: color 0.3s ease;
}

.cornell-nav a:hover,
.cornell-nav a.active {
    color: var(--accent-color);
}

.cornell-nav a::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--accent-color);
    transition: width 0.3s ease;
}

.cornell-nav a:hover::after,
.cornell-nav a.active::after {
    width: 100%;
}

.cornell-banner p {
    font-size: 1.4rem;
    color: var(--text-secondary);
    max-width: 1200px;
    margin: 0 auto 2rem;
    line-height: 1.3;
}

/* Featured-style section header */
.content-section {
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 2rem 0 3rem;
}

.content-container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 2rem;
}

.featured-label {
    font-family: var(--font-primary);
    font-size: 0.9rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--accent-color);
    margin-bottom: 2rem;
    text-align: center;
}

.content-box {
    background: white;
    border-radius: 8px;
    padding: 3rem;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    max-width: 1100px;
    margin: 0 auto;
    line-height: 1.8;
}
</style>

<main class="main-content">
    <!-- Banner - Same as Homepage -->
    <section class="cornell-banner">
        <div class="cornell-banner-content">
            <h1>
                <span style="font-style: italic; color: var(--primary-color);">Virginia</span>
                <span style="font-weight: 800; color: var(--accent-color);"> Policy Review</span>
            </h1>
            <nav class="cornell-nav">
                <a href="<?php echo home_url('/'); ?>">Home</a>
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
                <a href="<?php echo home_url('/the-third-rail'); ?>">The Third Rail</a>
                <a href="<?php echo home_url('/academical'); ?>">Academical</a>
                <a href="<?php echo home_url('/submissions'); ?>" class="active">Submissions</a>
            </nav>
            <p>Student perspectives on policy, research, and public affairs from the University of Virginia</p>
        </div>
    </section>

    <!-- Content Section - Featured Style -->
    <section class="content-section">
        <div class="content-container">
            <div class="featured-label">SUBMISSION GUIDELINES</div>
            <div class="content-box">
                <p style="margin-bottom: 2rem;">Thank you for your interest in Virginia Policy Review! Submissions for the 2025-2026 Journal will open soon!</p>

                <h2 style="font-family: 'Crimson Text', serif; font-size: 1.8rem; margin-top: 2.5rem; margin-bottom: 1rem; color: var(--primary-color);">Research Article</h2>
                <p style="margin-bottom: 2rem;">These articles are typically longer and reflect some kind of research in a particular policy area of interest. This can include an empirical analysis of a government program or a case study of some kind. These articles can take a position, make recommendations, or suggest specific improvements to a particular program or policy. Length may vary, but they must be no longer than 7000 words. Please also include an abstract no longer than 250 words and a short biography on each author no longer than 100 words.</p>

                <h2 style="font-family: 'Crimson Text', serif; font-size: 1.8rem; margin-top: 2.5rem; margin-bottom: 1rem; color: var(--primary-color);">Commentary/Op-ed</h2>
                <p style="margin-bottom: 2rem;">These entries are generally shorter and are intended to reflect different perspectives on a particular issue. These articles should take a position on a particular topic and must be no longer than 2,000 words. Please include a short biography no longer than 100 words on each author.</p>

                <h2 style="font-family: 'Crimson Text', serif; font-size: 1.8rem; margin-top: 2.5rem; margin-bottom: 1rem; color: var(--primary-color);">Citations</h2>
                <p style="margin-bottom: 2rem;">All citations must follow the APA or Chicago Citation Style.</p>

                <h2 style="font-family: 'Crimson Text', serif; font-size: 1.8rem; margin-top: 2.5rem; margin-bottom: 1rem; color: var(--primary-color);">Style</h2>
                <ul style="margin-bottom: 2rem; padding-left: 2rem;">
                    <li>Use Times New Roman font in 12pt.</li>
                    <li>Double-space your submission.</li>
                </ul>

                <h2 style="font-family: 'Crimson Text', serif; font-size: 1.8rem; margin-top: 2.5rem; margin-bottom: 1rem; color: var(--primary-color);">2025-2026 theme: "Policy for the Public Good."</h2>

                <p style="margin-top: 3rem; padding: 1.5rem; background: #f8f9fa; border-left: 4px solid var(--accent-color);">
                    For more information, email Executive Editor Sarah King and Managing Editor George Langhammer.
                </p>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>