<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$number_column = get_theme_mod( 'ova_team_layout', 'four_column' );


?>
<div class="row_site">
	<div class="container_site">

		<div class="archive_team ">
			
			<div class="content <?php echo esc_attr( $number_column ) ?>">

				<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php 
						$id = get_the_id();

						$avatar = get_post_meta( $id, 'ova_team_met_avatar', true );
						$job = get_post_meta( $id, 'ova_team_met_job', true );
						$list_social = get_post_meta( $id, 'ova_team_met_group_icon', true );
					 ?>

					<div class="item-team">

						<div class="img">
							
							<!-- Avata -->
						    <a href="<?php the_permalink(); ?>" >
						    	
						    	<img src="<?php echo esc_url( $avatar ) ?>" class="img-responsive team-img" alt="<?php the_title() ?>">
								<div class="mask"></div>
							</a>
							
							<!-- list Icon -->
							<div class="list-icon" >

								<?php if( !empty( $list_social ) ) : ?>

									<ul> 
										<?php
											foreach( $list_social as $social ){

												$class_icon = isset( $social['ova_team_met_class_icon_social'] ) ? $social['ova_team_met_class_icon_social'] : '';
												$link_social = isset( $social['ova_team_met_link_social'] ) ? $social['ova_team_met_link_social'] : '';
												?>
												<li class="item">
													<a href="<?php echo esc_url( $link_social ); ?>" title="<?php echo esc_url( $link_social ); ?>" target="_blank">
														<i class="<?php echo esc_attr( $class_icon ) ?>"></i>
													</a>
												</li>
										<?php } ?>
										
									</ul>
									
								<?php endif; ?>

						    </div>

						</div>

						<!-- Info -->
						<div class="info">

							
							<h2 class="name">
								 <a href="<?php the_permalink(); ?>" >
									<?php the_title(); ?>
								</a>
							</h2>
							

							<?php if ( !empty ($job)) : ?>
								<p  class="job">
									<?php echo esc_html($job) ; ?>
								</p>
							<?php endif; ?>

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