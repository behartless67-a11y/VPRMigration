<?php
/**
 * Template Name: The Third Rail Blog (Dynamic)
 * Displays all blog articles with year and category filtering
 */

get_header();

// Get year from URL parameter, default to 'all'
$selected_year = isset($_GET['year']) ? $_GET['year'] : 'all';
$selected_category = isset($_GET['cat']) ? $_GET['cat'] : 'all';

// Build query args
$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => 20,
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    'orderby' => 'date',
    'order' => 'DESC'
);

// Filter by year
if ($selected_year !== 'all') {
    $query_args['year'] = $selected_year;
}

// Filter by category
if ($selected_category !== 'all') {
    $query_args['category_name'] = $selected_category;
}

$blog_query = new WP_Query($query_args);

// Get available years from posts
$years_query = $wpdb->get_col("
    SELECT DISTINCT YEAR(post_date)
    FROM {$wpdb->posts}
    WHERE post_type = 'post' AND post_status = 'publish'
    ORDER BY post_date DESC
");

?>

<style>
/* Hide default header */
.site-header {
    display: none;
}

.main-content {
    padding: 0;
}

/* Header Banner */
.page-banner {
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 4rem 0 2rem;
}

.page-banner-content {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 2rem;
    text-align: center;
}

.page-banner h1 {
    font-family: var(--font-secondary);
    font-size: 6.5rem;
    color: var(--primary-color);
    font-weight: 800;
    margin-bottom: 0.3rem;
    line-height: 1;
}

.page-nav {
    display: flex;
    justify-content: center;
    gap: 2.5rem;
    margin-bottom: 0.5rem;
}

.page-nav a {
    font-family: var(--font-secondary);
    font-size: 1.2rem;
    color: var(--primary-color);
    text-decoration: none;
    position: relative;
    transition: color 0.3s ease;
}

.page-nav a:hover,
.page-nav a.active {
    color: var(--accent-color);
}

.page-nav a::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--accent-color);
    transition: width 0.3s ease;
}

.page-nav a:hover::after,
.page-nav a.active::after {
    width: 100%;
}

.page-banner p {
    font-size: 1.4rem;
    color: var(--text-secondary);
    max-width: 1200px;
    margin: 0 auto;
    line-height: 1.3;
}

/* Filters */
.filters-bar {
    background: white;
    padding: 1.5rem 0;
    border-bottom: 2px solid var(--border-color);
}

.filters-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
}

.filter-select {
    padding: 0.75rem 1rem;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    font-family: var(--font-primary);
    font-size: 1rem;
    background: white;
    cursor: pointer;
}

/* Articles List */
.articles-section {
    background: white;
    padding: 3rem 0;
}

.articles-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 2rem;
}

.article-item {
    border-bottom: 2px solid var(--border-color);
    padding-bottom: 2rem;
    margin-bottom: 2.5rem;
}

