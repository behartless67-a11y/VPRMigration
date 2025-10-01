<?php
/**
 * Template for Academical Podcast page
 * Based on http://www.virginiapolicyreview.org/academical.html
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
                <a href="<?php echo home_url('/academical'); ?>" class="active">Academical</a>
                <a href="<?php echo home_url('/journal-issues'); ?>">Journal Issues</a>
                <a href="<?php echo home_url('/contact'); ?>">Contact</a>
            </nav>
            <p>The Official Podcast of the Virginia Policy Review</p>
        </div>
    </section>

    <!-- Recent Episodes -->
    <section class="section" style="padding: var(--spacing-md) 0; background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: var(--spacing-md);">Recent Episodes</h2>

            <div style="display: grid; gap: var(--spacing-sm); margin: 0 auto;">
                <!-- Episode 1: Professor Daniel Player -->
                <article class="featured-card" style="border-left: 6px solid var(--accent-color); padding: var(--spacing-md) var(--spacing-lg);">
                    <div style="display: grid; grid-template-columns: 1fr auto; gap: var(--spacing-lg); align-items: start;">
                        <div>
                            <div class="featured-card-meta" style="margin-bottom: var(--spacing-md);">
                                <span class="featured-card-category" style="background: var(--primary-color); color: var(--accent-color); padding: 0.5rem 1rem; font-size: 0.9rem; font-weight: 600;">Education Policy</span>
                                <time class="featured-card-date" style="margin-left: var(--spacing-md);">April 16, 2022</time>
                            </div>
                            <h3 style="font-size: 1.5rem; margin-bottom: var(--spacing-md);">Professor Daniel Player, University of Virginia</h3>
                            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: var(--spacing-lg);">
                                Join us as we explore public-private partnerships in education policy with Professor Daniel Player
                                from UVA's School of Education and Human Development. We discuss innovative approaches to policy
                                creation, the role of research in shaping educational outcomes, and how academic institutions
                                can better collaborate with government agencies.
                            </p>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: var(--spacing-md); min-width: 180px;">
                            <div style="background: #f8f9fa; padding: var(--spacing-md); border-radius: var(--border-radius);">
                                <p style="font-size: 0.9rem; color: var(--text-secondary); margin-bottom: 0.5rem;"><strong>Duration:</strong></p>
                                <p style="font-size: 1.2rem; font-weight: bold; margin-bottom: 0;">45 mins</p>
                            </div>
                            <a href="https://anchor.fm/academical-vpr" target="_blank" style="background: var(--primary-color); color: var(--accent-color); padding: 1rem 1.5rem; border-radius: var(--border-radius); text-decoration: none; font-weight: 600; text-align: center; transition: var(--transition); display: block;">
                                🎧 Listen Now
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Episode 2: Ellie Kaufman -->
                <article class="featured-card" style="border-left: 6px solid var(--primary-color); padding: var(--spacing-xl);">
                    <div style="display: grid; grid-template-columns: 1fr auto; gap: var(--spacing-lg); align-items: start;">
                        <div>
                            <div class="featured-card-meta" style="margin-bottom: var(--spacing-md);">
                                <span class="featured-card-category" style="background: var(--primary-color); color: var(--accent-color); padding: 0.5rem 1rem; font-size: 0.9rem; font-weight: 600;">National Security</span>
                                <time class="featured-card-date" style="margin-left: var(--spacing-md);">March 19, 2022</time>
                            </div>
                            <h3 style="font-size: 1.5rem; margin-bottom: var(--spacing-md);">Ellie Kaufman, CNN Producer</h3>
                            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: var(--spacing-lg);">
                                CNN Producer Ellie Kaufman shares insights from the front lines of national security reporting.
                                We discuss the challenges of covering complex policy issues, the importance of accurate journalism
                                in policy debates, and career paths for aspiring policy journalists and communications professionals.
                            </p>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: var(--spacing-md); min-width: 180px;">
                            <div style="background: #f8f9fa; padding: var(--spacing-md); border-radius: var(--border-radius);">
                                <p style="font-size: 0.9rem; color: var(--text-secondary); margin-bottom: 0.5rem;"><strong>Duration:</strong></p>
                                <p style="font-size: 1.2rem; font-weight: bold; margin-bottom: 0;">38 mins</p>
                            </div>
                            <a href="https://anchor.fm/academical-vpr" target="_blank" style="background: var(--primary-color); color: var(--accent-color); padding: 1rem 1.5rem; border-radius: var(--border-radius); text-decoration: none; font-weight: 600; text-align: center; transition: var(--transition); display: block;">
                                🎧 Listen Now
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Episode 3: Dr. Sarah Mitchell -->
                <article class="featured-card" style="border-left: 6px solid var(--text-secondary); padding: var(--spacing-xl);">
                    <div style="display: grid; grid-template-columns: 1fr auto; gap: var(--spacing-lg); align-items: start;">
                        <div>
                            <div class="featured-card-meta" style="margin-bottom: var(--spacing-md);">
                                <span class="featured-card-category" style="background: var(--primary-color); color: var(--accent-color); padding: 0.5rem 1rem; font-size: 0.9rem; font-weight: 600;">Environmental Policy</span>
                                <time class="featured-card-date" style="margin-left: var(--spacing-md);">February 25, 2022</time>
                            </div>
                            <h3 style="font-size: 1.5rem; margin-bottom: var(--spacing-md);">Dr. Sarah Mitchell, Environmental Policy Institute</h3>
                            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: var(--spacing-lg);">
                                Environmental policy expert Dr. Sarah Mitchell discusses climate change legislation,
                                renewable energy initiatives, and the intersection of economic policy and environmental
                                sustainability. A must-listen for understanding today's green policy landscape.
                            </p>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: var(--spacing-md); min-width: 180px;">
                            <div style="background: #f8f9fa; padding: var(--spacing-md); border-radius: var(--border-radius);">
                                <p style="font-size: 0.9rem; color: var(--text-secondary); margin-bottom: 0.5rem;"><strong>Duration:</strong></p>
                                <p style="font-size: 1.2rem; font-weight: bold; margin-bottom: 0;">42 mins</p>
                            </div>
                            <a href="https://anchor.fm/academical-vpr" target="_blank" style="background: var(--primary-color); color: var(--accent-color); padding: 1rem 1.5rem; border-radius: var(--border-radius); text-decoration: none; font-weight: 600; text-align: center; transition: var(--transition); display: block;">
                                🎧 Listen Now
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <div style="text-align: center; margin-top: var(--spacing-md);">
                <a href="https://anchor.fm/academical-vpr" target="_blank" class="btn btn-secondary">
                    View All 33 Episodes →
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>