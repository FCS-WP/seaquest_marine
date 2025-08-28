<?php

$number_column = $args['number_column'];
$show_social = $args['show_social'];
$show_name = $args['show_name'];
$show_job = $args['show_job'];
$show_img = $args['show_img'];
$show_link_to = $args['show_link_to_detail'];


$teams = ovateam_get_data_team_el( $args );

?>
		
	<div class="ova-team ">

		<div class="content <?php echo esc_attr( $number_column ) ?>">

			<?php if($teams->have_posts() ) : while ( $teams->have_posts() ) : $teams->the_post(); ?>

				<?php 
					$id = get_the_id();

					$avatar      = get_post_meta( $id, 'ova_team_met_avatar', true );
					// $avatar      = wp_get_attachment_image_url(get_post_thumbnail_id(), 'team_small' );
					$job         = get_post_meta( $id, 'ova_team_met_job', true );
					$list_social = get_post_meta( $id, 'ova_team_met_group_icon', true );
				 ?>

				<div class="item-team">

					<div class="img">
						
						<!-- Avata -->
						<?php if( $show_img == 'yes' ){ ?>

							<?php if( $show_link_to == 'yes' ): ?>
						    <a href="<?php the_permalink();?>">
						    <?php endif; ?>	

						    	<img src="<?php echo esc_url( $avatar ) ?>" class="img-responsive team-img" alt="<?php the_title() ?>">
								<div class="mask"></div>

						    <?php if( $show_link_to == 'yes' ): ?>
							</a>
						    <?php endif; ?>	

						<?php } ?>
						
						<!-- list Icon -->
						<?php if( $show_social == 'yes' ){ ?>
							<div class="list-icon" >

								<?php if( !empty( $list_social ) ) : ?>

									<ul> 
										<?php
											foreach( $list_social as $key => $social ){
                                                    $class_icon = isset( $social['ova_team_met_class_icon_social'] ) ? $social['ova_team_met_class_icon_social'] : '';
												    $link_social = isset( $social['ova_team_met_link_social'] ) ? $social['ova_team_met_link_social'] : '';
												?>
												<?php if ( $key <=2 ) { ?>
													<li class="item">
														<a href="<?php echo esc_url( $link_social ); ?>" title="<?php echo esc_url( $link_social ); ?>" target="_blank">
															<i class="<?php echo esc_attr( $class_icon ) ?>"></i>
														</a>
													</li>
                                                <?php } ?>
										<?php } ?>
										
									</ul>
									
								<?php endif; ?>

						    </div>
					    <?php } ?>

					</div>

					<!-- Info -->
					<div class="info">

						<?php if ( !empty ($job) && $show_job == 'yes' ) : ?>
							<p class="job">
								<?php echo esc_html($job) ; ?>
							</p>
						<?php endif; ?>

						<?php if( $show_name == 'yes' ){ ?>
							<h3 class="name">
								<?php if( $show_link_to == 'yes' ): ?>
								 <a href="<?php the_permalink();?>">
								<?php endif; ?>

									<?php the_title(); ?>
									
								<?php if( $show_link_to == 'yes' ): ?>
								</a>
								<?php endif; ?>
							</h3>
						<?php } ?>

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