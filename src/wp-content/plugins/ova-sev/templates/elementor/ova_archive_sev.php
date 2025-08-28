<?php if ( !defined( 'ABSPATH' ) ) exit();

$number_column = $args['number_column'];
$class_icon    = $args['icon']['value'];

$sevs = ova_sev_get_services_el( $args );
?>


<div class="archive_sev">
			
	<div class="content <?php echo esc_attr( $number_column ) ?>">

		<?php if( $sevs->have_posts() ) : while ( $sevs->have_posts() ) : $sevs->the_post(); ?>

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

				<?php if( !empty ($class_icon) ) : ?>
                	<div class="service-icon">
                    	<i class="<?php echo esc_attr($class_icon); ?>"></i>
                    </div>
                <?php endif; ?>
				
			</div>

			

		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>

</div>

