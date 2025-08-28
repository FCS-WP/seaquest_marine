<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();

$number_column = get_theme_mod( 'ova_career_layout', 'two_column' );

?>
<div class="row_site">
	<div class="container_site">

		<div class="archive_career">

			<h3 class="heading">
				<?php echo esc_html_e('You may interest in','ova-career'); ?>
			</h3>
			
			<div class="career-content <?php echo esc_attr( $number_column ) ?>">

				<div class="left">

					<?php 
						$count = 0;
						$total = wp_count_posts()->publish;
					?>

					<?php if( have_posts() ) : while ( have_posts() ) : the_post(); 
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

					    <div class="toggle">
		                    <div class="top">
		                    	<div class="seemore">
		                    		<span class="text"><?php echo esc_html_e('See more','ova-career');?></span>
		                    	    <i class="ovaicon ovaicon-plus"></i>
		                    	</div>

		                        <a href="<?php the_permalink();?>">
			                    	<div class="button join-team">
			                    		<i class="ovaicon ovaicon-next-4"></i>
			                    		<span class="text-button"><?php echo esc_html_e('Join our team','ova-career');?></span>
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

