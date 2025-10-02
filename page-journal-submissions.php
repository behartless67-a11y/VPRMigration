<?php
/**
 * Template for Journal Submissions page
 */

get_header(); ?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero-section" style="height: 35vh; min-height: 250px; background: linear-gradient(rgba(35, 45, 75, 0.8), rgba(35, 45, 75, 0.8)), url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg') center/cover; display: flex; align-items: center; justify-content: center; color: white; text-align: center;">
        <div class="container">
            <h1 style="font-size: 3.5rem; margin-bottom: 1rem; font-family: 'Crimson Text', serif;">Submission Guidelines</h1>
        </div>
    </section>

    <!-- Submission Guidelines Content -->
    <section class="section" style="padding: 3rem 0; background: white;">
        <div class="container" style="max-width: 900px; margin: 0 auto; line-height: 1.8;">
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
    </section>
</main>

<?php get_footer(); ?>