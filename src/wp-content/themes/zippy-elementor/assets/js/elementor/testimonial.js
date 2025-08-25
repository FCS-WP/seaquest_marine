(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        
		elementorFrontend.hooks.addAction('frontend/element_ready/transflash_elementor_testimonial.default', function(){

			$(".slide-testimonials").each(function(){
		        var owlsl = $(this) ;
		        var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};

		        var responsive_value = {
		            0:{
		              items:1,
		              dots:false
		            },
		            536:{
		              items:1
		            },
		            992:{
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
		          nav: owlsl_ops.nav,
		          dots: owlsl_ops.dots,
		          dotsData: true,
		          thumbs: owlsl_ops.thumbs,
		          autoplayHoverPause: owlsl_ops.autoplayHoverPause,
		          slideBy: owlsl_ops.slideBy,
		          smartSpeed: owlsl_ops.smartSpeed,
		          rtl: owlsl_ops.rtl,
		          responsive: responsive_value,
		        });

		      	/* Fixed WCAG */
				owlsl.find(".owl-dots button").attr("title", "Dots");

		      });
		});


   });

})(jQuery);
