<?php
/**
 * Template Name: About Page
 * Template for About Us page
 */

get_header(); ?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero" style="min-height: 60vh; background: linear-gradient(135deg, var(--secondary-color) 0%, var(--white) 100%);">
        <div class="container">
            <div class="hero-content" style="text-align: center;">
                <div>
                    <h1 class="hero-title" style="font-size: clamp(2.5rem, 5vw, 4rem);">About Us</h1>
                    <p class="hero-subtitle">
                        Student-run policy journal impacting wider policy dialogue since 2009
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="section">
        <div class="container">
            <h2 class="text-center mb-lg">Mission</h2>
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <p style="font-size: 1.2rem; line-height: 1.8; margin-bottom: var(--spacing-md); font-family: var(--font-secondary);">
                    The <strong>Virginia Policy Review</strong> is a student-run policy journal that strives to publish work that will impact the wider policy dialogue. Our mission is to do this through a variety of journalistic mediums, including research, opinion pieces, interviews, and our podcast.
                </p>
                <p style="font-size: 1.1rem; line-height: 1.7; margin-bottom: var(--spacing-lg); font-family: var(--font-secondary);">
                    Founded in the fall of 2009, VPR has been curating meaningful insights on modern policy issues for nearly a decade. VPR publishes a physical journal in the Spring, which is also published online, as well as posting on our blog called "The Third Rail" which publishes pieces as they are ready.
                </p>
            </div>
        </div>
    </section>

    <!-- Meet The Staff Section -->
    <div class="section-divider"></div>

    <section class="section">
        <div class="container">
            <div class="text-center mb-lg">
                <h2>Meet The Staff</h2>
                <p style="font-size: 1.2rem; color: var(--text-secondary);">
                    The dedicated team behind Virginia Policy Review
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: var(--spacing-xl); max-width: 1000px; margin: 0 auto;">
                <!-- Sarah King - Executive Editor -->
                <div style="text-align: center; background: var(--white); padding: var(--spacing-lg); border-radius: 16px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); border: 1px solid var(--border-color);">
                    <div style="margin-bottom: var(--spacing-md);">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sarah-king-executive-editor.jpg"
                             alt="Sarah King, Executive Editor"
                             style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid var(--secondary-color); margin: 0 auto; display: block;">
                    </div>
                    <h3 style="color: var(--primary-color); margin-bottom: 0.25rem; font-size: 1.5rem;">Sarah King</h3>
                    <p style="color: var(--accent-color); font-weight: 600; font-size: 1.1rem; margin-bottom: var(--spacing-md); text-transform: uppercase; letter-spacing: 0.05em;">Executive Editor</p>
                    <p style="text-align: left; color: var(--text-primary); line-height: 1.6; font-family: var(--font-secondary);">
                        Sarah is a second-year Master of Public Policy student interested in social welfare and public health policy. Prior to the Batten school, Sarah worked as a long-form news reporter and features editor before pivoting careers to the substance use treatment and recovery field. She now serves as a Course Assistant for the Batten School, is a Research Assistant with the Karsh Institute of Democracy and a 2025-2026 Tadler Fellow.
                    </p>
                </div>

                <!-- George Langhammer - Managing Editor -->
                <div style="text-align: center; background: var(--white); padding: var(--spacing-lg); border-radius: 16px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); border: 1px solid var(--border-color);">
                    <div style="margin-bottom: var(--spacing-md);">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/george-langhammer-managing-editor.jpg"
                             alt="George Langhammer, Managing Editor"
                             style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid var(--secondary-color); margin: 0 auto; display: block;">
                    </div>
                    <h3 style="color: var(--primary-color); margin-bottom: 0.25rem; font-size: 1.5rem;">George Langhammer</h3>
                    <p style="color: var(--accent-color); font-weight: 600; font-size: 1.1rem; margin-bottom: var(--spacing-md); text-transform: uppercase; letter-spacing: 0.05em;">Managing Editor</p>
                    <p style="text-align: left; color: var(--text-primary); line-height: 1.6; font-family: var(--font-secondary);">
                        George is a second-year Master of Public Policy student from Roanoke, Virginia. He earned his Bachelor's degree in Foreign Affairs, with a minor in Spanish, from Hampden-Sydney College in May 2024. During his time at Hampden-Sydney, George was the punter on the football team, a three-term member of the honor court, and a senior editor for the college newspaper. Professionally, George spent his senior year working in government affairs, with a focus on healthcare and trade policy. Most recently, he completed an internship with the Office of the Attorney General of Virginia, where he contributed to homeland security and data privacy legislation. He is a 2025-26 Tadler Fellow.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <div class="section-divider"></div>

    <section class="section">
        <div class="container">
            <div class="text-center mb-lg">
                <h2>Our Impact</h2>
                <p style="font-size: 1.2rem; color: var(--text-secondary);">
                    Over a decade of meaningful policy dialogue
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-md); margin-bottom: var(--spacing-xl);">
                <div class="text-center" style="padding: var(--spacing-md);">
                    <div style="font-size: 3.5rem; font-weight: 800; color: var(--accent-color); font-family: var(--font-secondary);">15+</div>
                    <div style="font-size: 1.1rem; color: var(--text-secondary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Years Publishing</div>
                </div>
                <div class="text-center" style="padding: var(--spacing-md);">
                    <div style="font-size: 3.5rem; font-weight: 800; color: var(--accent-color); font-family: var(--font-secondary);">100+</div>
                    <div style="font-size: 1.1rem; color: var(--text-secondary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Articles Published</div>
                </div>
                <div class="text-center" style="padding: var(--spacing-md);">
                    <div style="font-size: 3.5rem; font-weight: 800; color: var(--accent-color); font-family: var(--font-secondary);">3</div>
                    <div style="font-size: 1.1rem; color: var(--text-secondary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Publication Platforms</div>
                </div>
                <div class="text-center" style="padding: var(--spacing-md);">
                    <div style="font-size: 3.5rem; font-weight: 800; color: var(--accent-color); font-family: var(--font-secondary);">∞</div>
                    <div style="font-size: 1.1rem; color: var(--text-secondary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Policy Impact</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Publications Section -->
    <section class="section section--alt">
        <div class="container">
            <div class="text-center mb-lg">
                <h2>Our Publications</h2>
                <p style="font-size: 1.2rem; color: var(--text-secondary);">
                    Multiple platforms for policy dialogue and research
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-md);">
                <!-- Spring Journal -->
                <div class="featured-card">
                    <div style="background: linear-gradient(135deg, var(--accent-color), #004499); color: white; padding: var(--spacing-md); border-radius: 12px 12px 0 0; margin: calc(-1 * var(--spacing-md)) calc(-1 * var(--spacing-md)) var(--spacing-md) calc(-1 * var(--spacing-md));">
                        <h3 style="color: white; margin-bottom: var(--spacing-sm);">Annual Journal</h3>
                        <p style="color: rgba(255,255,255,0.9); margin: 0;">Spring Publication</p>
                    </div>
                    <p>
                        Our flagship physical and online journal published each Spring,
                        featuring the year's best research, analysis, and policy recommendations.
                    </p>
                    <a href="<?php echo home_url('/journal-issues'); ?>" class="read-more">View Current Issue →</a>
                </div>

                <!-- The Third Rail Blog -->
                <div class="featured-card">
                    <div style="background: linear-gradient(135deg, #e74c3c, #c0392b); color: white; padding: var(--spacing-md); border-radius: 12px 12px 0 0; margin: calc(-1 * var(--spacing-md)) calc(-1 * var(--spacing-md)) var(--spacing-md) calc(-1 * var(--spacing-md));">
                        <h3 style="color: white; margin-bottom: var(--spacing-sm);">The Third Rail</h3>
                        <p style="color: rgba(255,255,255,0.9); margin: 0;">Our Blog</p>
                    </div>
                    <p>
                        Shorter takes on big issues. Our blog publishes timely pieces as they're ready,
                        providing immediate analysis of developing policy situations.
                    </p>
                    <a href="<?php echo home_url('/the-third-rail'); ?>" class="read-more">Read Latest Articles →</a>
                </div>

                <!-- Academical Podcast -->
                <div class="featured-card">
                    <div style="background: linear-gradient(135deg, #9b59b6, #8e44ad); color: white; padding: var(--spacing-md); border-radius: 12px 12px 0 0; margin: calc(-1 * var(--spacing-md)) calc(-1 * var(--spacing-md)) var(--spacing-md) calc(-1 * var(--spacing-md));">
                        <h3 style="color: white; margin-bottom: var(--spacing-sm);">Academical</h3>
                        <p style="color: rgba(255,255,255,0.9); margin: 0;">Official Podcast</p>
                    </div>
                    <p>
                        Coming from the heart of Thomas Jefferson's Academical Village,
                        our podcast features policy discussions by Master of Public Policy students.
                    </p>
                    <a href="<?php echo home_url('/academical'); ?>" class="read-more">Listen Now →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Legal & University Information -->
    <section class="section" style="background: linear-gradient(rgba(35, 45, 75, 0.85), rgba(35, 45, 75, 0.85)), url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg') center/cover no-repeat; background-attachment: fixed; color: white; padding: var(--spacing-xl) 0;">
        <div class="container">
            <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 16px; padding: var(--spacing-xl); border: 1px solid rgba(255, 255, 255, 0.2);">
                <h2 style="color: white; margin-bottom: var(--spacing-lg);">University Affiliation & Policies</h2>

                <div style="margin-bottom: var(--spacing-md);">
                    <h3 style="font-size: 1.25rem; color: var(--accent-color); margin-bottom: var(--spacing-sm);">Independent Organization</h3>
                    <p style="color: rgba(255, 255, 255, 0.95); line-height: 1.7;">
                        Although this organization has members who are University of Virginia students and may have University employees associated or engaged in its activities and affairs, the organization is not a part of or an agency of the University. It is a separate and independent organization which is responsible for and manages its own activities and affairs. The University does not direct, supervise or control the organization and is not responsible for the organization's contracts, acts, or omissions.
                    </p>
                </div>

                <div>
                    <h3 style="font-size: 1.25rem; color: var(--accent-color); margin-bottom: var(--spacing-sm);">Non-Discrimination Policy</h3>
                    <p style="margin: 0; color: rgba(255, 255, 255, 0.95); line-height: 1.7;">
                        The Virginia Policy Review does not restrict its membership, programs, or activities on the basis of age, color, disability, gender identity, marital status, national or ethnic origin, political affiliation, race, religion, sex (including pregnancy), sexual orientation, veteran status, and family and genetic information.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section" style="background: linear-gradient(135deg, var(--primary-color) 0%, #333333 100%); color: white;">
        <div class="container text-center">
            <h2 style="color: white; margin-bottom: var(--spacing-md);">Join Our Mission</h2>
            <p style="font-size: 1.2rem; color: rgba(255,255,255,0.9); margin-bottom: var(--spacing-lg); max-width: 600px; margin-left: auto; margin-right: auto;">
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