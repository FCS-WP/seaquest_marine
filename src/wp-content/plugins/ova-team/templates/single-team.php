<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );


$id = get_the_ID();

$avatar       = get_post_meta( $id, 'ova_team_met_avatar', true );
$job          = get_post_meta( $id, 'ova_team_met_job', true );
$email        = get_post_meta( $id, 'ova_team_met_email', true );
$phone        = get_post_meta( $id, 'ova_team_met_phone', true );
$address      = get_post_meta( $id, 'ova_team_met_address', true );
$link_address = get_post_meta( $id, 'ova_team_met_link_address', true );
$list_social  = get_post_meta( $id, 'ova_team_met_group_icon', true );

$excerpt_1 = get_post_meta( $id, 'ova_team_met_excerpt_1', true );

$experience_1 = get_post_meta( $id, 'ova_team_met_experience_1', true );
$experience_2 = get_post_meta( $id, 'ova_team_met_experience_2', true );
$group_experience = get_post_meta( $id, 'ova_team_met_group_experience', true );
$group_achievements = get_post_meta( $id, 'ova_team_met_group_achievements', true );

?>

<div class="row_site">
	<div class="container_site">

		<div class="ova_team_single">

			<div class="description">
				<?php if( have_posts() ) : while( have_posts() ) : the_post();
					the_content();
		 		?>
		 		<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>

			<div class="info">

				<div class="bio">

					<!-- Image -->
					<div class="img">
						<?php if( ! empty( $avatar ) ){ ?>
							<img src="<?php echo esc_url( $avatar ); ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>">
						<?php } ?>
					</div>

					<!-- Content -->
					<div class="content">

						<h2 class="name">
							<?php echo get_the_title() ;?>
						</h2>

						<?php if( ! empty( $job ) ) { ?>
							<div class="job">
								<?php echo esc_html( $job ); ?>
							</div>
						<?php } ?>

						<div class="divider"></div>

						<?php if( ! empty( $phone ) ) { ?>
							<div class="phone">
								<div class="icon-label">
									<i class="iconly iconly-Calling icli"></i>
									<span class="label">
										<?php echo esc_html_e('Phone number','ova-team');?>
									</span>
								</div>
								<a href="tel:<?php echo esc_attr( $phone ); ?>" >
									<?php echo esc_html( $phone ); ?>
								</a>
							</div>
						<?php } ?>

						<?php if( ! empty( $email ) ) { ?>
							<div class="email">
								<div class="icon-label">
									<i class="iconly iconly-Message icli"></i>
									<span class="label">
										<?php echo esc_html_e('Email','ova-team') ;?>
									</span>
								</div>
								<a href="mailto:<?php echo esc_attr( $email ); ?>" >
									<?php echo esc_html( $email ); ?>
								</a>
							</div>
						<?php } ?>

						<?php if( ! empty( $address ) ) { ?>
							<div class="address">
								<div class="icon-label">
									<i class="iconly iconly-Location icli"></i>
									<span class="label">
										<?php echo esc_html_e('Address','ova-team') ;?>
									</span>
								</div>
								<?php if( ! empty( $link_address ) ) { ?>
									<a href="<?php echo esc_url( $link_address ) ;?>" target="_blank">
										<?php echo esc_html( $address ); ?>
									</a>
							    <?php } ?>
							</div>
						<?php } ?>

						<div class="divider"></div>

						<?php if( ! empty( $list_social ) ) {  ?>
							<ul class="social">
								<?php
									foreach( $list_social as $social ){

										$class_icon = isset( $social['ova_team_met_class_icon_social'] ) ? $social['ova_team_met_class_icon_social'] : '';
										$link_social = isset( $social['ova_team_met_link_social'] ) ? $social['ova_team_met_link_social'] : '';
										?>
										<li>
											<a href="<?php echo esc_url( $link_social ); ?>" title="<?php echo esc_url( $link_social ); ?>" target="_blank">
												<i class="<?php echo esc_attr( $class_icon ) ?>"></i>
											</a>
										</li>
								<?php } ?>
								
							</ul>
						<?php } ?>

					</div>
					
				</div>

				<div class="main_content">

					<!-- Excerpt -->
					<?php if( ! empty( $excerpt_1 ) ){ ?>
						<div class="excerpt">
							<div class="content">
								<?php echo wpautop( $excerpt_1 ) ?>
							</div>
						</div>
					<?php } ?>

                    <!--  Achievements -->
					<?php if( ! empty( $group_achievements ) ) {  ?>
						<div class="achievements">
							<h3 class="heading">
								<?php echo esc_html__('Achievements', 'ova-team') ?>
							</h3>
							<?php
								foreach( $group_achievements as $achi ){
                                    $achi_topic   = isset( $achi['ova_team_met_achi_topic'] ) ? $achi['ova_team_met_achi_topic'] : ''; 
									$achi_percent = isset( $achi['ova_team_met_achi_percent'] ) ? $achi['ova_team_met_achi_percent'] : ''; 
								?>
									<div class="topic-percent">
										<span class="topic">
											<?php echo esc_html($achi_topic . ':'); ?>
										</span>
										<span class="percent">
										    <?php echo esc_html($achi_percent . '%' ); ?>
										</span>
									</div>
									<div class="progress-bar">
										<div class="percent-view" data-percent="<?php echo esc_attr( $achi_percent ); ?>">
										</div>
									</div>
							<?php } ?>
							
						</div>
					<?php } ?>

                    <!--  Experience excerpt 1 -->
					<?php if( ! empty( $experience_1 ) ) { ?>
						<div class="experience-1">
							<h3 class="heading">
								<?php echo esc_html__('Experience', 'ova-team') ?>
							</h3>
							<p>
								<?php echo esc_html( $experience_1 ) ?>
							</p>
						</div>
					<?php } ?>

                    <!--  Experience -->
					<?php if( ! empty( $group_experience ) ) {  ?>
						<ul class="experience-list">
							<?php
								foreach( $group_experience as $exp ){
                                    $exp_year = isset( $exp['ova_team_met_exp_year'] ) ? $exp['ova_team_met_exp_year'] : ''; 
									$exp_desc = isset( $exp['ova_team_met_exp_desc'] ) ? $exp['ova_team_met_exp_desc'] : ''; 
								?>
									<li>
										<div class="year">
											<?php echo esc_html($exp_year); ?>
										</div>
										<div class="desc">
											<?php echo esc_html($exp_desc); ?>
										</div>
									</li>
							<?php } ?>
							
						</ul>
					<?php } ?>

                    <!--  Experience excerpt 2 -->
					<?php if( ! empty( $experience_2 ) ) { ?>
						<div class="experience-2">
							<p>
								<?php echo esc_html( $experience_2 ) ?>
							</p>
						</div>
					<?php } ?>

					
				</div>
			</div>


		</div>

	</div>
</div>

<?php get_footer( );
