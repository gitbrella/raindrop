jQuery(document).ready(function($) {

    $('.gform_wrapper input').click(function() {

        var parent = $('.psp-phase-info');

        var height = $(parent).height();

        $(parent).css( 'height', 'auto' );
        $(parent).css( 'minHeight', height );

    });
});
