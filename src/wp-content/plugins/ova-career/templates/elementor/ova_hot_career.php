<?php if ( !defined( 'ABSPATH' ) ) exit();

$icon          = $args['selected_icon']['value'];
$icon_active   = $args['selected_active_icon']['value'];
$text_button   = $args['text_button'];
$icon_button   = $args['icon_button']['value'];

$career = ova_career_get_id_career( $args );

?>


<div class="hot-career">
			
	<div class="content <?php echo esc_attr( $number_column ) ?>">

		<?php if( $career->have_posts() ) : while ( $career->have_posts() ) : $career->the_post(); ?>

			<?php 
				$id = get_the_id();
				$salary         = get_post_meta( $id, 'ova_career_met_salary', true );
				$availability   = get_post_meta( $id, 'ova_career_met_availability', true );
				$vacancy        = get_post_meta( $id, 'ova_career_met_vacancy', true );
				$benefits       = get_post_meta( $id, 'ova_career_met_group_benefits', true );
				$responsibility = get_post_meta( $id, 'ova_career_met_group_responsibility', true );
			 ?>

			<div class="item-hot-career">

				<div class="info">

					<div class="item position">
				    	<span class="text"><?php echo esc_html_e('Position :','ova-career');?></span>
						<span class="content">
							<?php the_title(); ?>
						</span>
				    </div>

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
                 
                	<div class="toggle-wrap benefits">
                		<div class="seemore">
                    		<span class="text"><?php echo esc_html_e('Benefits:','ova-career');?></span>
                    	    <i class="<?php echo esc_attr($icon);?>"></i>
                    	</div>
						
						<?php if( !empty( $benefits ) ) : ?>
							<ul class="toggle-item"> 
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

					<div class="toggle-wrap responsibility">
						<div class="seemore">
                    		<span class="text"><?php echo esc_html_e('Responsibility:','ova-career');?></span>
                    	    <i class="<?php echo esc_attr($icon);?>"></i>
                    	</div>
						<?php if( !empty( $responsibility ) ) : ?>
							<ul class="toggle-item"> 
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

				 
                <a href="<?php the_permalink();?>">
                	<div class="button join-team">
                		<i class="<?php echo esc_attr($icon_button);?>"></i>
                		<span class="text-button"><?php echo esc_html( $text_button );?></span>
                	</div>
                </a>
              
			</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>

</div>

