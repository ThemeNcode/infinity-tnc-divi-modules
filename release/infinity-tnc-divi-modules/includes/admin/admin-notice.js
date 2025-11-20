jQuery(document).ready(function($) {
    $(document).on('click', '#inftnc-black-friday-notice .notice-dismiss', function() {
        $.ajax({
            url: inftncAdminNotice.ajax_url,
            type: 'POST',
            data: {
                action: 'inftnc_dismiss_black_friday_notice'
            }
        });
    });
});

