<?php
/**
 * Template for Academical Podcast page
 * Based on http://www.virginiapolicyreview.org/academical.html
 */

get_header(); ?>

<style>
/* Hide default header */
.site-header {
    display: none;
}

/* Ensure floating social is always visible */
.floating-social {
    display: flex !important;
    position: fixed !important;
    right: 20px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    flex-direction: column !important;
    gap: 15px !important;
    z-index: 1000 !important;
}

.floating-social .social-float-link {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 50px !important;
    height: 50px !important;
    background: var(--primary-color) !important;
    color: white !important;
    border-radius: 50% !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
}

.floating-social .social-float-link:hover {
    background: var(--accent-color) !important;
    transform: scale(1.1) !important;
    box-shadow: 0 6px 20px rgba(229, 114, 0, 0.4) !important;
}

.floating-social .social-float-link svg {
    width: 22px !important;
    height: 22px !important;
}

/* Reset main content padding */
.main-content {
    padding: 0;
}

/* Header Banner - Cornell Style */
.page-banner {
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 4rem 0 2rem;
    margin-top: 0;
}

.page-banner-content {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 2rem;
    text-align: center;
}

.page-banner h1 {
    font-family: var(--font-secondary);
    font-size: 5rem;
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
    white-space: nowrap;
}

.page-nav a:hover {
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

.page-nav a:hover::after {
    width: 100%;
}

.page-nav a.active {
    color: var(--accent-color);
}

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
</style>

<main class="main-content">
    <!-- Page Banner - Cornell Style -->
    <section class="page-banner">
        <div class="page-banner-content">
            <h1 style="font-size: 6.5rem;">
                <span style="font-style: italic; color: var(--primary-color); font-size: 1.1em;">Virginia</span>
                <span style="font-weight: 800; color: var(--accent-color);"> Policy Review</span>
            </h1>
            <nav class="page-nav">
                <a href="<?php echo home_url('/'); ?>">Home</a>
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
                <a href="<?php echo home_url('/the-third-rail'); ?>">The Third Rail</a>
                <a href="<?php echo home_url('/academical'); ?>" class="active">Academical</a>
                <a href="<?php echo home_url('/submissions'); ?>">Submissions</a>
            </nav>
            <p>The Official Podcast of the Virginia Policy Review</p>
        </div>
    </section>

    <!-- Recent Episodes -->
    <section class="section" style="padding: 2rem 0 3rem; background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container" style="max-width: 1600px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem;">
                <!-- Episode 8: Melody Barnes -->
                <article style="border-bottom: 2px solid var(--accent-color); padding-bottom: var(--spacing-md);">
                    <div style="margin-bottom: var(--spacing-sm);">
                        <span style="color: var(--accent-color); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">Episode 8</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; margin-bottom: var(--spacing-sm); color: var(--primary-color); line-height: 1.3;">Melody Barnes</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: var(--spacing-sm);">
                        Co-Director of UVA's Democracy Initiative and former Director of the Domestic Policy Council under President Obama. Discussion on democracy, civic engagement, and policy-making at the intersection of academia and government.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" target="_blank" style="color: var(--accent-color); text-decoration: none; font-weight: 600; font-size: 1.05rem;">🎧 Listen Now →</a>
                </article>

                <!-- Episode 7: Kate Addleson -->
                <article style="border-bottom: 2px solid var(--accent-color); padding-bottom: var(--spacing-md);">
                    <div style="margin-bottom: var(--spacing-sm);">
                        <span style="color: var(--accent-color); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">Episode 7</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; margin-bottom: var(--spacing-sm); color: var(--primary-color); line-height: 1.3;">Kate Addleson</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: var(--spacing-sm);">
                        Director of the Sierra Club Virginia Chapter. Insights on environmental advocacy, conservation policy in Virginia, and grassroots organizing for climate action at the state level.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" target="_blank" style="color: var(--accent-color); text-decoration: none; font-weight: 600; font-size: 1.05rem;">🎧 Listen Now →</a>
                </article>

                <!-- Episode 6: Michael Finnegan -->
                <article style="border-bottom: 2px solid var(--accent-color); padding-bottom: var(--spacing-md);">
                    <div style="margin-bottom: var(--spacing-sm);">
                        <span style="color: var(--accent-color); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">Episode 6</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; margin-bottom: var(--spacing-sm); color: var(--primary-color); line-height: 1.3;">Michael Finnegan</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: var(--spacing-sm);">
                        President of Atlantic Media. Discussion on the evolving media landscape, journalism's role in policy debates, and the future of political media in the digital age.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" target="_blank" style="color: var(--accent-color); text-decoration: none; font-weight: 600; font-size: 1.05rem;">🎧 Listen Now →</a>
                </article>

                <!-- Episode 5: Ned Price -->
                <article style="border-bottom: 2px solid var(--accent-color); padding-bottom: var(--spacing-md);">
                    <div style="margin-bottom: var(--spacing-sm);">
                        <span style="color: var(--accent-color); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">Episode 5</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; margin-bottom: var(--spacing-sm); color: var(--primary-color); line-height: 1.3;">Ned Price</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: var(--spacing-sm);">
                        Director of Policy & Communications at National Security Action, former CIA analyst and NSC spokesperson under Obama. Insights on national security policy, intelligence community operations, and public diplomacy.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" target="_blank" style="color: var(--accent-color); text-decoration: none; font-weight: 600; font-size: 1.05rem;">🎧 Listen Now →</a>
                </article>

                <!-- Episode 4: Chris Lu -->
                <article style="border-bottom: 2px solid var(--accent-color); padding-bottom: var(--spacing-md);">
                    <div style="margin-bottom: var(--spacing-sm);">
                        <span style="color: var(--accent-color); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">Episode 4</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; margin-bottom: var(--spacing-sm); color: var(--primary-color); line-height: 1.3;">Chris Lu</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: var(--spacing-sm);">
                        Senior Fellow at UVA's Miller Center of Public Affairs and former Deputy Secretary of Labor under Obama. Discussion on labor policy, workforce development, and the intersection of public service and academia.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" target="_blank" style="color: var(--accent-color); text-decoration: none; font-weight: 600; font-size: 1.05rem;">🎧 Listen Now →</a>
                </article>

                <!-- Episode 3: Robert Zullo -->
                <article style="border-bottom: 2px solid var(--accent-color); padding-bottom: var(--spacing-md);">
                    <div style="margin-bottom: var(--spacing-sm);">
                        <span style="color: var(--accent-color); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">Episode 3</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; margin-bottom: var(--spacing-sm); color: var(--primary-color); line-height: 1.3;">Robert Zullo</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: var(--spacing-sm);">
                        Editor-in-Chief of the Virginia Mercury. Insights on Virginia state politics, investigative journalism, and the critical role of state-level political reporting in policy formation.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" target="_blank" style="color: var(--accent-color); text-decoration: none; font-weight: 600; font-size: 1.05rem;">🎧 Listen Now →</a>
                </article>

                <!-- Episode 2: Daniel Carey -->
                <article style="border-bottom: 2px solid var(--accent-color); padding-bottom: var(--spacing-md);">
                    <div style="margin-bottom: var(--spacing-sm);">
                        <span style="color: var(--accent-color); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">Episode 2</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; margin-bottom: var(--spacing-sm); color: var(--primary-color); line-height: 1.3;">Daniel Carey</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: var(--spacing-sm);">
                        Virginia's Secretary of Health and Human Resources. Discussion on Medicaid expansion in Virginia, addressing the opioid crisis, and state-level healthcare policy implementation.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" target="_blank" style="color: var(--accent-color); text-decoration: none; font-weight: 600; font-size: 1.05rem;">🎧 Listen Now →</a>
                </article>

                <!-- Episode 1: Matthew Olsen -->
                <article style="border-bottom: 2px solid var(--accent-color); padding-bottom: var(--spacing-md);">
                    <div style="margin-bottom: var(--spacing-sm);">
                        <span style="color: var(--accent-color); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">Episode 1</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; margin-bottom: var(--spacing-sm); color: var(--primary-color); line-height: 1.3;">Matthew Olsen</h3>
                    <p style="font-size: 1.15rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: var(--spacing-sm);">
                        Chief Trust and Security Officer at Uber and former Director of the National Counterterrorism Center. Insights on Guantanamo Bay, NSA operations, intelligence community reform, and the private sector's role in security.
                    </p>
                    <a href="https://anchor.fm/academical-vpr" target="_blank" style="color: var(--accent-color); text-decoration: none; font-weight: 600; font-size: 1.05rem;">🎧 Listen Now →</a>
                </article>
            </div>

            <div style="text-align: center; margin-top: var(--spacing-lg);">
                <p style="color: var(--text-secondary); font-size: 1.1rem; margin-bottom: var(--spacing-sm);">
                    Subscribe to Academical for more conversations with policy leaders, academics, and practitioners.
                </p>
                <a href="https://anchor.fm/academical-vpr" target="_blank" class="btn btn-secondary">
                    Listen on Anchor →
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>