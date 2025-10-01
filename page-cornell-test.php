<?php
/**
 * Template Name: Cornell-Inspired Test
 * Cornell-style magazine layout with UVA branding
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

/* Combined Header + Featured Section - Cornell Style */
.cornell-banner {
    background: linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 4rem 0 0;
    margin-top: 0;
}

.cornell-banner-content {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 2rem 1.5rem;
    text-align: center;
}

.cornell-banner h1 {
    font-family: var(--font-secondary);
    font-size: 5.5rem;
    color: var(--primary-color);
    font-weight: 800;
    margin-bottom: 0.5rem;
}

.cornell-nav {
    display: flex;
    justify-content: center;
    gap: 3rem;
    margin-bottom: 0.8rem;
}

.cornell-nav a {
    font-family: var(--font-secondary);
    font-size: 1.1rem;
    color: var(--primary-color);
    text-decoration: none;
    position: relative;
    transition: color 0.3s ease;
}

.cornell-nav a:hover {
    color: var(--accent-color);
}

.cornell-nav a::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--accent-color);
    transition: width 0.3s ease;
}

.cornell-nav a:hover::after {
    width: 100%;
}

.cornell-banner p {
    font-size: 1.5rem;
    color: var(--text-secondary);
    max-width: 900px;
    margin: 0 auto;
}

/* Featured Section - Cornell Style */
.featured-section {
    background: linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 1.5rem 0 3rem;
    border-bottom: 1px solid var(--border-color);
}

.featured-container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 2rem;
}

.featured-label {
    font-family: var(--font-primary);
    font-size: 0.9rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--accent-color);
    margin-bottom: 2rem;
}

.featured-main {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 3rem;
    margin-bottom: 3rem;
}

.featured-article-image {
    width: 100%;
    aspect-ratio: 16/10;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 1.5rem;
}

.featured-article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.featured-article-image:hover img {
    transform: scale(1.05);
}

.featured-article-meta {
    display: flex;
    gap: 1rem;
    align-items: center;
    margin-bottom: 1rem;
}

