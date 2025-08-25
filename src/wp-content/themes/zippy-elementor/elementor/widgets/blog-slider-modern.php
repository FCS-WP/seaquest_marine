<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Blog_Slider_Modern extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_blog_slider_modern';
	}

	
	public function get_title() {
		return esc_html__( 'Blog Slider Modern', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-posts-carousel';
	}

	
	public function get_categories() {
		return [ 'transflash' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/libs/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/libs/owl.carousel.min.js', array('jquery'), false, true );
		return [ 'transflash-elementor-blog-slider-modern' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$args = array(
		   'orderby' => 'name',
		   'order' => 'ASC'
		);

		$categories=get_categories($args);
		$cate_array = array();
		$arrayCateAll = array( 'all' => 'All categories ' );
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->cat_name] = $cate->name;
			}
		} else {
			$cate_array["No content Category found"] = 0;
		}

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'transflash' ),
			]
		);	

		   $this->add_control(
				'category',
				[
					'label' => esc_html__( 'Category', 'transflash' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'all',
					'options' => array_merge($arrayCateAll,$cate_array),
				]
			);

			$this->add_control(
				'total_count',
				[
					'label' => esc_html__( 'Post Total', 'transflash' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 5,
				]
			);

			$this->add_control(
				'order_by',
				[
					'label' => esc_html__('Order', 'transflash'),
					'type' => Controls_Manager::SELECT,
					'default' => 'asc',
					'options' => [
						'asc' => esc_html__('Ascending', 'transflash'),
						'desc' => esc_html__('Descending', 'transflash'),
					]
				]
			);

			$this->add_control(
				'show_date',
				[
					'label' => esc_html__( 'Show Date', 'transflash' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'transflash' ),
					'label_off' => esc_html__( 'Hide', 'transflash' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);
			

		$this->end_controls_section();

		/*****************************************************************
						START SECTION ADDITIONAL
		******************************************************************/

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'transflash' ),
			]
		);

			$this->add_control(
				'margin_items',
				[
					'label'   => esc_html__( 'Margin Right Items', 'transflash' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 30,
				]
				
			);

			$this->add_control(
				'item_number',
				[
					'label'       => esc_html__( 'Item Number', 'transflash' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'transflash' ),
					'default'     => 2.5,
				]
			);

	

			$this->add_control(
				'slides_to_scroll',
				[
					'label'       => esc_html__( 'Slides to Scroll', 'transflash' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Set how many slides are scrolled per swipe.', 'transflash' ),
					'default'     => 1,
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label'   => esc_html__( 'Pause on Hover', 'transflash' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'transflash' ),
						'no'  => esc_html__( 'No', 'transflash' ),
					],
					'frontend_available' => true,
				]
			);


			$this->add_control(
				'infinite',
				[
					'label'   => esc_html__( 'Infinite Loop', 'transflash' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'transflash' ),
						'no'  => esc_html__( 'No', 'transflash' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay',
				[
					'label'   => esc_html__( 'Autoplay', 'transflash' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'transflash' ),
						'no'  => esc_html__( 'No', 'transflash' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay_speed',
				[
					'label'     => esc_html__( 'Autoplay Speed', 'transflash' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 3000,
					'step'      => 500,
					'condition' => [
						'autoplay' => 'yes',
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'smartspeed',
				[
					'label'   => esc_html__( 'Smart Speed', 'transflash' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 500,
				]
			);

			$this->add_control(
				'nav_control',
				[
					'label'   => esc_html__( 'Show Nav Control', 'transflash' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'transflash' ),
						'no'  => esc_html__( 'No', 'transflash' ),
					],
					'frontend_available' => true,
				]
			);

		$this->end_controls_section();

		/****************************  END SECTION ADDITIONAL *********************/

		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ova-blog-slider-modern .post-title a',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .post-title a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .post-title a:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_underline',
				[
					'label' => esc_html__( 'Color Underline', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .post-title:before' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_underline_hover',
				[
					'label' => esc_html__( 'Color Underline Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .post-title:hover:before' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_title',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE

		// Date style
		$this->start_controls_section(
			'section_date',
			[
				'label' => esc_html__( 'Date', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_date' => 'yes'
				]
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'date_typography',
					'selector' => '{{WRAPPER}} .ova-blog-slider-modern .item .info .date',
				]
			);

			$this->add_control(
				'color_date',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .item .info .date' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_date_hover',
				[
					'label' => esc_html__( 'Color hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .item .info .date:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_date',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .item .info .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		//******nav style*****/
		$this->start_controls_section(
			'section_nav',
			[
				'label' => esc_html__( 'Nav Control', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'nav_control' => 'yes'
				]
			]
		);

			$this->add_control(
				'nav_color',
				[
					'label'     => esc_html__( 'Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav .owl-prev' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav .owl-next' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_color_hover',
				[
					'label'     => esc_html__( 'Color Hover', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav .owl-prev:hover' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav .owl-next:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_bgcolor',
				[
					'label'     => esc_html__( 'Background Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav .owl-prev' => 'background-color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav .owl-next' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_bgcolor_hover',
				[
					'label'     => esc_html__( 'Background Color Hover', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav .owl-prev:hover' => 'background-color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav .owl-next:hover' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'nav_top',
				[
					'label' 		=> esc_html__( 'Top', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_responsive_control(
				'nav_left',
				[
					'label' 		=> esc_html__( 'Left', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-modern .blog-slider-modern .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();
		$category      = $settings['category'];
		$total_count   = $settings['total_count'];
		$order         = $settings['order_by'];
		$show_date     = $settings['show_date'];

		// data option for owl-carousel
		$data_options['items']              = $settings['item_number'];
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['margin']             = $settings['margin_items'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['nav']                = $settings['nav_control'] === 'yes' ? true : false;
		$data_options['rtl']				= is_rtl() ? true: false;

		$args = [];
		if ($category == 'all') {
			$args=[
				'post_type' => 'post',
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		} else {
			$args=[
				'post_type' => 'post', 
				'category_name'=>$category,
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		}

		$blog = new \WP_Query($args);

		 ?>
            
            <div class="ova-blog-slider-modern">

				<div class="blog-slider-modern owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
					<?php if($blog->have_posts()) : while($blog->have_posts()) : $blog->the_post(); ?>
						<div class="item">

							<?php if(has_post_thumbnail()){ ?>

							    <div class="media">
						        	<?php 
						        		$thumbnail = wp_get_attachment_image_url(get_post_thumbnail_id() , 'transflash_modern' );
						        	?>
						        	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						        	    <img src="<?php echo esc_url( $thumbnail ) ?>" alt="<?php the_title(); ?>">
						        	    <div class="mask"></div>
						        	</a>
						        </div>

					        <?php } ?>

		                        <div class="info">

		                        	<?php if( $show_date == 'yes' ){ ?>
										<span class="date">
											<?php echo get_the_date('j, M Y');?>
										</span>
								    <?php }?>
		 
							    	<h2 class="post-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										    <?php the_title(); ?>
										</a>
									</h2> 
								   
							    </div>
							
						</div>	
							
					<?php
						endwhile; endif; wp_reset_postdata();
					?>
			    </div>

			</div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Blog_Slider_Modern() );