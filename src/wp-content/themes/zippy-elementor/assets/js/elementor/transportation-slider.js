(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        elementorFrontend.hooks.addAction('frontend/element_ready/transflash_elementor_transportation_slider.default', function(){
	       
	        /* Add your code here */
	    	$(".transportation-slider").each(function(){
		        var owlsl = $(this) ;
		        var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};

		        var responsive_value = {
		            0:{
		              items:1,
		            },
		            576:{
		              items:1
		            },
		            1170:{
		              items:owlsl_ops.items
		            }
		        };
		        
		        owlsl.owlCarousel({
		          autoWidth: owlsl_ops.autoWidth,
		          margin: owlsl_ops.margin,
		          items: owlsl_ops.items,
		          loop: owlsl_ops.loop,
		          autoplay: owlsl_ops.autoplay,
		          autoplayTimeout: owlsl_ops.autoplayTimeout,
		          center: owlsl_ops.center,
		          dots: false,
		          nav: owlsl_ops.nav,
		          thumbs: owlsl_ops.thumbs,
		          autoplayHoverPause: owlsl_ops.autoplayHoverPause,
		          slideBy: owlsl_ops.slideBy,
		          smartSpeed: owlsl_ops.smartSpeed,
		          rtl: owlsl_ops.rtl,
		          responsive: responsive_value,
		          navText:[
		          '<i class="iconly-Arrow-Left-2 icli" ></i>',
		          '<i class="iconly-Arrow-Right-2 icli" ></i>'
		          ],
		        });

		      	/* Fixed WCAG */
		      	owlsl.find(".owl-nav button.owl-prev").attr("title", "Previous");
				owlsl.find(".owl-nav button.owl-next").attr("title", "Next");

		    }); 
	      

        });


   });

})(jQuery);
