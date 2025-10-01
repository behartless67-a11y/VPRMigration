<?php
/**
 * The main template file
 * Virginia Policy Review Theme
 */

get_header(); ?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">Virginia Policy Review</h1>
                    <p class="hero-subtitle" style="font-size: 2rem; margin-bottom: var(--spacing-lg);">Policy for the Public Good</p>
                    <p class="hero-description" style="font-size: 1.4rem; line-height: 1.8; margin-bottom: var(--spacing-lg);">
                        Student-run policy journal impacting wider policy dialogue through research,
                        opinion pieces, interviews, and our podcast. Curating meaningful insights
                        on modern policy issues since 2009.
                    </p>
                    <div class="hero-cta">
                        <a href="#featured" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2rem;">Latest Articles</a>
                        <a href="<?php echo home_url('/about-us'); ?>" class="btn btn-secondary" style="font-size: 1.1rem; padding: 1rem 2rem;">About Us</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="hero-card" style="padding: var(--spacing-lg); min-width: 450px; text-align: center;">
                        <h3 style="font-size: 1.5rem; margin-bottom: var(--spacing-md); color: var(--primary-color);">Current Issue</h3>

                        <!-- Journal Cover Image -->
                        <a href="<?php echo get_template_directory_uri(); ?>/images/vprjournalvolume_xvi.pdf" target="_blank" style="display: block; margin-bottom: var(--spacing-md);">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/currentissue.png"
                                 alt="VPR Journal Volume XVI - Policy for the Public Good"
                                 style="width: 100%; max-width: 300px; height: auto; border-radius: var(--border-radius); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease;"
                                 onmouseover="this.style.transform='scale(1.05)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        </a>

                        <h4 style="font-size: 1.3rem; margin-bottom: var(--spacing-sm); color: var(--primary-color);">Volume XVI</h4>
                        <p style="font-size: 1.1rem; color: var(--text-secondary); margin-bottom: var(--spacing-md);">"Policy for the Public Good"</p>

                        <a href="<?php echo get_template_directory_uri(); ?>/images/vprjournalvolume_xvi.pdf" target="_blank" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2rem; display: inline-block;">
                            Download Current Issue →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Articles Section -->
    <section id="featured" class="section">
        <div class="container">
            <div class="text-center mb-lg">
                <h2 style="font-size: 3rem; margin-bottom: var(--spacing-md);">Featured Articles</h2>
                <p style="font-size: 1.5rem; color: var(--text-secondary); margin-bottom: var(--spacing-lg);">
                    The latest insights from The Third Rail
                </p>
            </div>

            <div class="featured-grid">
                <!-- Article 1 -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">March 5, 2025</time>
                    </div>
                    <h3 style="font-size: 1.8rem; margin-bottom: var(--spacing-md);">Unpacking Famine in Sudan</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7;">
                        Famine was confirmed in Zamzam, a camp in Sudan's North Darfur region
                        housing half a million displaced people. Understanding the crisis requires
                        examining how war exacerbates humanitarian disasters.
                    </p>
                    <a href="#" class="read-more" style="font-size: 1.1rem;">Read Full Article →</a>
                </article>

                <!-- Article 2 -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">February 26, 2025</time>
                    </div>
                    <h3 style="font-size: 1.8rem; margin-bottom: var(--spacing-md);">Replacing Bashar with HTS: A False Sense of Safety for Israel</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7;">
                        While Syria's situation highlights Iran's eroding foothold, Israel now
                        faces the challenge of an unpredictable HTS-led Syrian government after
                        Assad's fall.
                    </p>
                    <a href="#" class="read-more" style="font-size: 1.1rem;">Read Full Article →</a>
                </article>

                <!-- Article 3 -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">Security</span>
                        <time class="featured-card-date">February 19, 2025</time>
                    </div>
                    <h3 style="font-size: 1.8rem; margin-bottom: var(--spacing-md);">Undersea Cable Infrastructure Challenges</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7;">
                        Protecting the global network of undersea cables is vital to U.S. national
                        security. Every day, $10 trillion in financial transactions and 99% of
                        internet traffic flows through these cables.
                    </p>
                    <a href="#" class="read-more" style="font-size: 1.1rem;">Read Full Article →</a>
                </article>

                <!-- Article 4 -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">Urban</span>
                        <time class="featured-card-date">February 12, 2025</time>
                    </div>
                    <h3 style="font-size: 1.8rem; margin-bottom: var(--spacing-md);">Public Transportation & Employment Access in Kansas City</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7;">
                        Low-income households in Kansas City face unreliable access to employment
                        areas. 28 million Americans depend on public transit, yet many routes
                        exclude those who need them most.
                    </p>
                    <a href="#" class="read-more" style="font-size: 1.1rem;">Read Full Article →</a>
                </article>

                <!-- Article 5 -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">January 23, 2025</time>
                    </div>
                    <h3 style="font-size: 1.8rem; margin-bottom: var(--spacing-md);">Syria Without Assad: What Russia Stands to Lose</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7;">
                        Assad's asylum in Moscow marks a turning point, leaving Russia grappling
                        with diminished influence in a post-Assad, HTS-led Syria amid the
                        prioritized Ukraine conflict.
                    </p>
                    <a href="#" class="read-more" style="font-size: 1.1rem;">Read Full Article →</a>
                </article>

                <!-- Call to Action Card -->
                <article class="featured-card" style="background: var(--accent-color); color: white; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                    <h3 style="color: white; font-size: 1.8rem; margin-bottom: var(--spacing-md);">Join Our Publication</h3>
                    <p style="color: rgba(255,255,255,0.95); font-size: 1.15rem; line-height: 1.7; margin-bottom: var(--spacing-md);">
                        Interested in contributing to policy dialogue? Submit your research,
                        opinion pieces, or join our editorial team.
                    </p>
                    <a href="mailto:contact@virginiapolicyreview.org" class="btn" style="background: white; color: var(--accent-color); align-self: center; font-size: 1.1rem; padding: 1rem 2rem;">
                        Get Involved →
                    </a>
                </article>
            </div>

            <div class="text-center mt-lg">
                <a href="<?php echo home_url('/the-third-rail'); ?>" class="btn btn-secondary" style="font-size: 1.1rem; padding: 1rem 2rem;">
                    View All Articles
                </a>
            </div>
        </div>
    </section>

    <!-- About Preview Section -->
    <section class="section section--alt">
        <div class="container">
            <div class="hero-content">
                <div>
                    <h2 style="font-size: 3rem; margin-bottom: var(--spacing-md);">About Virginia Policy Review</h2>
                    <p style="font-size: 1.4rem; line-height: 1.7; margin-bottom: var(--spacing-md);">
                        Founded in 2009, we're a student-run policy journal striving to publish
                        work that impacts wider policy dialogue through research, opinion pieces,
                        interviews, and our podcast.
                    </p>
                    <p style="font-size: 1.2rem; line-height: 1.7;">
                        We publish a physical journal each Spring, maintain our blog "The Third Rail"
                        for ongoing insights, and produce "Academical," our official podcast from
                        the heart of Jefferson's Academical Village.
                    </p>
                    <a href="<?php echo home_url('/about-us'); ?>" class="btn btn-primary" style="margin-top: var(--spacing-md); font-size: 1.1rem; padding: 1rem 2rem;">
                        Learn More About Us
                    </a>
                </div>
                <div>
                    <div class="hero-card" style="padding: var(--spacing-xl); min-width: 450px;">
                        <h3 style="font-size: 1.5rem; margin-bottom: var(--spacing-md);">Our Mission</h3>
                        <div style="margin: var(--spacing-md) 0;">
                            <div style="display: flex; align-items: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-md);">
                                <div style="width: 10px; height: 10px; background: var(--accent-color); border-radius: 50%;"></div>
                                <span style="font-size: 1.15rem;">Research & Analysis</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-md);">
                                <div style="width: 10px; height: 10px; background: var(--accent-color); border-radius: 50%;"></div>
                                <span style="font-size: 1.15rem;">Opinion Pieces</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-md);">
                                <div style="width: 10px; height: 10px; background: var(--accent-color); border-radius: 50%;"></div>
                                <span style="font-size: 1.15rem;">Interviews & Podcasts</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: var(--spacing-sm);">
                                <div style="width: 10px; height: 10px; background: var(--accent-color); border-radius: 50%;"></div>
                                <span style="font-size: 1.15rem;">Policy Dialogue</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>