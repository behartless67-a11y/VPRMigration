<?php
/**
 * Single Post Template - Article Page
 * Matches homepage Cornell-style design
 */

get_header(); ?>

<style>
/* Hide default header */
.site-header {
    display: none;
}

.main-content {
    padding: 0;
}

/* Banner matching homepage */
.cornell-banner {
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 4rem 0 2rem;
}

.cornell-banner-content {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 2rem;
    text-align: center;
}

.cornell-banner h1 {
    font-family: var(--font-secondary);
    font-size: 8rem;
    color: var(--primary-color);
    font-weight: 800;
    margin-bottom: 0.3rem;
    line-height: 1;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.15);
}

.cornell-nav {
    display: flex;
    justify-content: center;
    gap: 2.5rem;
    margin-bottom: 0.5rem;
}

.cornell-nav a {
    font-family: var(--font-secondary);
    font-size: 1.6rem;
    color: var(--primary-color);
    text-decoration: none;
    position: relative;
    transition: color 0.3s ease;
}

.cornell-nav a:hover,
.cornell-nav a.active {
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

.cornell-nav a:hover::after,
.cornell-nav a.active::after {
    width: 100%;
}

.cornell-banner p {
    font-size: 1.8rem;
    color: var(--text-secondary);
    max-width: 1200px;
    margin: 0 auto;
    line-height: 1.3;
}

/* Article Content Section */
.article-section {
    background: white;
    padding: 3rem 0 4rem;
}

.article-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 2rem;
}

/* Article Header */
.article-header {
    text-align: center;
    margin-bottom: 3rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--border-color);
}

.article-category {
    background: var(--accent-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 3px;
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    display: inline-block;
    margin-bottom: 1.5rem;
}

.article-title {
    font-family: var(--font-secondary);
    font-size: 3rem;
    line-height: 1.2;
    color: var(--primary-color);
    margin-bottom: 1rem;
    font-weight: 700;
}

.article-meta {
    color: var(--text-light);
    font-size: 1rem;
    margin-bottom: 2rem;
}

.article-meta time {
    margin-right: 1rem;
}

/* Featured Image */
.article-featured-image {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto 3rem;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.article-featured-image img {
    width: 100%;
    height: auto;
    display: block;
}

/* Article Content */
.article-content {
    font-size: 1.1rem;
    line-height: 1.9;
    color: var(--text-primary);
}

.article-content h2 {
    font-family: var(--font-secondary);
    font-size: 2rem;
    color: var(--primary-color);
    margin-top: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 700;
}

.article-content h3 {
    font-family: var(--font-secondary);
    font-size: 1.5rem;
    color: var(--primary-color);
    margin-top: 2rem;
    margin-bottom: 0.8rem;
    font-weight: 600;
}

.article-content p {
    margin-bottom: 1.5rem;
}

.article-content ul,
.article-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.article-content li {
    margin-bottom: 0.5rem;
}

.article-content blockquote {
    border-left: 4px solid var(--accent-color);
    padding-left: 2rem;
    margin: 2rem 0;
    font-style: italic;
    color: var(--text-secondary);
}

/* Author Bio */
.article-author {
    margin-top: 3rem;
    padding: 2rem;
    background: #f8f9fa;
    border-left: 4px solid var(--accent-color);
    border-radius: 4px;
}

.article-author h3 {
    font-family: var(--font-secondary);
    font-size: 1.3rem;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.article-author p {
    margin-bottom: 0;
    line-height: 1.7;
}

/* Disclaimer */
.article-disclaimer {
    margin-top: 2rem;
    padding: 1.5rem;
    background: #fff9e6;
    border: 1px solid #ffd966;
    border-radius: 4px;
    font-size: 0.9rem;
    line-height: 1.6;
    color: #666;
}

/* Back to articles link */
.back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 600;
    margin-bottom: 2rem;
    transition: gap 0.3s ease;
}

.back-link:hover {
    gap: 0.8rem;
}

/* Responsive */
@media (max-width: 768px) {
    .cornell-banner h1 {
        font-size: 3rem;
    }

    .article-title {
        font-size: 2rem;
    }

    .cornell-nav {
        flex-wrap: wrap;
        gap: 1rem;
    }
}
</style>

<main class="main-content">
    <!-- Banner - Same as Homepage -->
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

    <!-- Article Content -->
    <section class="article-section">
        <div class="article-container">
            <?php while (have_posts()) : the_post(); ?>

            <a href="<?php echo home_url('/'); ?>" class="back-link">← Back to Articles</a>

            <article class="article">
                <!-- Article Header -->
                <header class="article-header">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<span class="article-category">' . esc_html($categories[0]->name) . '</span>';
                    }
                    ?>

                    <h1 class="article-title"><?php the_title(); ?></h1>

                    <div class="article-meta">
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
                        <?php if (get_the_author()) : ?>
                            <span>by <?php the_author(); ?></span>
                        <?php endif; ?>
                    </div>
                </header>

                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                <div class="article-featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <?php endif; ?>

                <!-- Article Content -->
                <div class="article-content">
                    <?php the_content(); ?>
                </div>

            </article>

            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
