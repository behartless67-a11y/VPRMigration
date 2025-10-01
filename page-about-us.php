<?php
/**
 * Template for About Us page (page-about-us.php)
 * This template will take priority for the "about-us" slug
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
                <a href="<?php echo home_url('/about-us'); ?>" class="active">About Us</a>
                <a href="<?php echo home_url('/the-third-rail'); ?>">The Third Rail</a>
                <a href="<?php echo home_url('/academical'); ?>">Academical</a>
            </nav>
            <p>Student-run policy journal impacting wider policy dialogue since 2009</p>
        </div>
    </section>

    <!-- Meet The Staff Section - Slideshow -->
    <section style="padding: 2rem 0 3rem; background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('<?php echo get_template_directory_uri(); ?>/images/lawn.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div style="max-width: 1400px; margin: 0 auto; padding: 0 var(--spacing-md);">
            <div style="font-family: var(--font-primary); font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--accent-color); margin-bottom: var(--spacing-md); text-align: center;">MEET THE STAFF</div>

            <!-- Staff Slideshow -->
            <div style="position: relative; height: 550px;">
                <div class="staff-slideshow">
                    <!-- Slide 1: Sarah King -->
                    <article class="staff-slide active" style="position: absolute; width: 100%; height: 100%; display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center; background: var(--white); padding: var(--spacing-xl); border-radius: 16px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); opacity: 1; transform: translateX(0); transition: opacity 0.6s ease, transform 0.6s ease;">
                        <div style="text-align: center;">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sarah-king-executive-editor.jpg"
                                 alt="Sarah King, Executive Editor"
                                 style="width: 250px; height: 250px; border-radius: 50%; object-fit: cover; border: 4px solid var(--secondary-color); margin: 0 auto var(--spacing-md); display: block; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);">
                            <h3 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 0.5rem;">Sarah King</h3>
                            <p style="color: var(--accent-color); font-weight: 700; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.1em; margin: 0;">Executive Editor</p>
                        </div>
                        <div>
                            <p style="color: var(--text-primary); line-height: 1.8; font-family: var(--font-secondary); font-size: 1.15rem;">
                                Sarah is a second-year Master of Public Policy student interested in social welfare and public health policy. Prior to the Batten school, Sarah worked as a long-form news reporter and features editor before pivoting careers to the substance use treatment and recovery field. She now serves as a Course Assistant for the Batten School, is a Research Assistant with the Karsh Institute of Democracy and a 2025-2026 Tadler Fellow.
                            </p>
                        </div>
                    </article>

                    <!-- Slide 2: George Langhammer -->
                    <article class="staff-slide" style="position: absolute; width: 100%; height: 100%; display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center; background: var(--white); padding: var(--spacing-xl); border-radius: 16px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); opacity: 0; transform: translateX(100%); transition: opacity 0.6s ease, transform 0.6s ease;">
                        <div style="text-align: center;">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/george-langhammer-managing-editor.jpg"
                                 alt="George Langhammer, Managing Editor"
                                 style="width: 250px; height: 250px; border-radius: 50%; object-fit: cover; border: 4px solid var(--secondary-color); margin: 0 auto var(--spacing-md); display: block; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);">
                            <h3 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 0.5rem;">George Langhammer</h3>
                            <p style="color: var(--accent-color); font-weight: 700; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.1em; margin: 0;">Managing Editor</p>
                        </div>
                        <div>
                            <p style="color: var(--text-primary); line-height: 1.8; font-family: var(--font-secondary); font-size: 1.15rem;">
                                George is a second-year Master of Public Policy student from Roanoke, Virginia. He earned his Bachelor's degree in Foreign Affairs, with a minor in Spanish, from Hampden-Sydney College in May 2024. During his time at Hampden-Sydney, George was the punter on the football team, a three-term member of the honor court, and a senior editor for the college newspaper. Professionally, George spent his senior year working in government affairs, with a focus on healthcare and trade policy. Most recently, he completed an internship with the Office of the Attorney General of Virginia, where he contributed to homeland security and data privacy legislation. He is a 2025-26 Tadler Fellow.
                            </p>
                        </div>
                    </article>
                </div>

                <!-- Navigation Arrows -->
                <button class="staff-nav-btn staff-prev" style="position: absolute; left: -60px; top: 50%; transform: translateY(-50%); background: var(--white); border: 2px solid var(--primary-color); color: var(--primary-color); width: 50px; height: 50px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: all 0.3s ease; z-index: 10; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);" onmouseover="this.style.background='var(--primary-color)'; this.style.color='white';" onmouseout="this.style.background='var(--white)'; this.style.color='var(--primary-color)';">
                    ‹
                </button>
                <button class="staff-nav-btn staff-next" style="position: absolute; right: -60px; top: 50%; transform: translateY(-50%); background: var(--white); border: 2px solid var(--primary-color); color: var(--primary-color); width: 50px; height: 50px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: all 0.3s ease; z-index: 10; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);" onmouseover="this.style.background='var(--primary-color)'; this.style.color='white';" onmouseout="this.style.background='var(--white)'; this.style.color='var(--primary-color)';">
                    ›
                </button>

                <!-- Slide Indicators -->
                <div style="position: absolute; bottom: -40px; left: 50%; transform: translateX(-50%); display: flex; gap: 12px; z-index: 10;">
                    <button class="staff-dot active" data-slide="0" style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid var(--primary-color); background: var(--primary-color); cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
                    <button class="staff-dot" data-slide="1" style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid var(--primary-color); background: transparent; cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
                </div>
            </div>
        </div>
    </section>

    <script>
    // Staff slideshow functionality
    (function() {
        let currentStaffSlide = 0;
        let staffAutoplayInterval;
        const staffAutoplayDelay = 5000; // 5 seconds

        const staffSlides = document.querySelectorAll('.staff-slide');
        const staffDots = document.querySelectorAll('.staff-dot');
        const staffPrevBtn = document.querySelector('.staff-prev');
        const staffNextBtn = document.querySelector('.staff-next');
        const staffSlideshow = document.querySelector('.staff-slideshow');

        function showStaffSlide(n) {
            // Hide all slides
            staffSlides.forEach((slide, index) => {
                slide.style.opacity = '0';
                slide.style.transform = index < n ? 'translateX(-100%)' : 'translateX(100%)';
                slide.classList.remove('active');
            });

            // Update dots
            staffDots.forEach(dot => {
                dot.style.background = 'transparent';
                dot.classList.remove('active');
            });

            // Show current slide
            currentStaffSlide = (n + staffSlides.length) % staffSlides.length;
            staffSlides[currentStaffSlide].style.opacity = '1';
            staffSlides[currentStaffSlide].style.transform = 'translateX(0)';
            staffSlides[currentStaffSlide].classList.add('active');
            staffDots[currentStaffSlide].style.background = 'var(--primary-color)';
            staffDots[currentStaffSlide].classList.add('active');
        }

        function nextStaffSlide() {
            showStaffSlide(currentStaffSlide + 1);
        }

        function prevStaffSlide() {
            showStaffSlide(currentStaffSlide - 1);
        }

        function startStaffAutoplay() {
            staffAutoplayInterval = setInterval(nextStaffSlide, staffAutoplayDelay);
        }

        function stopStaffAutoplay() {
            clearInterval(staffAutoplayInterval);
        }

        // Navigation buttons
        staffPrevBtn.addEventListener('click', () => {
            prevStaffSlide();
            stopStaffAutoplay();
            startStaffAutoplay();
        });

        staffNextBtn.addEventListener('click', () => {
            nextStaffSlide();
            stopStaffAutoplay();
            startStaffAutoplay();
        });

        // Dot indicators
        staffDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showStaffSlide(index);
                stopStaffAutoplay();
                startStaffAutoplay();
            });
        });

        // Pause on hover
        staffSlideshow.addEventListener('mouseenter', stopStaffAutoplay);
        staffSlideshow.addEventListener('mouseleave', startStaffAutoplay);

        // Start autoplay
        startStaffAutoplay();
    })();
    </script>

    <!-- Mission Section -->
    <div style="height: 1px; background: var(--border-color); margin: 2rem 0;"></div>

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
    <section style="padding: var(--spacing-md) 0; background: linear-gradient(rgba(232, 119, 34, 0.65), rgba(232, 119, 34, 0.65)), url('<?php echo get_template_directory_uri(); ?>/images/hoo_with_a_view_jc_header_3-2.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container">
            <div class="hero-card" style="background: rgba(255, 255, 255, 0.95); border: none;">
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