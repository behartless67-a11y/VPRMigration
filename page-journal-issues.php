<?php
/**
 * Template for Journal Issues page
 */

get_header(); ?>

<style>
/* Hide default header */
.site-header {
    display: none;
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
            <h1>Virginia Policy Review</h1>
            <nav class="page-nav">
                <a href="<?php echo home_url('/'); ?>">Home</a>
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
                <a href="<?php echo home_url('/the-third-rail'); ?>">The Third Rail</a>
                <a href="<?php echo home_url('/academical'); ?>">Academical</a>
                <a href="<?php echo home_url('/journal-issues'); ?>" class="active">Journal Issues</a>
                <a href="<?php echo home_url('/contact'); ?>">Contact</a>
            </nav>
            <p>Current and archived publications of the Virginia Policy Review</p>
        </div>
    </section>

    <!-- Current Issue -->
    <section class="section" style="padding: var(--spacing-md) 0; background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 250px 1fr; gap: var(--spacing-lg); max-width: 800px; margin: 0 auto;">
                <!-- Journal Cover -->
                <div>
                    <div style="background: linear-gradient(135deg, var(--accent-color), #004499); color: white; padding: var(--spacing-lg); border-radius: var(--border-radius); text-align: center; min-height: 300px; display: flex; flex-direction: column; justify-content: center;">
                        <h3 style="color: white; font-size: 1.3rem; margin-bottom: var(--spacing-sm);">Volume XVI</h3>
                        <h4 style="color: rgba(255,255,255,0.9); margin-bottom: var(--spacing-md); font-size: 1rem;">"Policy for the Public Good"</h4>
                        <p style="color: rgba(255,255,255,0.8); font-size: 0.9rem; margin-bottom: var(--spacing-md);">Spring 2025</p>
                        <a href="#" class="btn" style="background: white; color: var(--accent-color); font-size: 0.9rem; padding: 0.5rem 1rem;">
                            📖 Read Online
                        </a>
                    </div>
                </div>

                <!-- Issue Details -->
                <div>
                    <div class="featured-card">
                        <h3 style="color: var(--accent-color); margin-bottom: var(--spacing-md);">Featured Articles</h3>

                        <div style="display: grid; gap: var(--spacing-sm);">
                            <div style="border-left: 3px solid var(--accent-color); padding-left: var(--spacing-sm);">
                                <h4 style="margin-bottom: 0.25rem; font-size: 1rem;">The Future of Climate Policy</h4>
                                <p style="color: var(--text-secondary); margin: 0; font-size: 0.85rem;">Dr. Sarah Mitchell</p>
                            </div>

                            <div style="border-left: 3px solid var(--primary-color); padding-left: var(--spacing-sm);">
                                <h4 style="margin-bottom: 0.25rem; font-size: 1rem;">Education Reform and Equity</h4>
                                <p style="color: var(--text-secondary); margin: 0; font-size: 0.85rem;">Professor Daniel Player</p>
                            </div>

                            <div style="border-left: 3px solid var(--text-secondary); padding-left: var(--spacing-sm);">
                                <h4 style="margin-bottom: 0.25rem; font-size: 1rem;">National Security in the Digital Age</h4>
                                <p style="color: var(--text-secondary); margin: 0; font-size: 0.85rem;">Ellie Kaufman</p>
                            </div>
                        </div>

                        <div style="margin-top: var(--spacing-md); padding-top: var(--spacing-sm); border-top: 1px solid var(--border-color);">
                            <p style="color: var(--text-secondary); margin: 0; font-size: 0.9rem;"><strong>8 Articles • 156 Pages • 12 Authors</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Archive -->
    <section class="section section--alt" style="padding: var(--spacing-md) 0;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: var(--spacing-md);">Archive</h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: var(--spacing-md);">
                <!-- Volume XV -->
                <article class="featured-card" style="text-align: center; padding: var(--spacing-md);">
                    <div style="background: linear-gradient(135deg, var(--primary-color), #1a2238); color: white; padding: var(--spacing-md); border-radius: var(--border-radius); margin-bottom: var(--spacing-sm);">
                        <h4 style="color: white; margin-bottom: 0.25rem; font-size: 1rem;">Volume XV</h4>
                        <p style="color: rgba(255,255,255,0.8); margin: 0; font-size: 0.8rem;">Spring 2024</p>
                    </div>
                    <h5 style="margin-bottom: var(--spacing-xs); font-size: 0.9rem;">"Innovation in Governance"</h5>
                    <p style="color: var(--text-secondary); font-size: 0.8rem; margin-bottom: var(--spacing-sm);">7 articles • 142 pages</p>
                    <a href="#" class="btn btn-secondary" style="width: 100%; font-size: 0.8rem; padding: 0.4rem;">View</a>
                </article>

                <!-- Volume XIV -->
                <article class="featured-card" style="text-align: center; padding: var(--spacing-md);">
                    <div style="background: linear-gradient(135deg, var(--accent-color), #cc5200); color: white; padding: var(--spacing-md); border-radius: var(--border-radius); margin-bottom: var(--spacing-sm);">
                        <h4 style="color: white; margin-bottom: 0.25rem; font-size: 1rem;">Volume XIV</h4>
                        <p style="color: rgba(255,255,255,0.8); margin: 0; font-size: 0.8rem;">Spring 2023</p>
                    </div>
                    <h5 style="margin-bottom: var(--spacing-xs); font-size: 0.9rem;">"Global Perspectives"</h5>
                    <p style="color: var(--text-secondary); font-size: 0.8rem; margin-bottom: var(--spacing-sm);">9 articles • 168 pages</p>
                    <a href="#" class="btn btn-secondary" style="width: 100%; font-size: 0.8rem; padding: 0.4rem;">View</a>
                </article>

                <!-- Earlier Volumes -->
                <article class="featured-card" style="text-align: center; padding: var(--spacing-md);">
                    <div style="background: linear-gradient(135deg, var(--text-secondary), #555555); color: white; padding: var(--spacing-md); border-radius: var(--border-radius); margin-bottom: var(--spacing-sm);">
                        <h4 style="color: white; margin-bottom: 0.25rem; font-size: 1rem;">Volumes I-XIII</h4>
                        <p style="color: rgba(255,255,255,0.8); margin: 0; font-size: 0.8rem;">2009-2022</p>
                    </div>
                    <h5 style="margin-bottom: var(--spacing-xs); font-size: 0.9rem;">Complete Archive</h5>
                    <p style="color: var(--text-secondary); font-size: 0.8rem; margin-bottom: var(--spacing-sm);">75+ articles</p>
                    <a href="#" class="btn btn-secondary" style="width: 100%; font-size: 0.8rem; padding: 0.4rem;">Browse</a>
                </article>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>