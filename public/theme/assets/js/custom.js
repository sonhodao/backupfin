jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

jQuery(document).ready(function() {

    jQuery(document).on('click', '#search_button', function(e) {
        e.preventDefault();
        var textSearch = jQuery("#mod-finder-searchword").val();
        if (!textSearch) {
            if (jQuery('#p-search-form').hasClass('active')) {
                jQuery('#p-search-form').removeClass('active')
            } else {
                jQuery('#p-search-form').addClass('active')
            }
        } else {
            jQuery('#mod-finder-searchform').submit();
        }
    });
});