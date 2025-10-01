<?php
/**
 * Template for Journal Submissions page
 */

get_header(); ?>

<main class="main-content">
    <!-- Compact Header -->
    <section style="padding: var(--spacing-lg) 0; background: var(--white);">
        <div class="container">
            <div class="text-center">
                <h1 style="font-size: 2.5rem; margin-bottom: var(--spacing-sm); font-family: var(--font-secondary);">Journal Submissions</h1>
                <p style="font-size: 1.1rem; color: var(--text-secondary); margin: 0;">Submit your policy research and analysis to Virginia Policy Review</p>
            </div>
        </div>
    </section>

    <!-- Submission Guidelines -->
    <section class="section" style="padding: var(--spacing-md) 0;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: var(--spacing-md);">

                <!-- What We Accept -->
                <article class="featured-card">
                    <h3 style="color: var(--accent-color); margin-bottom: var(--spacing-md);">📄 What We Accept</h3>
                    <div style="display: grid; gap: var(--spacing-sm);">
                        <div style="border-left: 4px solid var(--accent-color); padding-left: var(--spacing-sm);">
                            <h4>Research Articles</h4>
                            <p style="margin: 0; font-size: 0.9rem;">Original policy research (2,000-3,000 words)</p>
                        </div>
                        <div style="border-left: 4px solid var(--primary-color); padding-left: var(--spacing-sm);">
                            <h4>Opinion Pieces</h4>
                            <p style="margin: 0; font-size: 0.9rem;">Commentary on current issues (500-1,500 words)</p>
                        </div>
                        <div style="border-left: 4px solid var(--text-secondary); padding-left: var(--spacing-sm);">
                            <h4>Policy Briefs</h4>
                            <p style="margin: 0; font-size: 0.9rem;">Concise analysis (1,000-1,500 words)</p>
                        </div>
                    </div>
                </article>

                <!-- How to Submit -->
                <article class="featured-card">
                    <h3 style="color: var(--accent-color); margin-bottom: var(--spacing-md);">📝 How to Submit</h3>
                    <div style="display: grid; gap: var(--spacing-sm);">
                        <div style="display: flex; align-items: center; gap: var(--spacing-sm);">
                            <div style="background: var(--accent-color); color: white; width: 25px; height: 25px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; flex-shrink: 0; font-size: 0.8rem;">1</div>
                            <p style="margin: 0; font-size: 0.9rem;"><strong>Email:</strong> submissions@virginiapolicyreview.org</p>
                        </div>
                        <div style="display: flex; align-items: center; gap: var(--spacing-sm);">
                            <div style="background: var(--accent-color); color: white; width: 25px; height: 25px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; flex-shrink: 0; font-size: 0.8rem;">2</div>
                            <p style="margin: 0; font-size: 0.9rem;"><strong>Include:</strong> Cover letter & manuscript</p>
                        </div>
                        <div style="display: flex; align-items: center; gap: var(--spacing-sm);">
                            <div style="background: var(--accent-color); color: white; width: 25px; height: 25px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; flex-shrink: 0; font-size: 0.8rem;">3</div>
                            <p style="margin: 0; font-size: 0.9rem;"><strong>Format:</strong> Chicago citation style</p>
                        </div>
                        <div style="display: flex; align-items: center; gap: var(--spacing-sm);">
                            <div style="background: var(--accent-color); color: white; width: 25px; height: 25px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; flex-shrink: 0; font-size: 0.8rem;">4</div>
                            <p style="margin: 0; font-size: 0.9rem;"><strong>Response:</strong> 4-6 weeks</p>
                        </div>
                    </div>
                </article>

                <!-- Contact -->
                <article class="featured-card" style="background: linear-gradient(135deg, var(--accent-color), #004499); color: white;">
                    <h3 style="color: white; margin-bottom: var(--spacing-md);">📧 Get in Touch</h3>
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: var(--spacing-md); font-size: 0.95rem;">
                        Questions about submissions or want to discuss a potential article?
                    </p>
                    <div style="display: flex; gap: var(--spacing-sm); flex-wrap: wrap;">
                        <a href="mailto:submissions@virginiapolicyreview.org" class="btn" style="background: white; color: var(--accent-color); font-size: 0.9rem; padding: 0.5rem 1rem;">
                            📧 Submit
                        </a>
                        <a href="mailto:contact@virginiapolicyreview.org" class="btn" style="background: rgba(255,255,255,0.2); color: white; border: 2px solid white; font-size: 0.9rem; padding: 0.5rem 1rem;">
                            💬 Contact
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>