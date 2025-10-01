<?php
/**
 * Template for Journal Issues page
 */

get_header(); ?>

<main class="main-content">
    <!-- Compact Header -->
    <section style="padding: var(--spacing-lg) 0; background: var(--white);">
        <div class="container">
            <div class="text-center">
                <h1 style="font-size: 2.5rem; margin-bottom: var(--spacing-sm); font-family: var(--font-secondary);">Journal Issues</h1>
                <p style="font-size: 1.1rem; color: var(--text-secondary); margin: 0;">Current and archived publications of the Virginia Policy Review</p>
            </div>
        </div>
    </section>

    <!-- Current Issue -->
    <section class="section" style="padding: var(--spacing-md) 0;">
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