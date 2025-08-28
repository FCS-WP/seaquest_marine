<?php

$data_options['items']              = $args['item_number'];
$data_options['slideBy']            = $args['slides_to_scroll'];
$data_options['margin']             = $args['margin_items'];
$data_options['autoplayHoverPause'] = $args['pause_on_hover'] === 'yes' ? true : false;
$data_options['loop']               = $args['infinite'] === 'yes' ? true : false;
$data_options['autoplay']           = $args['autoplay'] === 'yes' ? true : false;
$data_options['autoplayTimeout']    = $args['autoplay_speed'];
$data_options['smartSpeed']         = $args['smartspeed'];
$data_options['dots']               = $args['dot_control'] === 'yes' ? true : false;
$data_options['nav']                = $args['nav_control'] === 'yes' ? true : false;

$show_name    = $args['show_name'];
$show_social  = $args['show_social'];
$show_job     = $args['show_job'];
$show_email   = $args['show_email'];
$show_phone   = $args['show_phone'];
$show_link_to = $args['show_link_to_detail'];

$teams = ovateam_get_data_team_slider_2_el( $args );

?>
<div class="ova-team-slider-2">
	<div class="slide-team-2 owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
		<?php if( $teams->have_posts() ) : while ( $teams->have_posts() ) : $teams->the_post(); ?>

			<div class="item">
				<?php 

				$id = get_the_id();

				$avatar = get_post_meta( $id, 'ova_team_met_avatar', true );

				$job = get_post_meta( $id, 'ova_team_met_job', true );
				$email = get_post_meta( $id, 'ova_team_met_email', true );
				$phone = get_post_meta( $id, 'ova_team_met_phone', true );
				$list_social = get_post_meta( $id, 'ova_team_met_group_icon', true );

				?>

				<div class="content_info">
					<div class="ova-media">
						<?php if( ! empty( $avatar ) ){ ?>
							<?php if( $show_link_to == 'yes' ): ?>
						    <a href="<?php the_permalink();?>">
						    <?php endif; ?>	

						        <img src="<?php echo esc_url( $avatar ) ?>" class="img-responsive" alt="<?php echo get_the_title() ?>">
								<div class="mask"></div>

							<?php if( $show_link_to == 'yes' ): ?>
							</a>
						    <?php endif; ?>	
						<?php } ?>

                        <!-- Social Icon -->
						<?php if( ! empty( $list_social ) && $show_social == 'yes' ) { ?>
						<div class="ova-social">
							<ul>
								<?php 
								foreach( $list_social as $social ){

									$class_icon = isset( $social['ova_team_met_class_icon_social'] ) ? $social['ova_team_met_class_icon_social'] : '';
									$link_social = isset( $social['ova_team_met_link_social'] ) ? $social['ova_team_met_link_social'] : '';
									?>
									<li>
										<a href="<?php echo esc_url( $link_social ); ?>" title="<?php echo esc_url( $link_social ); ?>">
											<i class="<?php echo esc_attr( $class_icon ) ?>"></i>
										</a>
									</li>
									<?php
								}
								?>
							</ul>
						</div>
						<?php } ?>

					</div>
					<div class="ova-info-content">

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

						<?php if( ! empty( $email ) && $show_email == 'yes' ) { ?>
							<div class="ova-email">
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:<?php echo esc_attr( $email ) ?>" ><?php echo esc_html( $email ) ?></a>
							</div>
						<?php } ?>
						<?php if( ! empty( $phone ) && $show_phone == 'yes' ) { ?>
							<div class="ova-phone">
								<i class="fa fa-phone"></i>
								<a href="tel:<?php echo esc_attr( $phone ) ?>" ><?php echo esc_html( $phone ) ?></a>
							</div>
						<?php } ?>

					</div>
				</div>

			</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>

</div>
