<?php
/**
 * Template for About Us page (page-about-us.php)
 * This template will take priority for the "about-us" slug
 */

get_header(); ?>

<main class="main-content">

    <!-- Hero Header with Background -->
    <section class="hero" style="min-height: 35vh; padding-top: 100px; padding-bottom: var(--spacing-lg);">
        <div class="container">
            <div class="text-center">
                <h1 style="font-size: clamp(2.5rem, 6vw, 4rem); margin-bottom: var(--spacing-sm); font-family: var(--font-secondary); color: var(--primary-color);">About Us</h1>
                <p style="font-size: 1.3rem; color: var(--text-primary); max-width: 800px; margin: 0 auto; font-family: var(--font-secondary);">Student-run policy journal impacting wider policy dialogue since 2009</p>
            </div>
        </div>
    </section>

    <!-- Meet The Staff Section (moved to top) -->
    <section style="padding: var(--spacing-lg) 0;">
        <div class="container">
            <div class="text-center mb-lg">
                <h2>Meet The Staff</h2>
                <p style="font-size: 1.2rem; color: var(--text-secondary);">
                    The dedicated team behind Virginia Policy Review
                </p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr; gap: var(--spacing-lg); max-width: 1200px; margin: 0 auto;">
                <!-- Sarah King - Executive Editor -->
                <div style="display: grid; grid-template-columns: 200px 1fr; gap: var(--spacing-lg); align-items: start; background: var(--white); padding: var(--spacing-lg); border-radius: 16px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); border: 1px solid var(--border-color);">
                    <div style="text-align: center;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sarah-king-executive-editor.jpg"
                             alt="Sarah King, Executive Editor"
                             style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid var(--secondary-color); margin: 0 auto; display: block;">
                        <h3 style="color: var(--primary-color); margin: var(--spacing-sm) 0 0.25rem 0; font-size: 1.5rem;">Sarah King</h3>
                        <p style="color: var(--accent-color); font-weight: 600; font-size: 1rem; margin: 0; text-transform: uppercase; letter-spacing: 0.05em;">Executive Editor</p>
                    </div>
                    <div>
                        <p style="color: var(--text-primary); line-height: 1.6; font-family: var(--font-secondary); margin: 0; font-size: 1.1rem;">
                            Sarah is a second-year Master of Public Policy student interested in social welfare and public health policy. Prior to the Batten school, Sarah worked as a long-form news reporter and features editor before pivoting careers to the substance use treatment and recovery field. She now serves as a Course Assistant for the Batten School, is a Research Assistant with the Karsh Institute of Democracy and a 2025-2026 Tadler Fellow.
                        </p>
                    </div>
                </div>

                <!-- George Langhammer - Managing Editor -->
                <div style="display: grid; grid-template-columns: 200px 1fr; gap: var(--spacing-lg); align-items: start; background: var(--white); padding: var(--spacing-lg); border-radius: 16px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); border: 1px solid var(--border-color);">
                    <div style="text-align: center;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/george-langhammer-managing-editor.jpg"
                             alt="George Langhammer, Managing Editor"
                             style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid var(--secondary-color); margin: 0 auto; display: block;">
                        <h3 style="color: var(--primary-color); margin: var(--spacing-sm) 0 0.25rem 0; font-size: 1.5rem;">George Langhammer</h3>
                        <p style="color: var(--accent-color); font-weight: 600; font-size: 1rem; margin: 0; text-transform: uppercase; letter-spacing: 0.05em;">Managing Editor</p>
                    </div>
                    <div>
                        <p style="color: var(--text-primary); line-height: 1.6; font-family: var(--font-secondary); margin: 0; font-size: 1.1rem;">
                            George is a second-year Master of Public Policy student from Roanoke, Virginia. He earned his Bachelor's degree in Foreign Affairs, with a minor in Spanish, from Hampden-Sydney College in May 2024. During his time at Hampden-Sydney, George was the punter on the football team, a three-term member of the honor court, and a senior editor for the college newspaper. Professionally, George spent his senior year working in government affairs, with a focus on healthcare and trade policy. Most recently, he completed an internship with the Office of the Attorney General of Virginia, where he contributed to homeland security and data privacy legislation. He is a 2025-26 Tadler Fellow.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <div class="section-divider"></div>

    <section style="padding: var(--spacing-md) 0; background: var(--secondary-color);">
        <div class="container">
            <h2 class="text-center mb-lg">Our Mission</h2>
            <div style="max-width: 900px; margin: 0 auto;">
                <p style="font-size: 1.2rem; line-height: 1.8; margin-bottom: var(--spacing-md); font-family: var(--font-secondary); text-align: center;">
                    The <strong>Virginia Policy Review</strong> is a student-run policy journal that strives to publish work that will impact the wider policy dialogue. Our mission is to do this through a variety of journalistic mediums, including research, opinion pieces, interviews, and our podcast.
                </p>
                <p style="font-size: 1.1rem; line-height: 1.7; margin-bottom: 0; font-family: var(--font-secondary); text-align: center;">
                    Founded in the fall of 2009, VPR has been curating meaningful insights on modern policy issues for nearly a decade. VPR publishes a physical journal in the Spring, which is also published online, as well as posting on our blog called "The Third Rail" which publishes pieces as they are ready.
                </p>
            </div>
        </div>
    </section>

    <!-- Legal & University Information -->
    <section style="padding: var(--spacing-md) 0;">
        <div class="container">
            <div class="hero-card" style="background: var(--secondary-color); border: none;">
                <h2>University Affiliation & Policies</h2>

                <div style="margin-bottom: var(--spacing-md);">
                    <h3 style="font-size: 1.25rem; color: var(--accent-color);">Independent Organization</h3>
                    <p>
                        Although this organization has members who are University of Virginia students and may have University employees associated or engaged in its activities and affairs, the organization is not a part of or an agency of the University. It is a separate and independent organization which is responsible for and manages its own activities and affairs. The University does not direct, supervise or control the organization and is not responsible for the organization's contracts, acts, or omissions.
                    </p>
                </div>

                <div>
                    <h3 style="font-size: 1.25rem; color: var(--accent-color);">Non-Discrimination Policy</h3>
                    <p style="margin: 0;">
                        The Virginia Policy Review does not restrict its membership, programs, or activities on the basis of age, color, disability, gender identity, marital status, national or ethnic origin, political affiliation, race, religion, sex (including pregnancy), sexual orientation, veteran status, and family and genetic information.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section style="padding: var(--spacing-lg) 0; background: var(--primary-color); color: white;">
        <div class="container text-center">
            <h2 style="color: white; margin-bottom: var(--spacing-md);">Join Our Mission</h2>
            <p style="font-size: 1.2rem; color: rgba(255,255,255,0.95); margin-bottom: var(--spacing-lg); max-width: 600px; margin-left: auto; margin-right: auto;">
                Interested in contributing to policy dialogue? We welcome submissions, new members, and collaboration opportunities.
            </p>
            <div style="display: flex; gap: var(--spacing-md); justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo home_url('/submissions'); ?>" class="btn" style="background: var(--accent-color); color: white;">
                    Submit Your Work
                </a>
                <a href="mailto:contact@virginiapolicyreview.org" class="btn" style="background: transparent; border: 2px solid white; color: white;">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>