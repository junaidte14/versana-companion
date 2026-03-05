/**
 * Demo Library JavaScript
 */

(function($) {
    'use strict';

    const VersanaDemoLibrary = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            $('.versana-import-demo').on('click', this.handleImport.bind(this));
            $('.versana-remove-demo').on('click', this.handleRemove.bind(this));
        },

        handleImport: function(e) {
            e.preventDefault();
            
            const $button = $(e.currentTarget);
            const demoKey = $button.data('demo');
            const $demoItem = $button.closest('.versana-demo-item');
            
            // Get checkbox states
            const importPosts = $demoItem.find('.import-posts').is(':checked');
            const importPages = $demoItem.find('.import-pages').is(':checked');
            const importMenu = $demoItem.find('.import-menu').is(':checked');
            
            if (!confirm(versanaCompanion.strings.confirmImport)) {
                return;
            }
            
            this.startProgress($demoItem, versanaCompanion.strings.importing);
            $button.prop('disabled', true);
            
            $.ajax({
                url: versanaCompanion.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'versana_import_demo',
                    demo_key: demoKey,
                    import_posts: importPosts,
                    import_pages: importPages,
                    import_menu: importMenu,
                    nonce: versanaCompanion.nonce
                },
                success: (response) => {
                    this.stopProgress($demoItem);
                    
                    if (response.success) {
                        this.showNotice('success', response.data.message);
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        this.showNotice('error', response.data.message);
                        $button.prop('disabled', false);
                    }
                },
                error: (xhr, status, error) => {
                    this.stopProgress($demoItem);
                    this.showNotice('error', 'An error occurred: ' + error);
                    $button.prop('disabled', false);
                }
            });
        },

        handleRemove: function(e) {
            e.preventDefault();
            
            const $button = $(e.currentTarget);
            const $demoItem = $button.closest('.versana-demo-item');
            
            // Get checkbox states
            const removePosts = $demoItem.find('.import-posts').is(':checked');
            const removePages = $demoItem.find('.import-pages').is(':checked');
            const removeMenu = $demoItem.find('.import-menu').is(':checked');
            
            if (!confirm(versanaCompanion.strings.confirmRemove)) {
                return;
            }
            
            this.startProgress($demoItem, versanaCompanion.strings.removing);
            $button.prop('disabled', true);
            
            $.ajax({
                url: versanaCompanion.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'versana_remove_demo',
                    remove_posts: removePosts,
                    remove_pages: removePages,
                    remove_menu: removeMenu,
                    nonce: versanaCompanion.nonce
                },
                success: (response) => {
                    this.stopProgress($demoItem);
                    
                    if (response.success) {
                        this.showNotice('success', response.data.message);
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        this.showNotice('error', response.data.message);
                        $button.prop('disabled', false);
                    }
                },
                error: (xhr, status, error) => {
                    this.stopProgress($demoItem);
                    this.showNotice('error', 'An error occurred: ' + error);
                    $button.prop('disabled', false);
                }
            });
        },

        startProgress: function($demoItem, text) {
            $demoItem.addClass('importing');
            $demoItem.find('.demo-progress').show();
            $demoItem.find('.demo-progress-text').text(text);
        },

        stopProgress: function($demoItem) {
            $demoItem.removeClass('importing');
            $demoItem.find('.demo-progress').hide();
        },

        showNotice: function(type, message) {
            const noticeClass = type === 'success' ? 'notice-success' : 'notice-error';
            const iconClass = type === 'success' ? 'dashicons-yes-alt' : 'dashicons-warning';
            
            const notice = `
                <div class="notice ${noticeClass} is-dismissible">
                    <p>
                        <span class="dashicons ${iconClass}" style="margin-right: 8px;"></span>
                        <strong>${type === 'success' ? versanaCompanion.strings.success : versanaCompanion.strings.error}:</strong>
                        ${message}
                    </p>
                </div>
            `;
            
            const $notices = $('#versana-import-notices');
            $notices.html(notice);
            
            // Scroll to notice
            $('html, body').animate({
                scrollTop: $notices.offset().top - 100
            }, 500);
            
            // Make dismissible work
            $notices.find('.notice-dismiss').on('click', function() {
                $(this).closest('.notice').fadeOut();
            });
        }
    };

    // Initialize when document is ready
    $(document).ready(function() {
        VersanaDemoLibrary.init();
    });

})(jQuery);