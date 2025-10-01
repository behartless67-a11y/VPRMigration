<?php
/**
 * Template for The Third Rail blog page
 */

get_header(); ?>

<main class="main-content">
    <!-- Compact Header -->
    <section style="padding: var(--spacing-lg) 0; background: var(--white);">
        <div class="container">
            <div class="text-center">
                <h1 style="font-size: 2.5rem; margin-bottom: var(--spacing-sm); font-family: var(--font-secondary);">The Third Rail</h1>
                <p style="font-size: 1.1rem; color: var(--text-secondary); margin: 0;">Shorter takes on big issues</p>
            </div>
        </div>
    </section>

    <!-- Recent Articles -->
    <section class="section" style="padding: var(--spacing-md) 0;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: var(--spacing-md);">
                <!-- Article 1: Sudan Famine -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">March 5, 2025</time>
                    </div>
                    <h3>Unpacking Famine in Sudan</h3>
                    <p>
                        Famine was confirmed in Zamzam, a camp in Sudan's North Darfur region housing half a million displaced people. Understanding the crisis requires examining how war exacerbates humanitarian disasters.
                    </p>
                    <a href="#" class="read-more">Read Full Article →</a>
                </article>

                <!-- Article 2: Israel/Syria -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">February 26, 2025</time>
                    </div>
                    <h3>Replacing Bashar with HTS: A False Sense of Safety for Israel</h3>
                    <p>
                        While Syria's situation highlights Iran's eroding foothold, Israel now faces the challenge of an unpredictable HTS-led Syrian government after Assad's fall.
                    </p>
                    <a href="#" class="read-more">Read Full Article →</a>
                </article>

                <!-- Article 3: Undersea Cables -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">Security</span>
                        <time class="featured-card-date">February 19, 2025</time>
                    </div>
                    <h3>Undersea Cable Infrastructure Challenges</h3>
                    <p>
                        Protecting the global network of undersea cables is vital to U.S. national security. Every day, $10 trillion in financial transactions and 99% of internet traffic flows through these cables.
                    </p>
                    <a href="#" class="read-more">Read Full Article →</a>
                </article>
            </div>

            <div style="text-align: center; margin-top: var(--spacing-md);">
                <a href="#" class="btn btn-secondary">View All Articles</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>