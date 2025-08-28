<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );

?>

<div class="row_site">
	<div class="container_site">

		<div class="service_single">
			
			<div class="content">
				
				<?php if( have_posts() ) : while( have_posts() ) : the_post();
					the_content();
		 		?>	
		 		<?php endwhile; endif; wp_reset_postdata(); ?>

		        <?php
			        if( comments_open( get_the_ID() ) ) {
			        	comments_template(); 
			        }
		        ?>
			</div>

			<!-- end ova_sev_content -->
			<div class="sidebar">

				<div class="widgets">
					<?php if(is_active_sidebar('service-sidebar')){
					        dynamic_sidebar('service-sidebar');
					} ?>
				</div>

			</div>
			<!-- end ova-sev-sidebar -->
		</div>
		<!-- end ova_sev_single -->
	</div>
	<!-- end row -->
</div>
<!-- end container -->

<?php get_footer( );
