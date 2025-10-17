<?php
/**
 * Template for The Third Rail blog page
 */

get_header(); ?>

<style>
.page-banner {
    background: linear-gradient(rgba(255, 255, 255, 0.75), rgba(255, 255, 255, 0.75)), url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    border-bottom: 3px solid var(--accent-color);
    padding: 2rem 0 1.5rem;
}

.page-banner-content {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    text-align: center;
}

.page-banner h1 {
    font-family: var(--font-secondary);
    font-size: 8rem;
    color: var(--primary-color);
    font-weight: 800;
    margin-bottom: 0.3rem;
    line-height: 1;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.15);
}

.page-nav {
    display: flex;
    justify-content: center;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-sm);
    flex-wrap: wrap;
}

.page-nav a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    font-size: 1.05rem;
    padding: 0.5rem 1rem;
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.page-nav a:hover,
.page-nav a.active {
    background: var(--accent-color);
    color: var(--white);
}

.page-banner p {
    font-size: 1.4rem;
    color: var(--text-secondary);
    font-style: italic;
    margin: 0;
}
</style>

<main class="main-content">
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="page-banner-content">
            <h1>
                <span style="font-style: italic; color: var(--primary-color); font-size: 1.15em;">Virginia</span>
                <span style="font-weight: 800; color: var(--primary-color);"> Policy Review</span>
            </h1>
            <nav class="page-nav">
                <a href="<?php echo home_url('/'); ?>">Home</a>
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
                <a href="<?php echo home_url('/the-third-rail'); ?>" class="active">The Third Rail</a>
                <a href="<?php echo home_url('/journal-issues'); ?>">Journal Issues</a>
                <a href="<?php echo home_url('/academical'); ?>">Academical</a>
                <a href="<?php echo home_url('/submissions'); ?>">Submissions</a>
            </nav>
            <p>Shorter takes on big issues - timely policy analysis and commentary</p>
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