/**
 * Main JavaScript file for Virginia Policy Review theme
 */

document.addEventListener('DOMContentLoaded', function() {
    // Header scroll effect
    const header = document.getElementById('masthead');
    let scrolled = false;

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50 && !scrolled) {
            header.classList.add('scrolled');
            scrolled = true;
        } else if (window.scrollY <= 50 && scrolled) {
            header.classList.remove('scrolled');
            scrolled = false;
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading animation to cards
    const cards = document.querySelectorAll('.featured-card');
    if (cards.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                }
            });
        }, { threshold: 0.1 });

        cards.forEach(card => {
            card.style.opacity = '0';
            observer.observe(card);
        });
    }

    // Mobile menu toggle functionality
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const nav = document.querySelector('#site-navigation ul');

    if (mobileToggle && nav) {
        mobileToggle.addEventListener('click', function() {
            nav.classList.toggle('active');
            this.classList.toggle('active');
        });
    }

    // Newsletter form handling
    const newsletterForms = document.querySelectorAll('form');
    newsletterForms.forEach(form => {
        const emailInput = form.querySelector('input[type="email"]');
        if (emailInput) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = emailInput.value;

                if (email) {
                    // Here you would typically send to your newsletter service
                    alert('Thank you for subscribing! You will receive our latest policy insights.');
                    emailInput.value = '';
                } else {
                    alert('Please enter a valid email address.');
                }
            });
        }
    });

    // Search functionality enhancement
    const searchForms = document.querySelectorAll('form[role="search"]');
    searchForms.forEach(form => {
        const searchInput = form.querySelector('input[type="search"]');
        if (searchInput) {
            // Add search suggestions or enhanced functionality here
            searchInput.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            searchInput.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        }
    });

    // Add hover effects to social media icons
    const socialLinks = document.querySelectorAll('a[href*="instagram.com"], a[href*="facebook.com"], a[href*="twitter.com"], a[href*="linkedin.com"]');
    socialLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});