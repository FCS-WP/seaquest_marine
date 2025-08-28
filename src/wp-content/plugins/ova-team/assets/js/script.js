(function($){
	"use strict";
	

	$(document).ready(function () {

	        $('.ova_team_single .percent-view').each(function(){
   				var that 		 = $(this);
   				var percent 	 = that.data('percent');
   				var percent_view = that.closest('.progress-bar').find('.percent-view');

   				percent_view.animate({
			        width: percent + "%"
			        },1000
		        );

   			});

   });

})(jQuery);
