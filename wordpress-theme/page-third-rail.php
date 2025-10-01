<?php
/**
 * Template for The Third Rail blog page
 */

get_header(); ?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero" style="min-height: 35vh; padding-top: 100px; padding-bottom: var(--spacing-lg);">
        <div class="container">
            <div class="text-center">
                <h1 style="font-size: clamp(2.5rem, 6vw, 4rem); margin-bottom: var(--spacing-sm); font-family: var(--font-secondary); color: var(--primary-color);">The Third Rail</h1>
                <p style="font-size: 1.3rem; color: var(--text-primary); max-width: 800px; margin: 0 auto var(--spacing-sm); font-family: var(--font-secondary);">
                    Shorter takes on big issues
                </p>
                <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 700px; margin: 0 auto;">
                    Our blog features timely policy analysis, opinion pieces, and commentary on developing situations as they happen.
                </p>
            </div>
        </div>
    </section>

    <!-- Search and Categories -->
    <section style="background: var(--secondary-color); padding: var(--spacing-sm) 0;">
        <div class="container" style="max-width: 1100px;">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: var(--spacing-md);">
                <!-- Search -->
                <div style="flex: 1; min-width: 300px;">
                    <form role="search" method="get" action="<?php echo home_url('/'); ?>" style="display: flex; gap: var(--spacing-xs);">
                        <input type="search" placeholder="Search articles..." name="s"
                               style="flex: 1; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--border-radius); font-family: var(--font-primary);">
                        <button type="submit" class="btn btn-primary" style="padding: 0.75rem 1.5rem;">
                            Search
                        </button>
                    </form>
                </div>

                <!-- Categories Filter -->
                <div>
                    <select id="categoryFilter" style="padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--border-radius); font-family: var(--font-primary);">
                        <option value="all">All Categories</option>
                        <option value="domestic">Domestic</option>
                        <option value="economics">Economics</option>
                        <option value="education">Education</option>
                        <option value="electoral-politics">Electoral Politics</option>
                        <option value="environment">Environment</option>
                        <option value="gun-rights">Gun Rights</option>
                        <option value="health">Health</option>
                        <option value="international">International</option>
                        <option value="justice">Justice</option>
                        <option value="law">Law</option>
                        <option value="politics">Politics</option>
                        <option value="security">Security</option>
                        <option value="social">Social</option>
                        <option value="urban">Urban</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles List -->
    <section style="padding: var(--spacing-lg) 0;">
        <div class="container" style="max-width: 1100px;">
            <div id="articlesList" style="display: flex; flex-direction: column; gap: var(--spacing-xl);">
                <!-- Article 1: Sudan Famine -->
                <article class="article-item" data-category="international" style="border-bottom: 2px solid var(--border-color); padding-bottom: var(--spacing-lg);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-sm);">
                        <span style="background: var(--accent-color); color: white; padding: 0.4rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">International</span>
                        <time style="color: var(--text-secondary); font-size: 0.95rem;">March 5, 2025</time>
                    </div>
                    <h3 style="font-size: 2rem; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--primary-color);">
                        <a href="<?php echo home_url('/unpacking-famine-in-sudan'); ?>" style="color: var(--primary-color); text-decoration: none;">Unpacking Famine in Sudan</a>
                    </h3>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-sm); font-family: var(--font-secondary); color: var(--text-primary);">
                        In July 2024, famine was confirmed in Zamzam, a camp in Sudan's North Darfur region
                        that houses half a million people displaced from the ongoing civil war. The war that
                        broke out last April between the Sudanese Armed Forces (SAF) and its rival paramilitary
                        Rapid Support Forces (RSF) sparked a hunger crisis with some 25 million people, about
                        half of the Sudanese population, facing acute hunger.
                    </p>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--text-primary);">
                        International experts used set criteria to confirm famine in Zamzam and added that there
                        is a high risk that these conditions will continue beyond October if the conflict persists.
                        To comprehend why experts are concerned about the spread of famine in Sudan, it's important
                        to understand how rare famine is, how it is determined, who officially declares it, and
                        how war exacerbates it.
                    </p>
                    <a href="<?php echo home_url('/unpacking-famine-in-sudan'); ?>" style="color: var(--accent-color); font-weight: 600; text-decoration: none; font-size: 1.05rem;">
                        Continue reading →
                    </a>
                </article>

                <!-- Article 2: Israel/Syria -->
                <article class="article-item" data-category="international" style="border-bottom: 2px solid var(--border-color); padding-bottom: var(--spacing-lg);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-sm);">
                        <span style="background: var(--accent-color); color: white; padding: 0.4rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">International</span>
                        <time style="color: var(--text-secondary); font-size: 0.95rem;">February 26, 2025</time>
                    </div>
                    <h3 style="font-size: 2rem; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--primary-color);">
                        <a href="<?php echo home_url('/replacing-bashar-with-hts-a-false-sense-of-safety-for-israel'); ?>" style="color: var(--primary-color); text-decoration: none;">Replacing Bashar with HTS: A False Sense of Safety for Israel</a>
                    </h3>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-sm); font-family: var(--font-secondary); color: var(--text-primary);">
                        While the situation in Syria highlights Iran's eroding foothold and Israel's growing sense of control,
                        Israel now faces the challenge of an unpredictable HTS-led Syrian government.
                    </p>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--text-primary);">
                        On December 15, 2024, Israeli Prime Minister Benjamin Netanyahu approved a plan to double the Israeli
                        population in the Golan Heights, as Israel's defense minister Israel Katz justified the initiative due
                        to "enormous security importance." After Bashar Al-Assad, the former president of Syria, was ousted by
                        rebel forces who took over Syria, Israel launched airstrikes targeting Syria's military assets...
                    </p>
                    <a href="<?php echo home_url('/replacing-bashar-with-hts-a-false-sense-of-safety-for-israel'); ?>" style="color: var(--accent-color); font-weight: 600; text-decoration: none; font-size: 1.05rem;">
                        Continue reading →
                    </a>
                </article>

                <!-- Article 3: Undersea Cables -->
                <article class="article-item" data-category="security" style="border-bottom: 2px solid var(--border-color); padding-bottom: var(--spacing-lg);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-sm);">
                        <span style="background: #2c3e50; color: white; padding: 0.4rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">Security</span>
                        <time style="color: var(--text-secondary); font-size: 0.95rem;">February 19, 2025</time>
                    </div>
                    <h3 style="font-size: 2rem; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--primary-color);">
                        <a href="<?php echo home_url('/current-landscape-and-challenges-with-undersea-cable-infrastructure'); ?>" style="color: var(--primary-color); text-decoration: none;">Current Landscape and Challenges With Undersea Cable Infrastructure</a>
                    </h3>
                    <div style="background: var(--secondary-color); padding: var(--spacing-sm); border-radius: var(--border-radius); margin-bottom: var(--spacing-sm); border-left: 4px solid var(--accent-color);">
                        <strong style="color: var(--primary-color);">Executive Summary</strong>
                    </div>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-sm); font-family: var(--font-secondary); color: var(--text-primary);">
                        Protecting the global network of undersea cables is vital to U.S. national security and global stability.
                        Malign actors can easily target these cables, disrupting the flow of information sharing between the U.S.
                        and its allies. This disruption creates an avenue for competition between the U.S. and its adversaries.
                    </p>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--text-primary);">
                        Every day, an estimated $10 trillion USD worth of financial transactions flows through undersea cables,
                        as well as 99% of all internet traffic. The importance of securing these cables was highlighted in March 2024,
                        when three damaged undersea cables in the Red Sea affected 25% of internet traffic in the region.
                    </p>
                    <a href="<?php echo get_permalink(); ?>" style="color: var(--accent-color); font-weight: 600; text-decoration: none; font-size: 1.05rem;">
                        Continue reading →
                    </a>
                </article>

                <!-- Article 4: Kansas City Transportation -->
                <article class="article-item" data-category="urban" style="border-bottom: 2px solid var(--border-color); padding-bottom: var(--spacing-lg);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-sm);">
                        <span style="background: #27ae60; color: white; padding: 0.4rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">Urban</span>
                        <time style="color: var(--text-secondary); font-size: 0.95rem;">February 12, 2025</time>
                    </div>
                    <h3 style="font-size: 2rem; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--primary-color);">
                        <a href="<?php echo home_url('/impact-of-public-transportation-for-low-income-individuals-accessing-employment-in-kansas-city'); ?>" style="color: var(--primary-color); text-decoration: none;">Impact of Public Transportation for Low-Income Individuals Accessing Employment in Kansas City</a>
                    </h3>
                    <div style="background: #ffebee; padding: var(--spacing-sm); border-radius: var(--border-radius); margin-bottom: var(--spacing-sm); border-left: 4px solid #e74c3c;">
                        <strong style="color: #c0392b;">The Problem</strong>
                    </div>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-sm); font-family: var(--font-secondary); color: var(--text-primary);">
                        Low-income households in Kansas City, Missouri, face infrequent and unreliable access to connect them
                        to areas with high employer concentration. Approximately 28 million Americans are dependent on public
                        transit to travel outside of their residence. Those who rely on public transportation tend to be
                        disproportionately low-income individuals.
                    </p>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--text-primary);">
                        Simultaneously, many routes exclude the low-income populations that rely on them most. This remains true
                        in Kansas City, Missouri, where 32% of households earn less than $50,000 in yearly income but only 13%
                        of those households are within a half mile of high-frequency full-day transportation.
                    </p>
                    <a href="<?php echo get_permalink(); ?>" style="color: var(--accent-color); font-weight: 600; text-decoration: none; font-size: 1.05rem;">
                        Continue reading →
                    </a>
                </article>

                <!-- Article 5: Russia/Syria -->
                <article class="article-item" data-category="international" style="border-bottom: 2px solid var(--border-color); padding-bottom: var(--spacing-lg);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-sm);">
                        <span style="background: var(--accent-color); color: white; padding: 0.4rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">International</span>
                        <time style="color: var(--text-secondary); font-size: 0.95rem;">January 23, 2025</time>
                    </div>
                    <h3 style="font-size: 2rem; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--primary-color);">
                        <a href="<?php echo home_url('/syria-without-assad-what-russia-stands-to-lose'); ?>" style="color: var(--primary-color); text-decoration: none;">Syria Without Assad: What Russia Stands to Lose</a>
                    </h3>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-sm); font-family: var(--font-secondary); color: var(--text-primary);">
                        Syrian President Bashar al-Assad's asylum in Moscow marks a turning point, leaving Russia grappling
                        with diminished diplomatic, military, and economic influence in a post-Assad, Hayat Tahrir al Sham (HTS)-led
                        Syria amid the prioritized Russia-Ukraine conflict.
                    </p>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); color: var(--text-primary);">
                        On December 8, Syrian President Bashar al-Assad landed in Moscow and was granted asylum on humanitarian grounds,
                        leaving behind a rebel-ruled Syria and the legacy of a decades-long regime backed by Russia. The now-marred
                        Assad family "dynasty" had been formerly supported by the Soviet Union, both due to Baathist-Soviet ideological
                        alignment and as a byproduct of Cold War-era power dynamics in the Middle East.
                    </p>
                    <a href="<?php echo get_permalink(); ?>" style="color: var(--accent-color); font-weight: 600; text-decoration: none; font-size: 1.05rem;">
                        Continue reading →
                    </a>
                </article>
            </div>

            <!-- Pagination -->
            <div style="text-center; margin-top: var(--spacing-xl);">
                <nav style="display: inline-flex; gap: var(--spacing-sm); align-items: center;">
                    <a href="#" class="btn btn-secondary">← Previous</a>
                    <span style="padding: 0 var(--spacing-md); color: var(--text-secondary);">Page 1 of 12</span>
                    <a href="#" class="btn btn-secondary">Next →</a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Archive Sidebar -->
    <section class="section section--alt">
        <div class="container">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: var(--spacing-xl);">
                <div>
                    <h2>About The Third Rail</h2>
                    <p style="font-size: 1.1rem; margin-bottom: var(--spacing-md);">
                        Named for the dangerous electrified rail in subway systems, "The Third Rail" represents
                        the challenging policy topics that others might avoid but we tackle head-on.
                    </p>
                    <p>
                        Our blog serves as a platform for timely analysis and commentary, allowing us to respond
                        quickly to developing policy situations while maintaining the academic rigor our readers expect.
                    </p>
                </div>
                <div>
                    <h3>Browse Archives</h3>
                    <div style="display: flex; flex-direction: column; gap: var(--spacing-xs);">
                        <a href="#" style="color: var(--accent-color); text-decoration: none; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">March 2025 (1)</a>
                        <a href="#" style="color: var(--accent-color); text-decoration: none; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">February 2025 (3)</a>
                        <a href="#" style="color: var(--accent-color); text-decoration: none; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">January 2025 (1)</a>
                        <a href="#" style="color: var(--text-secondary); text-decoration: none; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">April 2022 (2)</a>
                        <a href="#" style="color: var(--text-secondary); text-decoration: none; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">March 2022 (3)</a>
                        <a href="#" class="read-more" style="padding: 0.5rem 0;">View All Archives →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Category filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('categoryFilter');
    const articles = document.querySelectorAll('.article-item');

    categoryFilter.addEventListener('change', function() {
        const selectedCategory = this.value;

        articles.forEach(function(article) {
            if (selectedCategory === 'all') {
                article.style.display = 'block';
            } else {
                const articleCategory = article.getAttribute('data-category');
                if (articleCategory === selectedCategory) {
                    article.style.display = 'block';
                } else {
                    article.style.display = 'none';
                }
            }
        });

        // Scroll to top of articles list smoothly
        document.getElementById('articlesList').scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
});
</script>

<?php get_footer(); ?>