.category-tag {
    background: var(--accent-color);
    color: white;
    padding: 0.4rem 0.9rem;
    border-radius: 3px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.article-date-text {
    color: var(--text-light);
    font-size: 0.9rem;
}

.featured-article h2 {
    font-family: var(--font-secondary);
    font-size: 2.6rem;
    line-height: 1.2;
    margin-bottom: 1rem;
    font-weight: 700;
}

.featured-article h2 a {
    color: var(--primary-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.featured-article h2 a:hover {
    color: var(--accent-color);
}

.featured-article-excerpt {
    font-size: 1.1rem;
    line-height: 1.7;
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
}

.featured-sidebar .sidebar-article {
    padding: 1.5rem 0;
    border-bottom: 1px solid var(--border-color);
}

.featured-sidebar .sidebar-article:first-child {
    padding-top: 0;
}

.featured-sidebar .sidebar-article h3 {
    font-family: var(--font-secondary);
    font-size: 1.3rem;
    line-height: 1.3;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.featured-sidebar .sidebar-article h3 a {
    color: var(--primary-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.featured-sidebar .sidebar-article h3 a:hover {
    color: var(--accent-color);
}

/* 4-Column Article Grid - Cornell Style */
.articles-section {
    background: white;
    padding: 4rem 0;
}

.articles-container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 2rem;
}

.section-title {
    font-family: var(--font-secondary);
    font-size: 2rem;
    color: var(--primary-color);
    font-weight: 700;
    margin-bottom: 2.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--primary-color);
}

.articles-grid-4 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    margin-bottom: 3rem;
}

.grid-article-card {
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.grid-article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border-color: var(--accent-color);
}

.grid-article-image {
    width: 100%;
    aspect-ratio: 3/2;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
    overflow: hidden;
}

.grid-article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.grid-article-card:hover .grid-article-image img {
    transform: scale(1.08);
}

.grid-article-content {
    padding: 1.5rem;
}

.grid-article-content .article-meta {
    margin-bottom: 1rem;
}

.grid-article-content h3 {
    font-family: var(--font-secondary);
    font-size: 1.25rem;
    line-height: 1.3;
    margin-bottom: 0.8rem;
    font-weight: 600;
}

.grid-article-content h3 a {
    color: var(--primary-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.grid-article-content h3 a:hover {
    color: var(--accent-color);
}

.grid-article-excerpt {
    font-size: 0.95rem;
    line-height: 1.6;
    color: var(--text-secondary);
    margin-bottom: 1rem;
}

.read-more-btn {
    color: var(--accent-color);
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    transition: gap 0.3s ease;
}

.read-more-btn:hover {
    gap: 0.6rem;
}

/* Image Attribution */
.image-attribution {
    font-size: 0.65rem;
    color: #999;
    padding: 0.3rem 0.5rem;
    background: rgba(255, 255, 255, 0.9);
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
}

.grid-article-image {
    position: relative;
}

/* Load More */
.load-more-section {
    text-align: center;
    margin-top: 2rem;
}

.btn-load-more {
    background: var(--primary-color);
    color: white;
    padding: 1rem 3rem;
    border: none;
    border-radius: 4px;
    font-family: var(--font-primary);
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-load-more:hover {
    background: var(--accent-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(229, 114, 0, 0.3);
}

/* Responsive */
@media (max-width: 1100px) {
    .articles-grid-4 {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 900px) {
    .featured-main {
        grid-template-columns: 1fr;
    }

    .articles-grid-4 {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .articles-grid-4 {
        grid-template-columns: 1fr;
    }

    .cornell-banner h1 {
        font-size: 2.5rem;
    }
}
</style>

<main class="main-content">
    <!-- Clean Banner - Cornell Style -->
    <section class="cornell-banner">
        <div class="cornell-banner-content">
            <h1>Virginia Policy Review</h1>
            <nav class="cornell-nav">
                <a href="<?php echo home_url('/'); ?>">Home</a>
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
                <a href="<?php echo home_url('/the-third-rail'); ?>">The Third Rail</a>
                <a href="<?php echo home_url('/academical'); ?>">Academical</a>
                <a href="<?php echo home_url('/journal-issues'); ?>">Journal Issues</a>
                <a href="<?php echo home_url('/contact'); ?>">Contact</a>
            </nav>
            <p>Student perspectives on policy, research, and public affairs from the University of Virginia</p>
        </div>
    </section>

    <!-- Featured Section -->
    <section class="featured-section">
        <div class="featured-container">
            <div class="featured-label">FEATURED</div>

            <div class="featured-main">
                <div class="featured-article">
                    <div class="featured-article-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/lawn.jpg" alt="Featured Article">
                    </div>
                    <div class="featured-article-meta">
                        <span class="category-tag">International</span>
                        <time class="article-date-text">March 5, 2025</time>
                    </div>
                    <h2><a href="<?php echo home_url('/unpacking-famine-in-sudan'); ?>">Unpacking Famine in Sudan: War, Displacement, and the Humanitarian Crisis</a></h2>
                    <p class="featured-article-excerpt">
                        In early August, famine was confirmed in Zamzam, a camp in Sudan's North Darfur region that houses half a million displaced people. Understanding this crisis requires examining how conflict exacerbates humanitarian disasters and the international community's response.
                    </p>
                    <a href="<?php echo home_url('/unpacking-famine-in-sudan'); ?>" class="read-more-btn">Read Full Article →</a>
                </div>

                <div class="featured-sidebar">
                    <div class="sidebar-article">
                        <div class="article-meta">
                            <span class="category-tag">International</span>
                            <time class="article-date-text">Feb 26, 2025</time>
                        </div>
                        <h3><a href="#">Replacing Bashar with HTS: A False Sense of Safety for Israel</a></h3>
                    </div>

                    <div class="sidebar-article">
                        <div class="article-meta">
                            <span class="category-tag">Security</span>
                            <time class="article-date-text">Feb 19, 2025</time>
                        </div>
                        <h3><a href="#">Protecting Critical Undersea Cable Infrastructure</a></h3>
                    </div>

                    <div class="sidebar-article">
                        <div class="article-meta">
                            <span class="category-tag">Urban Policy</span>
                            <time class="article-date-text">Feb 12, 2025</time>
                        </div>
                        <h3><a href="#">Public Transportation Access in Kansas City</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4-Column Articles Grid -->
    <section class="articles-section">
        <div class="articles-container">
            <h2 class="section-title">Latest Articles</h2>

            <div class="articles-grid-4">
                <article class="grid-article-card">
                    <div class="grid-article-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/syria.jpg" alt="Article">
                        <div class="image-attribution">Photo by Unsplash</div>
                    </div>
                    <div class="grid-article-content">
                        <div class="article-meta">
                            <span class="category-tag">International</span>
                        </div>
                        <h3><a href="#">Syria Without Assad: What Russia Stands to Lose</a></h3>
                        <p class="grid-article-excerpt">Assad's asylum in Moscow marks a turning point for Russia's influence in the region.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="grid-article-card">
                    <div class="grid-article-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/healthcare.jpg" alt="Article">
                        <div class="image-attribution">Photo by Unsplash</div>
                    </div>
                    <div class="grid-article-content">
                        <div class="article-meta">
                            <span class="category-tag">Domestic</span>
                        </div>
                        <h3><a href="#">Healthcare Access in Rural Virginia Communities</a></h3>
                        <p class="grid-article-excerpt">Rural communities face growing challenges as facilities close and providers relocate.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="grid-article-card">
                    <div class="grid-article-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/agriculture.jpg" alt="Article">
                        <div class="image-attribution">Photo by Unsplash</div>
                    </div>
                    <div class="grid-article-content">
                        <div class="article-meta">
                            <span class="category-tag">Environment</span>
                        </div>
                        <h3><a href="#">Climate Policy and Agricultural Innovation</a></h3>
                        <p class="grid-article-excerpt">New sustainable farming approaches could revolutionize climate change mitigation.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="grid-article-card">
                    <div class="grid-article-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cybersecurity.jpg" alt="Article">
                        <div class="image-attribution">Photo by Unsplash</div>
                    </div>
                    <div class="grid-article-content">
                        <div class="article-meta">
                            <span class="category-tag">Security</span>
                        </div>
                        <h3><a href="#">Cybersecurity in Critical Infrastructure</a></h3>
                        <p class="grid-article-excerpt">Protecting essential systems from emerging cyber threats requires new approaches.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="grid-article-card">
                    <div class="grid-article-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/education.jpg" alt="Article">
                        <div class="image-attribution">Photo by Unsplash</div>
                    </div>
                    <div class="grid-article-content">
                        <div class="article-meta">
                            <span class="category-tag">Education</span>
                        </div>
                        <h3><a href="#">Student Debt and Higher Education Reform</a></h3>
                        <p class="grid-article-excerpt">Examining policy solutions to the growing student debt crisis in America.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="grid-article-card">
                    <div class="grid-article-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/economics.jpg" alt="Article">
                        <div class="image-attribution">Photo by Unsplash</div>
                    </div>
                    <div class="grid-article-content">
                        <div class="article-meta">
                            <span class="category-tag">Economics</span>
                        </div>
                        <h3><a href="#">Inflation and Monetary Policy Responses</a></h3>
                        <p class="grid-article-excerpt">How central banks navigate the challenges of persistent inflation.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="grid-article-card">
                    <div class="grid-article-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ai.jpg" alt="Article">
                        <div class="image-attribution">Photo by Unsplash</div>
                    </div>
                    <div class="grid-article-content">
                        <div class="article-meta">
                            <span class="category-tag">Technology</span>
                        </div>
                        <h3><a href="#">AI Regulation and Ethical Frameworks</a></h3>
                        <p class="grid-article-excerpt">Balancing innovation with responsibility in artificial intelligence policy.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="grid-article-card">
                    <div class="grid-article-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/justice.jpg" alt="Article">
                        <div class="image-attribution">Photo by Unsplash</div>
                    </div>
                    <div class="grid-article-content">
                        <div class="article-meta">
                            <span class="category-tag">Social Policy</span>
                        </div>
                        <h3><a href="#">Criminal Justice Reform in Virginia</a></h3>
                        <p class="grid-article-excerpt">Examining recent policy changes and their impact on communities.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>
            </div>

            <div class="load-more-section">
                <button class="btn-load-more">Load More Articles</button>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
