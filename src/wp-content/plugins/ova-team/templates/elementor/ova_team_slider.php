<?php

$show_name    = $args['show_name'];
$show_job     = $args['show_job'];
$show_social  = $args['show_social'];
$show_img     = $args['show_img'];
$show_link_to = $args['show_link_to_detail'];

$data_options['items']              = $args['item_number'];
$data_options['slideBy']            = $args['slides_to_scroll'];
$data_options['margin']             = $args['margin_items'];
$data_options['autoplayHoverPause'] = $args['pause_on_hover'] === 'yes' ? true : false;
$data_options['loop']               = $args['infinite'] === 'yes' ? true : false;
$data_options['autoplay']           = $args['autoplay'] === 'yes' ? true : false;
$data_options['autoplayTimeout']    = $args['autoplay_speed'];
$data_options['smartSpeed']         = $args['smartspeed'];
$data_options['dots']               = $args['dot_control'] === 'yes' ? true : false;


$teams = ovateam_get_data_team_slider_el( $args );

?>


<div class="ova-team-slider">

	<div class="content slide-team owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">

		<?php if( $teams->have_posts() ) : while ( $teams->have_posts() ) : $teams->the_post(); ?>

			<div class="item">
				<?php 

					$id = get_the_id();

					$avatar = get_post_meta( $id, 'ova_team_met_avatar', true );
					$job = get_post_meta( $id, 'ova_team_met_job', true );
					$list_social = get_post_meta( $id, 'ova_team_met_group_icon', true );

				?>

				<div class="content_info">
					
					<?php if( ! empty( $avatar ) && $show_img == 'yes' ){ ?>	
						<div class="ova-media">
							<?php if( $show_link_to == 'yes' ): ?>
						    <a href="<?php the_permalink();?>">
						    <?php endif; ?>	
								<div class="img-media" style="background-image: url(<?php echo esc_url( $avatar ) ?>)" title="<?php esc_html_e('Media', 'ova-team'); ?>">
								</div>
							<?php if( $show_link_to == 'yes' ): ?>
							</a>
						    <?php endif; ?>
						</div>
					<?php } ?>

					<div class="ova-info">

						<?php if( $show_name == 'yes' ) { ?>
							<?php if( $show_link_to == 'yes' ): ?>
						    <a href="<?php the_permalink();?>">
						    <?php endif; ?>	

								<h3 class="name">
									<?php the_title() ?>
								</h3>
								
							 <?php if( $show_link_to == 'yes' ): ?>
							 </a>
						    <?php endif; ?>	
						<?php } ?>

						<?php if( ! empty( $job ) && $show_job == 'yes' ) { ?>
							<p class="job">
								<?php echo esc_html( $job ) ?>
							</p>
						<?php } ?>

						<!-- list Icon -->
						<?php if( $show_social == 'yes' ){ ?>
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
					    <?php } ?>

					</div>
				</div>
			</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>

</div>
