<?php
/**
 * Template for The Third Rail blog page
 */

get_header(); ?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero" style="min-height: 60vh; background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white;">
        <div class="container">
            <div class="hero-content" style="text-align: center; color: white;">
                <div>
                    <h1 class="hero-title" style="color: white; font-size: clamp(2.5rem, 5vw, 4rem);">The Third Rail</h1>
                    <p class="hero-subtitle" style="color: rgba(255,255,255,0.9); font-size: 1.5rem;">
                        Shorter takes on big issues
                    </p>
                    <p style="color: rgba(255,255,255,0.8); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
                        Our blog features timely policy analysis, opinion pieces, and commentary
                        on developing situations as they happen.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Search and Categories -->
    <section class="section" style="background: var(--secondary-color); padding: var(--spacing-md) 0;">
        <div class="container">
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
                    <select onchange="window.location.href=this.value" style="padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--border-radius); font-family: var(--font-primary);">
                        <option value="<?php echo home_url('/the-third-rail'); ?>">All Categories</option>
                        <option value="<?php echo home_url('/category/domestic'); ?>">Domestic</option>
                        <option value="<?php echo home_url('/category/economics'); ?>">Economics</option>
                        <option value="<?php echo home_url('/category/education'); ?>">Education</option>
                        <option value="<?php echo home_url('/category/electoral-politics'); ?>">Electoral Politics</option>
                        <option value="<?php echo home_url('/category/environment'); ?>">Environment</option>
                        <option value="<?php echo home_url('/category/gun-rights'); ?>">Gun Rights</option>
                        <option value="<?php echo home_url('/category/health'); ?>">Health</option>
                        <option value="<?php echo home_url('/category/international'); ?>">International</option>
                        <option value="<?php echo home_url('/category/justice'); ?>">Justice</option>
                        <option value="<?php echo home_url('/category/law'); ?>">Law</option>
                        <option value="<?php echo home_url('/category/politics'); ?>">Politics</option>
                        <option value="<?php echo home_url('/category/social'); ?>">Social</option>
                        <option value="<?php echo home_url('/category/urban'); ?>">Urban</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="section">
        <div class="container">
            <div class="featured-grid">
                <!-- Article 1: Sudan Famine -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">March 5, 2025</time>
                    </div>
                    <h3>Unpacking Famine in Sudan</h3>
                    <p>
                        In July 2024, famine was confirmed in Zamzam, a camp in Sudan's North Darfur region
                        that houses half a million people displaced from the ongoing civil war. The war that
                        broke out last April between the Sudanese Armed Forces (SAF) and its rival paramilitary
                        Rapid Support Forces (RSF) sparked a hunger crisis with some 25 million people, about
                        half of the Sudanese population, facing acute hunger.
                    </p>
                    <p>
                        International experts used set criteria to confirm famine in Zamzam and added that there
                        is a high risk that these conditions will continue beyond October if the conflict persists.
                        To comprehend why experts are concerned about the spread of famine in Sudan, it's important
                        to understand how rare famine is, how it is determined, who officially declares it, and
                        how war exacerbates it.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: var(--spacing-md); padding-top: var(--spacing-sm); border-top: 1px solid var(--border-color);">
                        <a href="#" class="read-more">Read Full Article →</a>
                        <div style="display: flex; gap: var(--spacing-xs);">
                            <button class="btn" style="background: #3b5998; color: white; font-size: 0.8rem; padding: 0.5rem;">Share</button>
                            <button class="btn" style="background: #1da1f2; color: white; font-size: 0.8rem; padding: 0.5rem;">Tweet</button>
                        </div>
                    </div>
                </article>

                <!-- Article 2: Israel/Syria -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">February 26, 2025</time>
                    </div>
                    <h3>Replacing Bashar with HTS: A False Sense of Safety for Israel</h3>
                    <p>
                        While the situation in Syria highlights Iran's eroding foothold and Israel's growing sense of control,
                        Israel now faces the challenge of an unpredictable HTS-led Syrian government.
                    </p>
                    <p>
                        On December 15, 2024, Israeli Prime Minister Benjamin Netanyahu approved a plan to double the Israeli
                        population in the Golan Heights, as Israel's defense minister Israel Katz justified the initiative due
                        to "enormous security importance." After Bashar Al-Assad, the former president of Syria, was ousted by
                        rebel forces who took over Syria, Israel launched airstrikes targeting Syria's military assets...
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: var(--spacing-md); padding-top: var(--spacing-sm); border-top: 1px solid var(--border-color);">
                        <a href="#" class="read-more">Read Full Article →</a>
                        <div style="display: flex; gap: var(--spacing-xs);">
                            <button class="btn" style="background: #3b5998; color: white; font-size: 0.8rem; padding: 0.5rem;">Share</button>
                            <button class="btn" style="background: #1da1f2; color: white; font-size: 0.8rem; padding: 0.5rem;">Tweet</button>
                        </div>
                    </div>
                </article>

                <!-- Article 3: Undersea Cables -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category" style="background: #2c3e50; color: white;">Security</span>
                        <time class="featured-card-date">February 19, 2025</time>
                    </div>
                    <h3>Current Landscape and Challenges With Undersea Cable Infrastructure</h3>
                    <div style="background: var(--secondary-color); padding: var(--spacing-sm); border-radius: var(--border-radius); margin: var(--spacing-sm) 0;">
                        <strong>Executive Summary</strong>
                    </div>
                    <p>
                        Protecting the global network of undersea cables is vital to U.S. national security and global stability.
                        Malign actors can easily target these cables, disrupting the flow of information sharing between the U.S.
                        and its allies. This disruption creates an avenue for competition between the U.S. and its adversaries.
                    </p>
                    <p>
                        Every day, an estimated $10 trillion USD worth of financial transactions flows through undersea cables,
                        as well as 99% of all internet traffic. The importance of securing these cables was highlighted in March 2024,
                        when three damaged undersea cables in the Red Sea affected 25% of internet traffic in the region.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: var(--spacing-md); padding-top: var(--spacing-sm); border-top: 1px solid var(--border-color);">
                        <a href="#" class="read-more">Read Full Article →</a>
                        <div style="display: flex; gap: var(--spacing-xs);">
                            <button class="btn" style="background: #3b5998; color: white; font-size: 0.8rem; padding: 0.5rem;">Share</button>
                            <button class="btn" style="background: #1da1f2; color: white; font-size: 0.8rem; padding: 0.5rem;">Tweet</button>
                        </div>
                    </div>
                </article>

                <!-- Article 4: Kansas City Transportation -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category" style="background: #27ae60; color: white;">Urban</span>
                        <time class="featured-card-date">February 12, 2025</time>
                    </div>
                    <h3>Impact of Public Transportation for Low-Income Individuals Accessing Employment in Kansas City</h3>
                    <div style="background: #ffebee; padding: var(--spacing-sm); border-radius: var(--border-radius); margin: var(--spacing-sm) 0; border-left: 4px solid #e74c3c;">
                        <strong style="color: #c0392b;">The Problem</strong>
                    </div>
                    <p>
                        Low-income households in Kansas City, Missouri, face infrequent and unreliable access to connect them
                        to areas with high employer concentration. Approximately 28 million Americans are dependent on public
                        transit to travel outside of their residence. Those who rely on public transportation tend to be
                        disproportionately low-income individuals.
                    </p>
                    <p>
                        Simultaneously, many routes exclude the low-income populations that rely on them most. This remains true
                        in Kansas City, Missouri, where 32% of households earn less than $50,000 in yearly income but only 13%
                        of those households are within a half mile of high-frequency full-day transportation.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: var(--spacing-md); padding-top: var(--spacing-sm); border-top: 1px solid var(--border-color);">
                        <a href="#" class="read-more">Read Full Article →</a>
                        <div style="display: flex; gap: var(--spacing-xs);">
                            <button class="btn" style="background: #3b5998; color: white; font-size: 0.8rem; padding: 0.5rem;">Share</button>
                            <button class="btn" style="background: #1da1f2; color: white; font-size: 0.8rem; padding: 0.5rem;">Tweet</button>
                        </div>
                    </div>
                </article>

                <!-- Article 5: Russia/Syria -->
                <article class="featured-card">
                    <div class="featured-card-meta">
                        <span class="featured-card-category">International</span>
                        <time class="featured-card-date">January 23, 2025</time>
                    </div>
                    <h3>Syria Without Assad: What Russia Stands to Lose</h3>
                    <p>
                        Syrian President Bashar al-Assad's asylum in Moscow marks a turning point, leaving Russia grappling
                        with diminished diplomatic, military, and economic influence in a post-Assad, Hayat Tahrir al Sham (HTS)-led
                        Syria amid the prioritized Russia-Ukraine conflict.
                    </p>
                    <p>
                        On December 8, Syrian President Bashar al-Assad landed in Moscow and was granted asylum on humanitarian grounds,
                        leaving behind a rebel-ruled Syria and the legacy of a decades-long regime backed by Russia. The now-marred
                        Assad family "dynasty" had been formerly supported by the Soviet Union, both due to Baathist-Soviet ideological
                        alignment and as a byproduct of Cold War-era power dynamics in the Middle East.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: var(--spacing-md); padding-top: var(--spacing-sm); border-top: 1px solid var(--border-color);">
                        <a href="#" class="read-more">Read Full Article →</a>
                        <div style="display: flex; gap: var(--spacing-xs);">
                            <button class="btn" style="background: #3b5998; color: white; font-size: 0.8rem; padding: 0.5rem;">Share</button>
                            <button class="btn" style="background: #1da1f2; color: white; font-size: 0.8rem; padding: 0.5rem;">Tweet</button>
                        </div>
                    </div>
                </article>

                <!-- Newsletter Subscription Card -->
                <article class="featured-card" style="background: linear-gradient(135deg, var(--accent-color), #004499); color: white; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                    <h3 style="color: white; margin-bottom: var(--spacing-md);">Stay Updated</h3>
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: var(--spacing-md);">
                        Get The Third Rail articles delivered to your inbox as soon as they're published.
                    </p>
                    <form style="display: flex; flex-direction: column; gap: var(--spacing-sm);">
                        <input type="email" placeholder="Enter your email" required
                               style="padding: 0.75rem; border: none; border-radius: var(--border-radius); font-family: var(--font-primary);">
                        <button type="submit" class="btn" style="background: white; color: var(--accent-color);">
                            Subscribe to Updates
                        </button>
                    </form>
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

<?php get_footer(); ?>