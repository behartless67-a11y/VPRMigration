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
                    <p class="hero-subtitle">Policy for the Public Good</p>
                    <p class="hero-description">
                        Student-run policy journal impacting wider policy dialogue through research,
                        opinion pieces, interviews, and our podcast. Curating meaningful insights
                        on modern policy issues since 2009.
                    </p>
                    <div class="hero-cta">
                        <a href="#featured" class="btn btn-primary">Latest Articles</a>
                        <a href="<?php echo home_url('/about-us'); ?>" class="btn btn-secondary">About Us</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="hero-card">
                        <h3>Current Theme</h3>
                        <h2 style="color: var(--accent-color); margin-bottom: var(--spacing-sm);">
                            "Policy for the Public Good"
                        </h2>
                        <p style="margin-bottom: var(--spacing-md);">2025-26 Edition</p>

                        <div style="border-top: 1px solid var(--border-color); padding-top: var(--spacing-md);">
                            <h4 style="margin-bottom: var(--spacing-sm); font-size: 1rem;">Latest Journal</h4>
                            <a href="#" class="btn btn-primary" style="font-size: 0.9rem; padding: 0.75rem 1.5rem;">
                                Volume XVI →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Articles Section -->
    <section id="featured" class="section">
        <div class="container">
            <div class="text-center mb-lg">
                <h2>Featured Articles</h2>
                <p style="font-size: 1.2rem; color: var(--text-secondary);">
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
                    <h3>Unpacking Famine in Sudan</h3>
                    <p>
                        Famine was confirmed in Zamzam, a camp in Sudan's North Darfur region
                        housing half a million displaced people. Understanding the crisis requires
                        examining how war exacerbates humanitarian disasters.
                    </p>
                    <a href="#" class="read-more">Read Full Article →</a>
                </article>

                <!-- Article 2 -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">February 26, 2025</time>
                    </div>
                    <h3>Replacing Bashar with HTS: A False Sense of Safety for Israel</h3>
                    <p>
                        While Syria's situation highlights Iran's eroding foothold, Israel now
                        faces the challenge of an unpredictable HTS-led Syrian government after
                        Assad's fall.
                    </p>
                    <a href="#" class="read-more">Read Full Article →</a>
                </article>

                <!-- Article 3 -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">Security</span>
                        <time class="featured-card-date">February 19, 2025</time>
                    </div>
                    <h3>Undersea Cable Infrastructure Challenges</h3>
                    <p>
                        Protecting the global network of undersea cables is vital to U.S. national
                        security. Every day, $10 trillion in financial transactions and 99% of
                        internet traffic flows through these cables.
                    </p>
                    <a href="#" class="read-more">Read Full Article →</a>
                </article>

                <!-- Article 4 -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">Urban</span>
                        <time class="featured-card-date">February 12, 2025</time>
                    </div>
                    <h3>Public Transportation & Employment Access in Kansas City</h3>
                    <p>
                        Low-income households in Kansas City face unreliable access to employment
                        areas. 28 million Americans depend on public transit, yet many routes
                        exclude those who need them most.
                    </p>
                    <a href="#" class="read-more">Read Full Article →</a>
                </article>

                <!-- Article 5 -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">January 23, 2025</time>
                    </div>
                    <h3>Syria Without Assad: What Russia Stands to Lose</h3>
                    <p>
                        Assad's asylum in Moscow marks a turning point, leaving Russia grappling
                        with diminished influence in a post-Assad, HTS-led Syria amid the
                        prioritized Ukraine conflict.
                    </p>
                    <a href="#" class="read-more">Read Full Article →</a>
                </article>

                <!-- Call to Action Card -->
                <article class="featured-card" style="background: linear-gradient(135deg, var(--accent-color), #004499); color: white; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                    <h3 style="color: white; margin-bottom: var(--spacing-md);">Join Our Publication</h3>
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: var(--spacing-md);">
                        Interested in contributing to policy dialogue? Submit your research,
                        opinion pieces, or join our editorial team.
                    </p>
                    <a href="mailto:contact@virginiapolicyreview.org" class="btn" style="background: white; color: var(--accent-color); align-self: center;">
                        Get Involved →
                    </a>
                </article>
            </div>

            <div class="text-center mt-lg">
                <a href="<?php echo home_url('/the-third-rail'); ?>" class="btn btn-secondary">
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
                    <h2>About Virginia Policy Review</h2>
                    <p style="font-size: 1.2rem; margin-bottom: var(--spacing-md);">
                        Founded in 2009, we're a student-run policy journal striving to publish
                        work that impacts wider policy dialogue through research, opinion pieces,
                        interviews, and our podcast.
                    </p>
                    <p>
                        We publish a physical journal each Spring, maintain our blog "The Third Rail"
                        for ongoing insights, and produce "Academical," our official podcast from
                        the heart of Jefferson's Academical Village.
                    </p>
                    <a href="<?php echo home_url('/about-us'); ?>" class="btn btn-primary" style="margin-top: var(--spacing-md);">
                        Learn More About Us
                    </a>
                </div>
                <div>
                    <div class="hero-card">
                        <h3>Our Mission</h3>
                        <div style="margin: var(--spacing-md) 0;">
                            <div style="display: flex; align-items: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-sm);">
                                <div style="width: 8px; height: 8px; background: var(--accent-color); border-radius: 50%;"></div>
                                <span>Research & Analysis</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-sm);">
                                <div style="width: 8px; height: 8px; background: var(--accent-color); border-radius: 50%;"></div>
                                <span>Opinion Pieces</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-sm);">
                                <div style="width: 8px; height: 8px; background: var(--accent-color); border-radius: 50%;"></div>
                                <span>Interviews & Podcasts</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: var(--spacing-sm);">
                                <div style="width: 8px; height: 8px; background: var(--accent-color); border-radius: 50%;"></div>
                                <span>Policy Dialogue</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>