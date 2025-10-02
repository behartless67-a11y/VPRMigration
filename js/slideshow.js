/**
 * Featured Articles Slideshow
 * Virginia Policy Review Theme
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        const slideshow = document.querySelector('.featured-slideshow');
        if (!slideshow) return;

        const slides = document.querySelectorAll('.featured-slide');
        const indicators = document.querySelectorAll('.slideshow-indicators .indicator');
        const prevBtn = document.querySelector('.slideshow-nav.prev');
        const nextBtn = document.querySelector('.slideshow-nav.next');

        let currentSlide = 0;
        let autoplayInterval;
        const autoplayDelay = 5000; // 5 seconds

        // Show specific slide
        function showSlide(index) {
            // Remove active class from all slides and indicators
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));

            // Add active class to current slide and indicator
            slides[index].classList.add('active');
            indicators[index].classList.add('active');

            currentSlide = index;
        }

        // Next slide
        function nextSlide() {
            let next = currentSlide + 1;
            if (next >= slides.length) {
                next = 0;
            }
            showSlide(next);
        }

        // Previous slide
        function prevSlide() {
            let prev = currentSlide - 1;
            if (prev < 0) {
                prev = slides.length - 1;
            }
            showSlide(prev);
        }

        // Start autoplay
        function startAutoplay() {
            stopAutoplay(); // Clear any existing interval
            autoplayInterval = setInterval(nextSlide, autoplayDelay);
        }

        // Stop autoplay
        function stopAutoplay() {
            if (autoplayInterval) {
                clearInterval(autoplayInterval);
            }
        }

        // Navigation button event listeners
        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                prevSlide();
                stopAutoplay();
                startAutoplay(); // Restart autoplay after manual navigation
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                nextSlide();
                stopAutoplay();
                startAutoplay(); // Restart autoplay after manual navigation
            });
        }

        // Indicator click event listeners
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function() {
                showSlide(index);
                stopAutoplay();
                startAutoplay(); // Restart autoplay after manual navigation
            });
        });

        // Pause autoplay on hover
        slideshow.addEventListener('mouseenter', stopAutoplay);
        slideshow.addEventListener('mouseleave', startAutoplay);

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                prevSlide();
                stopAutoplay();
                startAutoplay();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
                stopAutoplay();
                startAutoplay();
            }
        });

        // Start autoplay on page load
        startAutoplay();
    });
})();
