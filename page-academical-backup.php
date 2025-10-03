<?php
/**
 * Template for Academical Podcast page
 */

get_header(); ?>

<main class="main-content">
    <!-- Compact Header -->
    <section style="padding: var(--spacing-lg) 0; background: var(--white);">
        <div class="container">
            <div class="text-center">
                <h1 style="font-size: 2.5rem; margin-bottom: var(--spacing-sm); font-family: var(--font-secondary);">Academical</h1>
                <p style="font-size: 1.1rem; color: var(--text-secondary); margin-bottom: var(--spacing-xs);">The Official Podcast of the Virginia Policy Review</p>
                <p style="font-size: 1rem; color: var(--text-light); margin: 0;">Coming to you from the heart of Thomas Jefferson's Academical Village</p>
            </div>
        </div>
    </section>

    <!-- About & Listen Section -->
    <section style="padding: var(--spacing-lg) 0;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-xl); max-width: 1200px; margin: 0 auto; align-items: start;">
                <!-- About Section -->
                <div>
                    <h2 style="margin-bottom: var(--spacing-md);">About the Podcast</h2>
                    <p style="font-size: 1.1rem; line-height: 1.7; margin-bottom: var(--spacing-md); font-family: var(--font-secondary);">
                        Academical is the official podcast of the Virginia Policy Review, staffed by Master of Public Policy students at the University of Virginia's Frank Batten School of Leadership and Public Policy.
                    </p>
                    <p style="font-size: 1rem; line-height: 1.6; margin-bottom: var(--spacing-md); font-family: var(--font-secondary);">
                        Our mission is to impact the wider policy debate through a variety of journalistic mediums, including this podcast.
                    </p>

                    <div style="background: var(--secondary-color); padding: var(--spacing-md); border-radius: var(--border-radius); border-left: 4px solid var(--accent-color);">
                        <p style="margin: 0; font-size: 0.95rem; color: var(--text-secondary); font-style: italic;">
                            33 episodes • 5.0/5 rating • Available everywhere you listen to podcasts
                        </p>
                    </div>
                </div>

                <!-- Listen Section -->
                <div class="hero-card">
                    <h3 style="margin-bottom: var(--spacing-md);">Listen Now</h3>

                    <div style="display: grid; gap: var(--spacing-sm); margin-bottom: var(--spacing-md);">
                        <a href="https://anchor.fm/academical-vpr" class="btn" style="background: linear-gradient(135deg, #5000ff, #8e44ad); color: white; justify-content: center;" target="_blank">
                            🎵 Listen on Anchor
                        </a>
                        <a href="https://podcasts.apple.com/us/podcast/academical/id1439013349" class="btn" style="background: #000000; color: white; justify-content: center;" target="_blank">
                            🎧 Apple Podcasts
                        </a>
                        <a href="#" class="btn btn-secondary" style="justify-content: center;">
                            📻 Available Everywhere
                        </a>
                    </div>

                    <p style="font-size: 0.9rem; color: var(--text-secondary); text-align: center; margin: 0;">
                        Find us on Spotify, Google Podcasts, and wherever you get your podcasts
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Episodes Section -->
    <div class="section-divider"></div>

    <section style="padding: var(--spacing-lg) 0; background: var(--secondary-color);">
        <div class="container">
            <div class="text-center mb-lg">
                <h2>Recent Episodes</h2>
                <p style="font-size: 1.1rem; color: var(--text-secondary);">
                    Policy discussions and expert interviews
                </p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr; gap: var(--spacing-md); max-width: 1000px; margin: 0 auto;">
                <!-- Episode 1 -->
                <div class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category" style="background: #9b59b6; color: white;">Episode</span>
                        <time class="featured-card-date">April 16, 2022</time>
                    </div>
                    <h3>Professor Daniel Player, University of Virginia</h3>
                    <p>
                        A conversation with Professor Daniel Player about public-private partnerships and policy creation.
                        We explore how academic research informs policy decisions and the role of universities in shaping public discourse.
                    </p>
                    <div style="display: flex; gap: var(--spacing-sm); align-items: center;">
                        <a href="https://anchor.fm/academical-vpr" class="read-more">Listen Now →</a>
                        <span style="font-size: 0.85rem; color: var(--text-light);">• 35 minutes</span>
                    </div>
                </div>

                <!-- Episode 2 -->
                <div class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category" style="background: #e74c3c; color: white;">Episode</span>
                        <time class="featured-card-date">March 19, 2022</time>
                    </div>
                    <h3>Ellie Kaufman, CNN Producer</h3>
                    <p>
                        CNN Producer Ellie Kaufman joins us to discuss national security reporting and journalism careers.
                        Learn about the intersection of media, policy, and public understanding of complex security issues.
                    </p>
                    <div style="display: flex; gap: var(--spacing-sm); align-items: center;">
                        <a href="https://anchor.fm/academical-vpr" class="read-more">Listen Now →</a>
                        <span style="font-size: 0.85rem; color: var(--text-light);">• 28 minutes</span>
                    </div>
                </div>

                <!-- Episode 3 -->
                <div class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category" style="background: #3498db; color: white;">Episode</span>
                        <time class="featured-card-date">February 25, 2022</time>
                    </div>
                    <h3>Professor Ben Castleman</h3>
                    <p>
                        Professor Ben Castleman discusses college enrollment, student loans, and higher education policy.
                        An in-depth look at how policy affects student access to higher education and long-term outcomes.
                    </p>
                    <div style="display: flex; gap: var(--spacing-sm); align-items: center;">
                        <a href="https://anchor.fm/academical-vpr" class="read-more">Listen Now →</a>
                        <span style="font-size: 0.85rem; color: var(--text-light);">• 42 minutes</span>
                    </div>
                </div>

                <!-- Episode 4 -->
                <div class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category" style="background: #f39c12; color: white;">Episode</span>
                        <time class="featured-card-date">February 4, 2022</time>
                    </div>
                    <h3>Mary Kate Cary, Former White House Speechwriter</h3>
                    <p>
                        Former White House Speechwriter Mary Kate Cary shares insights about speechwriting in the Oval Office.
                        Discover how policy ideas are communicated to the public through presidential rhetoric.
                    </p>
                    <div style="display: flex; gap: var(--spacing-sm); align-items: center;">
                        <a href="https://anchor.fm/academical-vpr" class="read-more">Listen Now →</a>
                        <span style="font-size: 0.85rem; color: var(--text-light);">• 38 minutes</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Archive Episodes Section -->
    <section style="padding: var(--spacing-lg) 0;">
        <div class="container">
            <div class="text-center mb-lg">
                <h2>Featured Archive Episodes</h2>
                <p style="font-size: 1.1rem; color: var(--text-secondary);">
                    Notable conversations from our archives
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-md);">
                <!-- Archive Episode 1 -->
                <div class="featured-card">
                    <h4 style="color: var(--accent-color); margin-bottom: var(--spacing-sm);">Episode 8</h4>
                    <h3 style="font-size: 1.1rem;">Melody Barnes</h3>
                    <p style="font-size: 0.95rem;">
                        Co-Director of UVA's Democracy Initiative discusses democratic institutions and civic engagement.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" class="read-more">Listen →</a>
                </div>

                <!-- Archive Episode 2 -->
                <div class="featured-card">
                    <h4 style="color: var(--accent-color); margin-bottom: var(--spacing-sm);">Episode 5</h4>
                    <h3 style="font-size: 1.1rem;">Ned Price</h3>
                    <p style="font-size: 0.95rem;">
                        Former CIA analyst and NSC official on national security policy and international relations.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" class="read-more">Listen →</a>
                </div>

                <!-- Archive Episode 3 -->
                <div class="featured-card">
                    <h4 style="color: var(--accent-color); margin-bottom: var(--spacing-sm);">Episode 2</h4>
                    <h3 style="font-size: 1.1rem;">Secretary Daniel Carey</h3>
                    <p style="font-size: 0.95rem;">
                        Virginia's Secretary of Health and Human Resources on state health policy and pandemic response.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" class="read-more">Listen →</a>
                </div>
            </div>

            <div class="text-center mt-lg">
                <a href="https://anchor.fm/academical-vpr" class="btn btn-secondary">
                    View All 33 Episodes
                </a>
            </div>
        </div>
    </section>

    <!-- Production Team Section -->
    <section style="padding: var(--spacing-md) 0; background: var(--secondary-color);">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; text-center;">
                <h2 style="margin-bottom: var(--spacing-md);">Production Team</h2>
                <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: var(--spacing-md); font-family: var(--font-secondary);">
                    Academical is produced by current and former Master of Public Policy students at UVA's Frank Batten School of Leadership and Public Policy.
                </p>

                <div style="background: linear-gradient(135deg, rgba(0, 102, 204, 0.1), rgba(0, 102, 204, 0.05)); padding: var(--spacing-md); border-radius: var(--border-radius); border-left: 4px solid var(--accent-color);">
                    <p style="margin: 0; font-size: 0.95rem; color: var(--text-secondary); font-style: italic;">
                        <strong>Current Hosts:</strong> Connor Eads, Gary Christensen, Aidan Doud, Sean Bielawski<br>
                        <strong>Alumni Contributors:</strong> Ben Teese (MPP '21), Morgan Bedford (MPP '21), Teka Lenahan (MPP '21), Maureen Coffey (MPP '21)
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section style="padding: var(--spacing-lg) 0; background: linear-gradient(135deg, var(--primary-color) 0%, #333333 100%); color: white;">
        <div class="container text-center">
            <h2 style="color: white; margin-bottom: var(--spacing-md);">Subscribe to Academical</h2>
            <p style="font-size: 1.6rem; color: rgba(255,255,255,0.9); margin-bottom: var(--spacing-lg); max-width: 600px; margin-left: auto; margin-right: auto;">
                Don't miss our policy discussions and expert interviews. Subscribe on your favorite platform.
            </p>
            <div style="display: flex; gap: var(--spacing-md); justify-content: center; flex-wrap: wrap;">
                <a href="https://anchor.fm/academical-vpr" class="btn" style="background: var(--accent-color); color: white;" target="_blank">
                    Listen on Anchor
                </a>
                <a href="https://podcasts.apple.com/us/podcast/academical/id1439013349" class="btn" style="background: transparent; border: 2px solid white; color: white;" target="_blank">
                    Apple Podcasts
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>