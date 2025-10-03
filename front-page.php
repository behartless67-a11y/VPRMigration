<?php
/**
 * Front Page Template
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
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
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
    padding: 0 2rem 1rem;
    text-align: center;
}

.cornell-banner h1 {
    font-family: var(--font-secondary);
    font-size: 8rem;
    color: var(--primary-color);
    font-weight: 800;
    margin-bottom: 1rem;
    line-height: 1;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.15);
}

.cornell-banner h1 span {
    -webkit-text-stroke: 1px var(--accent-color);
    text-stroke: 1px var(--accent-color);
}

.cornell-nav {
    display: flex;
    justify-content: center;
    gap: 2.5rem;
    margin-bottom: 1rem;
}

.cornell-nav a {
    font-family: var(--font-secondary);
    font-size: 1.6rem;
    color: var(--primary-color);
    text-decoration: none;
    position: relative;
    transition: color 0.3s ease;
    white-space: nowrap;
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
    font-size: 1.8rem;
    color: var(--text-secondary);
    max-width: 1200px;
    margin: 0 auto;
    line-height: 1.3;
}

/* Featured Section - Slideshow */
.featured-section {
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 2rem 0 3rem;
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
    text-align: center;
}

/* Slideshow Styles */
.featured-slideshow-container {
    position: relative;
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    overflow: hidden;
}

.featured-slideshow {
    position: relative;
    height: 550px;
}

.featured-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    background: var(--white);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    opacity: 0;
    transform: translateX(100%);
    transition: opacity 0.6s ease, transform 0.6s ease;
    pointer-events: none;
}

.featured-slide.active {
    opacity: 1;
    transform: translateX(0);
    pointer-events: auto;
}

.featured-slide-image {
    width: 100%;
    height: 100%;
    overflow: hidden;
    position: relative;
}

.featured-slide-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.featured-slide:hover .featured-slide-image img {
    transform: scale(1.05);
}

.featured-slide-content {
    padding: 3rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.featured-slide-content .featured-article-meta {
    display: flex;
    gap: 1rem;
    align-items: center;
    margin-bottom: 1.5rem;
}

.featured-slide-content h3 {
    font-size: 2.8rem;
    font-family: var(--font-secondary);
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-weight: 700;
}

.featured-slide-content p {
    font-size: 1.15rem;
    line-height: 1.8;
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
}

/* Slideshow Navigation Buttons */
.slideshow-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.95);
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    font-size: 3rem;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
    padding: 0;
}

.slideshow-nav:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-50%) scale(1.1);
}

.slideshow-nav.prev {
    left: -20px;
}

.slideshow-nav.next {
    right: -20px;
}

/* Slideshow Indicators */
.slideshow-indicators {
    position: absolute;
    bottom: 25px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 12px;
    z-index: 10;
}

.slideshow-indicators .indicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.6);
    border: 2px solid var(--primary-color);
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
}

.slideshow-indicators .indicator:hover {
    background: rgba(35, 45, 75, 0.6);
    transform: scale(1.2);
}

.slideshow-indicators .indicator.active {
    background: var(--accent-color);
    border-color: var(--accent-color);
    width: 30px;
    border-radius: 6px;
}

/* Floating Social Media Links */
.floating-social {
    position: fixed;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 15px;
    z-index: 100;
}

.social-float-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    background: var(--primary-color);
    color: white;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.social-float-link:hover {
    background: var(--accent-color);
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(229, 114, 0, 0.4);
}

.social-float-link svg {
    width: 22px;
    height: 22px;
}

/* Hide on mobile */
@media (max-width: 768px) {
    .floating-social {
        display: none;
    }
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
    position: relative;
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
    display: flex;
    gap: 1rem;
}

.featured-sidebar .sidebar-article:first-child {
    padding-top: 0;
}

.sidebar-article-thumbnail {
    width: 100px;
    height: 100px;
    flex-shrink: 0;
    overflow: hidden;
    border-radius: 4px;
}

.sidebar-article-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.sidebar-article-content {
    flex: 1;
}

