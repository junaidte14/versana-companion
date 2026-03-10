/**
 * Header JavaScript - WordPress Sticky Header Implementation
 * 
 * @package Versana
 * @since 1.0.0
 */

(function() {
    'use strict';
    
    /**
     * Initialize sticky header functionality
     * Prefixed with versana_ to avoid conflicts
     */
    function versanaInitStickyHeader() {
        // Check if sticky header is enabled
        if (!document.body.classList.contains('has-sticky-header')) {
            return;
        }
        
        const header = document.querySelector('.site-header');
        if (!header) {
            return;
        }
        
        let lastScrollTop = 0;
        let headerHeight = header.offsetHeight;
        let scrollThreshold = 100;
        
        // Store header height as CSS variable
        document.documentElement.style.setProperty(
            '--header-height', 
            headerHeight + 'px'
        );
        
        /**
         * Handle scroll events
         */
        function versanaHandleHeaderScroll() {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            
            if (currentScroll > scrollThreshold) {
                document.body.classList.add('header-is-stuck');
            } else {
                document.body.classList.remove('header-is-stuck');
                header.classList.remove('header-hidden', 'header-visible');
            }
            
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        }
        
        // Debounced scroll handler
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (scrollTimeout) {
                window.cancelAnimationFrame(scrollTimeout);
            }
            scrollTimeout = window.requestAnimationFrame(versanaHandleHeaderScroll);
        }, { passive: true });
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', versanaInitStickyHeader);
    } else {
        versanaInitStickyHeader();
    }
    
})();
