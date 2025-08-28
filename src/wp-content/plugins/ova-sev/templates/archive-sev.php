<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();

$number_column = get_theme_mod( 'ova_sev_layout', 'four_column' );


?>
<div class="row_site">
	<div class="container_site">

		<div class="archive_sev">
			
			<div class="content <?php echo esc_attr( $number_column ) ?>">

				<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php 
						$id = get_the_id();
						$thumbnail = get_post_meta( $id, 'ova_sev_met_thumbnail', true );
					 ?>

					<div class="item-service">

						<div class="img">
							
							<!-- Avata -->
						    <a href="<?php the_permalink(); ?>" >
						    	
						    	<img src="<?php echo esc_url( $thumbnail ) ?>" class="img-responsive service-img" alt="<?php the_title() ?>">
								<div class="mask"></div>
							</a>

						</div>

						<!-- Info -->
						<div class="info">
							
							<h2 class="name">
								 <a href="<?php the_permalink(); ?>" >
									<?php the_title(); ?>
								</a>
							</h2>

						</div>

                        <!-- Icon -->
						<div class="service-icon">
	                    	<i class="ovaicon ovaicon-plus"></i>
	                    </div>
						
					</div>

					

				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
			
			<?php 
	    		 $args = array(
	                'type'      => 'list',
	                'next_text' => '<i class="ovaicon-next"></i>',
	                'prev_text' => '<i class="ovaicon-back"></i>',
	            );

	            the_posts_pagination($args);
	    	 ?>
		

		</div>
	</div>
</div>

<?php 
get_footer();

