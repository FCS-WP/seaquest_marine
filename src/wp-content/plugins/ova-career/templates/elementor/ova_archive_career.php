<?php if ( !defined( 'ABSPATH' ) ) exit();

$icon          = $args['selected_icon']['value'];
$icon_active   = $args['selected_active_icon']['value'];
$text_button   = $args['text_button'];
$icon_button   = $args['icon_button']['value'];

$career = ova_career_get_career_el( $args );

?>


<div class="ova_archive_career">
			
	<div class="career-content">

			<div class="left">

				<?php 
					$count = 0;
					$total = $career->found_posts;
				?>

				<?php if( $career->have_posts() ) : while ( $career->have_posts() ) : $career->the_post(); 
					$id = get_the_id();
					$salary         = get_post_meta( $id, 'ova_career_met_salary', true );
					$availability   = get_post_meta( $id, 'ova_career_met_availability', true );
					$vacancy        = get_post_meta( $id, 'ova_career_met_vacancy', true );
					$benefits       = get_post_meta( $id, 'ova_career_met_group_benefits', true );
					$responsibility = get_post_meta( $id, 'ova_career_met_group_responsibility', true );
				?>

				<div class="item-career">
				    <div class="position">
				    	<span class="text-heading"><?php echo esc_html_e('Position :','ova-career');?></span>
						<a href="<?php the_permalink(); ?>" >
							<?php the_title(); ?>
						</a>
					</div>

					<div class="info">

						<div class="item salary">
							<span class="text"><?php echo esc_html_e('Offered Salary:','ova-career');?></span>
							<?php if( !empty( $salary ) ) : ?>
							    <span class="content">
							    	<?php echo esc_html($salary); ?>
							    </span>
	                        <?php endif; ?>
						</div>

						<div class="item availability">
							<span class="text"><?php echo esc_html_e('Availability:','ova-career');?></span>
							<?php if( !empty( $availability ) ) : ?>
							    <span class="content">
							    	<?php echo esc_html($availability); ?>
							    </span>
	                        <?php endif; ?>
						</div>

						<div class="item vacancy">
							<span class="text"><?php echo esc_html_e('Vacancy:','ova-career');?></span>
							<?php if( !empty( $vacancy ) ) : ?>
							    <span class="content">
							    	<?php echo esc_html($vacancy); ?>
							    </span>
	                        <?php endif; ?>
						</div>
					</div>

				    <div class="toggle" data-icon="<?php echo esc_attr($icon);?>" data-icon_active="<?php echo esc_attr($icon_active);?>">
	                    <div class="top">
	                    	<div class="seemore">
	                    		<span class="text"><?php echo esc_html_e('See more','ova-career');?></span>
	                    	    <i class="<?php echo esc_attr($icon);?>"></i>
	                    	</div>

	                        <a href="<?php the_permalink();?>">
		                    	<div class="button join-team">
		                    		<i class="<?php echo esc_attr($icon_button);?>"></i>
		                    		<span class="text-button"><?php echo esc_html( $text_button );?></span>
		                    	</div>
		                    </a>
	                    </div>

	                    <div class="toggle-item">
	                    	<div class="benefits">
								<span class="text"><?php echo esc_html_e('Benefits:','ova-career');?></span>
								<?php if( !empty( $benefits ) ) : ?>
									<ul> 
										<?php
											foreach( $benefits as $key => $benefit ){   
		                                    $benefit_des = isset( $benefit['ova_career_met_benefits_des'] ) ? $benefit['ova_career_met_benefits_des'] : '';
		                                ?>
											<li class="description">
												<?php echo esc_html( $benefit_des ) ?>
											</li>
		                                    
										<?php } ?>

									</ul>	
								<?php endif; ?>
							</div>

							<div class="responsibility">
								<span class="text"><?php echo esc_html_e('Responsibility:','ova-career');?></span>
								<?php if( !empty( $responsibility ) ) : ?>
									<ul> 
										<?php
											foreach( $responsibility as $key => $resl ){   
		                                    $resl_des = isset( $resl['ova_career_met_responsibility_des'] ) ? $resl['ova_career_met_responsibility_des'] : '';
		                                ?>
											<li class="description">
												<?php echo esc_html( $resl_des ) ?>
											</li>

										<?php } ?>

									</ul>	
								<?php endif; ?>
							</div>
	                    </div>
					</div>
				</div>

	            <?php 
		            $temp = ceil($total/2 - 1 ); 
		            if( $count == $temp  ) : 
	            ?>
					</div>

					<div class="right">
				<?php endif; $count++;?>

		        <?php endwhile; endif; wp_reset_postdata(); ?>

	        </div>
	</div>

</div>

