(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        elementorFrontend.hooks.addAction('frontend/element_ready/transflash_elementor_blog_slider_popular.default', function(){
	       
	        /* Add your code here */
	    	
	           $(".blog-slider-popular").each(function(){
		        var owlsl = $(this) ;
		        var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};

		        var responsive_value = {
		            0:{
		              items:1,
		              autoWidth:false
		            },
		            700:{
		              items:1
		            },
		            1200:{
		              items:owlsl_ops.items
		            }
		        };
		        
		        var carousel = owlsl.owlCarousel({
		          autoWidth: owlsl_ops.autoWidth,
		          margin: owlsl_ops.margin,
		          items: owlsl_ops.items,
		          loop: owlsl_ops.loop,
		          autoplay: owlsl_ops.autoplay,
		          autoplayTimeout: owlsl_ops.autoplayTimeout,
		          center: owlsl_ops.center,
		          nav: owlsl_ops.nav,
		          dots: false,
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

		        carousel.imagesLoaded( function() {
					carousel.trigger( 'refresh.owl.carousel' );
				});

		      	/* Fixed WCAG */
				owlsl.find(".owl-nav button.owl-prev").attr("title", "Previous");
				owlsl.find(".owl-nav button.owl-next").attr("title", "Next");

				/*****First Load ( add class for display content post first active item )********/
				owlsl.find('.owl-item.active').each( function(i) {
					if ( i === 0 ) {
						$(this).addClass('active-first');
					}
				});
                /*****On Changed********/
				owlsl.on('changed.owl.carousel', function(event) {
					var that = $(this);
					that.find('.owl-item').removeClass('active-first');
					var index = event.item.index;
					that.find('.owl-item').each( function(i) {
						if ( i === index ) {
							$(this).addClass('active-first');
						}
					});
				});
                /*****On Dragged********/
				owlsl.on('dragged.owl.carousel', function(event) {
					var that = $(this);
					that.find('.owl-item').removeClass('active-first');
					that.find('.owl-item.active:first').addClass('active-first');
				});	

		      });

        });


   });

})(jQuery);
