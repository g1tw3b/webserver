jQuery(document).ready(function($) {
    $('.notice[data-notice="get_started"]').on('click', '.notice-dismiss', function() {
        $.ajax({
            type: 'POST',
            data: {
                action: 'solar_system_company_dismiss_notice',
            },
            url: ajaxurl,
        });
    });
});