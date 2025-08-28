(function($){
	"use strict";
	

	$(document).ready(function () {

		$('.archive_career').each(function(){
		
	        $('.item-career .toggle .top .seemore').on('click', function () {
	        	$(this).closest('.toggle').find('.toggle-item').toggleClass('toggled');
	        	$(this).toggleClass( 'active' );
				
                // change icon
	        	if ( $(this).hasClass('active') ) {
	        		$(this).closest('.seemore').find('i').removeClass('ovaicon ovaicon-plus');
	        		$(this).closest('.seemore').find('i').addClass('ovaicon ovaicon-minus');
	        	} else {
	        		$(this).closest('.seemore').find('i').removeClass('ovaicon ovaicon-minus');
	        		$(this).closest('.seemore').find('i').addClass('ovaicon ovaicon-plus');
	        	}
	        });

	    });
		

		$('.ova_career_single').each(function(){

		    var btnApply = $('.main_content .button-apply');

	        btnApply.on('click', function () {
	        	var that = $(this);
	        	that.closest('.ova_career_single').find('.shortcode').toggleClass('toggled');
	        });
		});

   });

})(jQuery);