.featured-sidebar .sidebar-article h3 {
    font-family: var(--font-secondary);
    font-size: 1.2rem;
    line-height: 1.3;
    margin-top: 0.5rem;
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

.sidebar-article-excerpt {
    font-size: 0.9rem;
    line-height: 1.5;
    color: var(--text-secondary);
    margin-top: 0.5rem;
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
            <h1>
                <span style="font-style: italic; color: var(--primary-color); font-size: 1.15em;">Virginia</span>
                <span style="font-weight: 800; color: var(--accent-color);"> Policy Review</span>
            </h1>
            <nav class="cornell-nav">
                <a href="<?php echo home_url('/'); ?>">Home</a>
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
                <a href="<?php echo home_url('/the-third-rail'); ?>">The Third Rail</a>
                <a href="<?php echo home_url('/academical'); ?>">Academical</a>
                <a href="<?php echo home_url('/submissions'); ?>">Submissions</a>
            </nav>
            <p>Student perspectives on policy, research, and public affairs from the University of Virginia</p>
        </div>
    </section>

    <!-- Featured Section - Slideshow -->
    <section class="featured-section">
        <div class="featured-container">
            <div class="featured-label">FEATURED</div>

            <!-- Featured Articles Slideshow -->
            <div class="featured-slideshow-container">
                <div class="featured-slideshow">
                    <!-- Slide 1 -->
                    <article class="featured-slide active">
                        <div class="featured-slide-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/humanitarian-aid-unsplash.jpg" alt="Sudan Famine Crisis">
                            <div class="image-attribution">Photo by Joel Muniz on Unsplash</div>
                        </div>
                        <div class="featured-slide-content">
                            <div class="featured-article-meta">
                                <span class="category-tag">International</span>
                                <time class="article-date-text">March 5, 2025</time>
                            </div>
                            <h3>Unpacking Famine in Sudan: War, Displacement, and the Humanitarian Crisis</h3>
                            <p>
                                In early August, famine was confirmed in Zamzam, a camp in Sudan's North Darfur region that houses half a million displaced people. Understanding this crisis requires examining how conflict exacerbates humanitarian disasters and the international community's response.
                            </p>
                            <a href="<?php echo home_url('/2025/10/02/unpacking-famine-in-sudan/'); ?>" class="read-more-btn">Read Full Article →</a>
                        </div>
                    </article>

                    <!-- Slide 2 -->
                    <article class="featured-slide">
                        <div class="featured-slide-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/middle-east-desert-unsplash.jpg" alt="Middle East Desert Landscape">
                            <div class="image-attribution">Photo by Sergey Pesterev on Unsplash</div>
                        </div>
                        <div class="featured-slide-content">
                            <div class="featured-article-meta">
                                <span class="category-tag">International</span>
                                <time class="article-date-text">February 26, 2025</time>
                            </div>
                            <h3>Replacing Bashar with HTS: A False Sense of Safety for Israel</h3>
                            <p>
                                As Syria's political landscape shifts with HTS gaining power, Israel faces new security challenges that may prove more complex than the Assad regime. While Syria's situation highlights Iran's eroding foothold, the unpredictable nature of HTS-led governance presents new concerns.
                            </p>
                            <a href="<?php echo home_url('/2025/10/02/replacing-bashar-with-hts-a-false-sense-of-safety-for-israel/'); ?>" class="read-more-btn">Read Full Article →</a>
                        </div>
                    </article>

                    <!-- Slide 3 -->
                    <article class="featured-slide">
                        <div class="featured-slide-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/fiber-optic-unsplash.jpg" alt="Fiber Optic Cable Infrastructure">
                            <div class="image-attribution">Photo by Compare Fibre on Unsplash</div>
                        </div>
                        <div class="featured-slide-content">
                            <div class="featured-article-meta">
                                <span class="category-tag">Security</span>
                                <time class="article-date-text">February 19, 2025</time>
                            </div>
                            <h3>Current Landscape and Challenges With Undersea Cable Infrastructure</h3>
                            <p>
                                Protecting the global network of undersea cables is vital to U.S. national security and global stability. Every day, $10 trillion in financial transactions and 99% of internet traffic flows through these critical connections. New policy frameworks aim to safeguard this infrastructure from emerging threats.
                            </p>
                            <a href="<?php echo home_url('/2025/10/02/current-landscape-and-challenges-with-undersea-cable-infrastructure/'); ?>" class="read-more-btn">Read Full Article →</a>
                        </div>
                    </article>
                </div>

                <!-- Slideshow Controls -->
                <button class="slideshow-nav prev" aria-label="Previous article">‹</button>
                <button class="slideshow-nav next" aria-label="Next article">›</button>

                <!-- Slideshow Indicators -->
                <div class="slideshow-indicators">
                    <button class="indicator active" data-slide="0" aria-label="Go to article 1"></button>
                    <button class="indicator" data-slide="1" aria-label="Go to article 2"></button>
                    <button class="indicator" data-slide="2" aria-label="Go to article 3"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- 4-Column Articles Grid -->
    <section class="articles-section">
        <div class="articles-container">
            <h2 class="section-title">Latest Articles</h2>

            <div class="articles-grid-4">
                <?php
                // Query for 8 recent articles
                $recent_articles = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 8,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($recent_articles->have_posts()) :
                    while ($recent_articles->have_posts()) : $recent_articles->the_post();
                        $categories = get_the_category();
                        $category_name = !empty($categories) ? $categories[0]->name : 'Uncategorized';
                ?>
                <article class="grid-article-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="grid-article-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="grid-article-image">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/lawn.jpg" alt="<?php the_title(); ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="grid-article-content">
                        <div class="article-meta">
                            <span class="category-tag"><?php echo esc_html($category_name); ?></span>
                        </div>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="grid-article-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more-btn">Read More →</a>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="load-more-section">
                <a href="<?php echo home_url('/the-third-rail'); ?>" class="btn-load-more">Load More Articles</a>
            </div>
        </div>
    </section>
</main>

<!-- Floating Social Media Links -->
<div class="floating-social">
    <a href="https://www.instagram.com/virginiapolicyreview" target="_blank" aria-label="Instagram" class="social-float-link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
        </svg>
    </a>
    <a href="https://www.facebook.com/virginiapolicyreview" target="_blank" aria-label="Facebook" class="social-float-link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
        </svg>
    </a>
    <a href="https://twitter.com/vapolicyreview" target="_blank" aria-label="Twitter" class="social-float-link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
        </svg>
    </a>
    <a href="https://www.linkedin.com/company/virginia-policy-review" target="_blank" aria-label="LinkedIn" class="social-float-link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
        </svg>
    </a>
</div>

<!-- Slideshow Script -->
<script src="<?php echo get_template_directory_uri(); ?>/js/slideshow.js"></script>

<?php get_footer(); ?>
