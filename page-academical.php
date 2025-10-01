<?php
/**
 * Template for Academical Podcast page
 * Based on http://www.virginiapolicyreview.org/academical.html
 */

get_header(); ?>

<main class="main-content">
    <!-- Hero Header with Background -->
    <section class="hero" style="min-height: 35vh; padding-top: 100px; padding-bottom: var(--spacing-lg);">
        <div class="container">
            <div class="text-center">
                <h1 style="font-size: clamp(2.5rem, 6vw, 4rem); margin-bottom: var(--spacing-sm); font-family: var(--font-secondary); color: var(--primary-color);">Academical Podcast</h1>
                <p style="font-size: 1.3rem; color: var(--text-primary); max-width: 800px; margin: 0 auto; font-family: var(--font-secondary);">The Official Podcast of the Virginia Policy Review</p>
            </div>
        </div>
    </section>


    <!-- Recent Episodes -->
    <section class="section" style="padding: var(--spacing-md) 0;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: var(--spacing-md);">Recent Episodes</h2>

            <div style="display: grid; gap: var(--spacing-md); margin: 0 auto;">
                <!-- Episode 1: Professor Daniel Player -->
                <article class="featured-card" style="border-left: 6px solid var(--accent-color); padding: var(--spacing-xl);">
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