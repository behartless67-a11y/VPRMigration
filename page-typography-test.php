<?php
/**
 * Template Name: Typography Test
 * Template for testing Virginia Policy Review typography options
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

/* Test section styling */
.test-section {
    padding: 4rem 0;
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    text-align: center;
    border-bottom: 2px solid var(--border-color);
}

.option-label {
    font-family: var(--font-primary);
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--accent-color);
    margin-bottom: 1rem;
}

.option-description {
    font-family: var(--font-secondary);
    font-size: 1rem;
    color: var(--text-secondary);
    margin-top: 1rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}
</style>

<main class="main-content">
    <!-- Current Design -->
    <section class="test-section" style="background: var(--secondary-color);">
        <div class="option-label">Current Design</div>
        <h1 style="font-family: var(--font-secondary); font-size: 5rem; color: var(--primary-color); font-weight: 800; margin: 0;">
            Virginia Policy Review
        </h1>
        <p class="option-description">All one style, serif font, navy blue</p>
    </section>

    <!-- Option 1: Split Color -->
    <section class="test-section">
        <div class="option-label">Option 1: Split Color (Sophisticated)</div>
        <h1 style="font-family: var(--font-secondary); font-size: 5rem; font-weight: 800; margin: 0;">
            <span style="color: var(--primary-color);">Virginia</span>
            <span style="color: var(--accent-color);"> Policy Review</span>
        </h1>
        <p class="option-description">"Virginia" in UVA Blue, "Policy Review" in UVA Orange, same serif font</p>
    </section>

    <!-- Option 2: Font Contrast -->
    <section class="test-section">
        <div class="option-label">Option 2: Font Contrast (Editorial)</div>
        <h1 style="margin: 0; color: var(--primary-color);">
            <span style="font-family: var(--font-secondary); font-size: 5rem; font-weight: 700;">Virginia</span><br>
            <span style="font-family: var(--font-primary); font-size: 2.5rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase;">Policy Review</span>
        </h1>
        <p class="option-description">"Virginia" in bold serif, "POLICY REVIEW" in sans-serif caps smaller, both UVA Blue</p>
    </section>

    <!-- Option 3: Weight Contrast -->
    <section class="test-section">
        <div class="option-label">Option 3: Weight Contrast (Modern)</div>
        <h1 style="font-family: var(--font-secondary); color: var(--primary-color); margin: 0;">
            <span style="font-size: 5rem; font-weight: 400;">Virginia</span>
            <span style="font-size: 5rem; font-weight: 800;"> Policy Review</span>
        </h1>
        <p class="option-description">"Virginia" in lighter weight, "Policy Review" in heavy bold, both serif, UVA Blue</p>
    </section>

    <!-- Option 4: Magazine Style -->
    <section class="test-section">
        <div class="option-label">Option 4: Magazine Style (Recommended)</div>
        <h1 style="font-family: var(--font-secondary); margin: 0;">
            <span style="font-size: 5rem; font-weight: 600; font-style: italic; color: var(--primary-color);">Virginia</span>
            <span style="font-size: 5rem; font-weight: 800; color: var(--accent-color);"> Policy Review</span>
        </h1>
        <p class="option-description">"Virginia" in italic serif blue, "Policy Review" in bold serif orange</p>
    </section>

    <!-- Option 5: Stacked Editorial -->
    <section class="test-section">
        <div class="option-label">Option 5: Stacked Editorial</div>
        <h1 style="margin: 0; line-height: 0.9;">
            <span style="font-family: var(--font-secondary); font-size: 6rem; font-weight: 800; color: var(--primary-color); display: block;">Virginia</span>
            <span style="font-family: var(--font-primary); font-size: 2rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent-color); display: block; margin-top: 0.5rem;">Policy Review</span>
        </h1>
        <p class="option-description">Large "Virginia" on top, smaller "POLICY REVIEW" caps below, two-tone</p>
    </section>

    <!-- Option 6: Bold Contrast -->
    <section class="test-section">
        <div class="option-label">Option 6: Bold Contrast</div>
        <h1 style="font-family: var(--font-secondary); margin: 0;">
            <span style="font-size: 5rem; font-weight: 800; color: var(--accent-color);">Virginia</span>
            <span style="font-size: 5rem; font-weight: 400; color: var(--primary-color);"> Policy Review</span>
        </h1>
        <p class="option-description">"Virginia" in bold orange, "Policy Review" in light blue, inverted emphasis</p>
    </section>

    <!-- Instructions -->
    <section style="padding: 3rem 0; background: var(--white); text-align: center;">
        <div class="container">
            <h2 style="color: var(--primary-color); margin-bottom: 1rem;">Choose Your Style</h2>
            <p style="font-family: var(--font-secondary); font-size: 1.2rem; color: var(--text-secondary); max-width: 700px; margin: 0 auto;">
                Let me know which option you prefer, or if you'd like me to create variations on any of these styles!
            </p>
        </div>
    </section>
</main>

<?php get_footer(); ?>
