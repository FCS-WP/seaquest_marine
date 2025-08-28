<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );

$id = get_the_ID();

$career_img    = get_post_meta( $id, 'ova_career_met_career_img', true );
$salary        = get_post_meta( $id, 'ova_career_met_salary', true );
$availability  = get_post_meta( $id, 'ova_career_met_availability', true );
$vacancy       = get_post_meta( $id, 'ova_career_met_vacancy', true );
$exp           = get_post_meta( $id, 'ova_career_met_exp', true );
$age           = get_post_meta( $id, 'ova_career_met_age', true );
$gender        = get_post_meta( $id, 'ova_career_met_gender', true );
$job_des       = get_post_meta( $id, 'ova_career_met_job_des', true );
$qualification = get_post_meta( $id, 'ova_career_met_qualification', true );
// group
$group_skill          = get_post_meta( $id, 'ova_career_met_group_skill', true );
$group_benefits       = get_post_meta( $id, 'ova_career_met_group_benefits', true );
$group_responsibility = get_post_meta( $id, 'ova_career_met_group_responsibility', true );

// short code, link button apply
$shortcode  = get_post_meta( $id, 'ova_career_met_shortcode', true );
$link_apply = get_post_meta( $id, 'ova_career_met_link_apply_career', true );

?>

<div class="row_site">
	<div class="container_site">

		<div class="ova_career_single">

			<div class="info">

				<div class="career-description">

					<!-- Image -->
					<div class="img">
						<?php if( ! empty( $career_img  ) ){ ?>
							<img src="<?php echo esc_url( $career_img  ); ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>">
						<?php } ?>
					</div>

					<!-- Job Description -->
					<?php if( ! empty( $job_des  ) ){ ?>
						<div class="job-description">
							<h4 class="heading">
								<?php echo esc_html_e('Job description','ova-career') ;?>
							</h4>
							<?php printf( $job_des ); ?>	
						</div>
					<?php } ?>

					<!-- Skill -->
					<?php if( ! empty( $group_skill ) ) {  ?>
						<div class="skill">
							<h4 class="heading">
									<?php echo esc_html_e('Skill','ova-career') ;?>
							</h4>
						    <?php
							foreach( $group_skill as $des_skill ){
							?>
								<div class="skill-wrapper">
									<?php echo esc_html($des_skill['ova_career_met_skill_des']); ?>	
								</div>
						    <?php } ?>
						</div>
					<?php } ?>
				</div>

				<div class="main_content">

					<div class="top">
						<h4 class="heading">
							<?php echo esc_html_e('Position :','ova-career') ;?>
						</h4>
						<h2 class="position">
							<?php echo get_the_title() ;?>
						</h2>
						<div class="divider"></div>
					</div>

					<?php if( ! empty( $salary ) ) { ?>
						<div class="salary">
							<h4 class="heading salary-heading">
							     <?php echo esc_html_e('Offer salary :','ova-career') ;?>
						    </h4>
							<?php echo esc_html( $salary ); ?>
						</div>
					<?php } ?>

					<div class="details">
						<h4 class="heading">
						    <?php echo esc_html_e('Detail :','ova-career') ;?>
					    </h4>

					    <ul>
					    	<li>
					    		<span class="text">
							    	<?php echo esc_html_e('Availability:','ova-career') ;?>
							    </span>
							    <span class="details-content">
							    	<?php echo esc_html( $availability ); ?>	
							    </span>
					    	</li>
					    	<li>
					    		<span class="text">
							    	 <?php echo esc_html_e('Experience:','ova-career') ;?>
							    </span>
								<span class="details-content">
									<?php echo esc_html( $exp ); ?>
								</span>
					    	</li>
					    	<li>
					    		<span class="text">
							    	 <?php echo esc_html_e('Age:','ova-career') ;?>
							    </span>
								<span class="details-content">
									<?php echo esc_html( $age ); ?>
								</span>
					    	</li>
					    	<li>
					    		<span class="text">
							    	 <?php echo esc_html_e('Gender:','ova-career') ;?>
							    </span>
								<span class="details-content">
									<?php echo esc_html( $gender ); ?>
								</span>
					    	</li>
					    	<li>
					    		<span class="text">
							    	 <?php echo esc_html_e('Vacancy:','ova-career') ;?>
							    </span>
								<span class="details-content">
									<?php echo esc_html( $vacancy ); ?>
								</span>
					    	</li>
					    	<li>
					    		<span class="text">
							    	 <?php echo esc_html_e('Qualification:','ova-career') ;?>
							    </span>
								<span class="details-content">
									<?php echo esc_html( $qualification ); ?>
								</span>
					    	</li>
					    </ul>
					</div>
					
                     <!--  Benefits -->
					<?php if( ! empty( $group_benefits ) ) {  ?>
						<h4 class="heading">
						    <?php echo esc_html_e('Benefits :','ova-career') ;?>
					    </h4>

						<ul class="list">
							<?php
								foreach( $group_benefits as $des_benefits ){
								?>
									<li>
										<?php echo esc_html($des_benefits['ova_career_met_benefits_des']); ?>	
									</li>
							<?php } ?>
							
						</ul>
					<?php } ?>

                    <!-- Responsibility -->
					<?php if( ! empty( $group_responsibility ) ) {  ?>
						<h4 class="heading">
						    <?php echo esc_html_e('Responsibility :','ova-career') ;?>
					    </h4>

						<ul class="list">
							<?php
								foreach( $group_responsibility as $des_responsibility ){
								?>
									<li>
										<?php echo esc_html($des_responsibility['ova_career_met_responsibility_des']); ?>	
									</li>
							<?php } ?>
							
						</ul>
					<?php } ?>

					<!-- Apply Button -->
		            <?php if( !empty( $link_apply ) || !empty( $shortcode )  ) :  ?>

		                <div class="button-apply">
		                	<?php if( !empty( $link_apply ) ) :  ?>
			                	<a href="<?php echo esc_attr($link_apply);?>" target="_blank">
			                		<?php echo esc_html_e('Apply for this job','ova-career') ;?>
			                		<i class="ovaicon ovaicon-next-4"></i>
			                	</a>
			                <?php else: ?>
			                	<a>
			                		<?php echo esc_html_e('Apply for this job','ova-career') ;?>
			                		<i class="iconly iconly-Arrow-Down-2 icli"></i>
			                	</a>
		                    <?php endif;?>
			            </div>

		            <?php endif; ?>
		             <!-- End Apply Button -->

				</div>
				<!-- end main content -->
			</div>

            <!-- end info -->

            <!-- shortcode form -->
            <?php if( !empty( $shortcode ) && empty( $link_apply ) ) :  ?>
	            <div class="shortcode" id="career_shortcode">
	            	<?php echo do_shortcode($shortcode); ?>
	            </div>
            <?php endif; ?>
             <!-- end shortcode form -->

            <div class="content">
				
				<?php if( have_posts() ) : while( have_posts() ) : the_post();
					the_content();
		 		?>	
		 		<?php endwhile; endif; wp_reset_postdata(); ?>

			</div>

		</div>
		<!-- end ova_career_single -->
	</div>
	<!-- end row -->
</div>
<!-- end container -->

<?php get_footer( );