.article-item:last-child {
    border-bottom: none;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.category-badge {
    background: var(--accent-color);
    color: white;
    padding: 0.4rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

.article-date {
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.article-title {
    font-size: 2rem;
    margin-bottom: 1rem;
    font-family: var(--font-secondary);
    line-height: 1.3;
}

.article-title a {
    color: var(--primary-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.article-title a:hover {
    color: var(--accent-color);
}

.article-excerpt {
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 1rem;
    color: var(--text-primary);
}

.continue-reading {
    color: var(--accent-color);
    font-weight: 600;
    text-decoration: none;
    font-size: 1.05rem;
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    transition: gap 0.3s ease;
}

.continue-reading:hover {
    gap: 0.6rem;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    align-items: center;
    margin-top: 3rem;
}

.pagination a,
.pagination span {
    padding: 0.75rem 1rem;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    text-decoration: none;
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.pagination a:hover {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

.pagination .current {
    background: var(--accent-color);
    color: white;
    border-color: var(--accent-color);
}

@media (max-width: 768px) {
    .page-banner h1 {
        font-size: 3rem;
    }

    .filters-container {
        flex-direction: column;
        align-items: stretch;
    }

    .filter-select {
        width: 100%;
    }
}
</style>

<main class="main-content">
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="page-banner-content">
            <h1>
                <span style="font-style: italic; color: var(--primary-color);">Virginia</span>
                <span style="font-weight: 800; color: var(--accent-color);"> Policy Review</span>
            </h1>
            <nav class="page-nav">
                <a href="<?php echo home_url('/'); ?>">Home</a>
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
                <a href="<?php echo home_url('/the-third-rail'); ?>" class="active">The Third Rail</a>
                <a href="<?php echo home_url('/academical'); ?>">Academical</a>
                <a href="<?php echo home_url('/submissions'); ?>">Submissions</a>
            </nav>
            <p>Shorter takes on big issues - timely policy analysis and commentary</p>
        </div>
    </section>

    <!-- Filters -->
    <section class="filters-bar">
        <div class="filters-container">
            <label for="categoryFilter" style="font-weight: 600;">Filter by Category:</label>
            <select id="categoryFilter" class="filter-select">
                <option value="all">All Categories</option>
                <?php
                $categories = get_categories(array('hide_empty' => true));
                foreach ($categories as $category) :
                    if ($category->name !== 'Uncategorized') :
                ?>
                    <option value="<?php echo $category->slug; ?>" <?php echo $selected_category === $category->slug ? 'selected' : ''; ?>>
                        <?php echo $category->name; ?>
                    </option>
                <?php
                    endif;
                endforeach;
                ?>
            </select>

            <span style="margin-left: auto; color: var(--text-secondary);">
                Showing <?php echo $blog_query->post_count; ?> of <?php echo $blog_query->found_posts; ?> articles
            </span>
        </div>
    </section>

    <!-- Articles List -->
    <section class="articles-section">
        <div class="articles-container">
            <?php if ($blog_query->have_posts()) : ?>
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <article class="article-item">
                        <div class="article-meta">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                            ?>
                                <span class="category-badge"><?php echo esc_html($categories[0]->name); ?></span>
                            <?php endif; ?>
                            <time class="article-date" datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date('F j, Y'); ?>
                            </time>
                        </div>

                        <h2 class="article-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <?php
                        // Extract author from content if it starts with "by [Name]"
                        $content = get_the_content();
                        $content = wp_strip_all_tags($content);

                        // Check if content starts with "by [First Last]" (case insensitive)
                        $author_name = '';
                        if (preg_match('/^by\s+([A-Z][a-z]+(?:\s+[A-Z][a-z]+)*)/i', $content, $matches)) {
                            $author_name = trim($matches[1]);
                            // Remove the entire "by Author" part from content (everything up to first capital letter)
                            $content = preg_replace('/^by\s+[A-Z][a-z]+(?:\s+[A-Z][a-z]+)*\s*/i', '', $content);
                        }
                        ?>

                        <?php if ($author_name) : ?>
                            <p style="font-style: italic; color: var(--text-secondary); margin-bottom: 1rem;">
                                By <?php echo esc_html($author_name); ?>
                            </p>
                        <?php endif; ?>

                        <div class="article-excerpt">
                            <?php
                            $excerpt = wp_trim_words($content, 100, '...');
                            echo $excerpt;
                            ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="continue-reading">
                            Continue reading →
                        </a>
                    </article>
                <?php endwhile; ?>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $blog_query->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <p style="text-align: center; font-size: 1.2rem; color: var(--text-secondary); padding: 3rem 0;">
                    No articles found. Try selecting a different year or category.
                </p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        </div>
    </section>
</main>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('categoryFilter');

    categoryFilter.addEventListener('change', function() {
        const category = this.value;
        let url = window.location.pathname;

        if (category !== 'all') {
            url += '?cat=' + category;
        }

        window.location.href = url;
    });
});
</script>

<?php get_footer(); ?>
