/* filepath: d:\FINAL FIGHT SKRIPSI INPO LOKER\Coding\Pelita\public\js\animations.js */
/**
 * PELITA Animation Helper
 * Handles scroll animations and other animation effects
 */

// Execute when DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize scroll animations
    initScrollAnimations();
});

/**
 * Initialize animations for elements with 'animate-on-scroll' class
 */
function initScrollAnimations() {
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    
    if (animateElements.length === 0) return;
    
    // Animate elements that are already visible on page load
    animateElementsInView();
    
    // Animate elements as they scroll into view
    window.addEventListener('scroll', function() {
        animateElementsInView();
    });
    
    function animateElementsInView() {
        animateElements.forEach(element => {
            // Skip already animated elements
            if (element.classList.contains('animate')) return;
            
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            // If element is in viewport (with 100px offset)
            if (elementTop < windowHeight - 100) {
                element.classList.add('animate');
            }
        });
    }
}

// Export animation functions for explicit use
window.PelitaAnimations = {
    initScrollAnimations: initScrollAnimations
};