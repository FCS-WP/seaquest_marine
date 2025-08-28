(function($){
	"use strict";

	$(window).on('elementor/frontend/init', function () {

		function transflash_career_toggle(){

			var icon         =  $('.ova_archive_career .item-career').find('.toggle').data('icon');
			var icon_active  =  $('.ova_archive_career .item-career').find('.toggle').data('icon_active');

			var btn = $('.ova_archive_career .item-career .toggle .seemore');

			btn.on('click', function () {
	        	$(this).closest('.toggle').find('.toggle-item').toggleClass('toggled');
	        	$(this).toggleClass( 'active' );

                // change icon
	        	if ( $(this).hasClass('active') ) {
	        		$(this).closest('.seemore').find('i').removeClass(icon);
	        		$(this).closest('.seemore').find('i').addClass(icon_active);
	        	} else {
	        		$(this).closest('.seemore').find('i').removeClass(icon_active);
	        		$(this).closest('.seemore').find('i').addClass(icon);
	        	}
	        });
	    }

	    function transflash_hot_career_toggle(){

	    	var icon         =  $('.item-hot-career').find('.toggle').data('icon');
			var icon_active  =  $('.item-hot-career').find('.toggle').data('icon_active');

			var btn = $('.item-hot-career .toggle .seemore i');

	        btn.on('click', function () {
	        	var that = $(this);
	        	$(this).closest('.toggle-wrap').find('.toggle-item').toggleClass('toggled');
	        	$(this).toggleClass( 'active' );

                // change icon
	        	if ( $(this).hasClass('active') ) {
	        		$(this).closest('.seemore').find('i').removeClass(icon);
	        		$(this).closest('.seemore').find('i').addClass(icon_active);
	        	} else {
	        		$(this).closest('.seemore').find('i').removeClass(icon_active);
	        		$(this).closest('.seemore').find('i').addClass(icon);
	        	}
	        });
	        
	    }

		transflash_career_toggle();
        transflash_hot_career_toggle();

   });
})(jQuery);
