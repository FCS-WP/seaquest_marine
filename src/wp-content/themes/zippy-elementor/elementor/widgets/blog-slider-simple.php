<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Blog_Slider_Simple extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_blog_slider_simple';
	}

	
	public function get_title() {
		return esc_html__( 'Blog Slider Simple', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-post-slider';
	}

	
	public function get_categories() {
		return [ 'transflash' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/libs/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/libs/owl.carousel.min.js', array('jquery'), false, true );
		return [ 'transflash-elementor-blog-slider-simple' ];
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
					'default' => 'desc',
					'options' => [
						'asc' => esc_html__('Ascending', 'transflash'),
						'desc' => esc_html__('Descending', 'transflash'),
					]
				]
			);

			$this->add_control(
				'text_button',
				[
					'label' => esc_html__( 'Text Button', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__('Read More', 'transflash'),
					'condition' => [
					],
				]
			);

			$this->add_control(
				'content_limit',
				[
					'label'   		=> esc_html__( 'Content Limit', 'transflash' ),
					'type'    		=> Controls_Manager::NUMBER,
					'min'     		=> -1,
					'default' 		=> 20,
					'description' 	=> esc_html__( 'Limit characters to display "Content Post", If "Excerpt" is empty.', 'transflash' ),
				]
			);

			$this->add_control(
				'show_meta',
				[
					'label' => esc_html__( 'Show Meta', 'transflash' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'transflash' ),
					'label_off' => esc_html__( 'Hide', 'transflash' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_readmore',
				[
					'label' => esc_html__( 'Show Read More', 'transflash' ),
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
					'default'     => 3,
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
					'selector' => '{{WRAPPER}} .ova-blog-slider-simple .post-title a',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .post-title a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .post-title a:hover' => 'color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-blog-slider-simple .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE


		$this->start_controls_section(
			'section_meta',
			[
				'label' => esc_html__( 'Meta', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_meta' => 'yes'
				]
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'meta_typography',
					'selector' => '{{WRAPPER}} .ova-blog-slider-simple .item .post-meta .item-meta .right, {{WRAPPER}} .ova-blog-slider-simple .item .post-meta .item-meta .right a',
				]
			);

			$this->add_control(
				'text_color_meta',
				[
					'label' => esc_html__( 'Text Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .post-meta .item-meta .right' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'link_color_meta',
				[
					'label' => esc_html__( 'Link Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .post-meta .item-meta .right a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'link_color_meta_hover',
				[
					'label' => esc_html__( 'Link Color hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .post-meta .item-meta .right a:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'icon_color_meta',
				[
					'label' => esc_html__( 'Icon Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .post-meta .item-meta .left i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_meta',
				[
					'label' => esc_html__( 'Margin', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .post-meta .item-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		// Content (Excerpt) tab style
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'content_typography',
					'selector' => '{{WRAPPER}} .ova-blog-slider-simple .item .info .excerpt',
				]
			);

			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .info .excerpt' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .info .excerpt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); // END content Tab

		//SECTION TAB STYLE READMORE
		$this->start_controls_section(
			'section_readmore',
			[
				'label' => esc_html__( 'Read More', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_readmore' => 'yes'
				]
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'readmore_typography',
					'selector' => '{{WRAPPER}} .ova-blog-slider-simple .item .read-more',
				]
			);

			$this->add_control(
				'color_readmore',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .read-more' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_readmore_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .read-more:hover' => 'color : {{VALUE}};',
					],
				]
			);

	        $this->add_responsive_control(
				'padding_readmore',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .item .read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE READMORE

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
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav .owl-prev' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav .owl-next' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_color_hover',
				[
					'label'     => esc_html__( 'Color Hover', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav .owl-prev:hover' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav .owl-next:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_bgcolor',
				[
					'label'     => esc_html__( 'Background Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav .owl-prev' => 'background-color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav .owl-next' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_bgcolor_hover',
				[
					'label'     => esc_html__( 'Background Color Hover', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav .owl-prev:hover' => 'background-color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav .owl-next:hover' => 'background-color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_responsive_control(
				'nav_right',
				[
					'label' 		=> esc_html__( 'Rigth', 'transflash' ),
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
						'{{WRAPPER}} .ova-blog-slider-simple .blog-slider-simple .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
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
		$text_button   = $settings['text_button'];
		$content_limit = $settings['content_limit'];
		$show_meta     = $settings['show_meta'];
		$show_readmore = $settings['show_readmore'];

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
             
             <div class="ova-blog-slider-simple">

				<div class="blog-slider-simple owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
					<?php
						if($blog->have_posts()) : while($blog->have_posts()) : $blog->the_post();

							$excerpt 	= transflash_custom_text( get_the_excerpt(), $content_limit ) ;
							if ( ! has_excerpt() ) {
								$excerpt = wp_trim_words( get_the_content(), $content_limit, '' );
							}
                            // get first category from post
							$first_category  = wp_get_post_terms( get_the_ID(), 'category' )[0]->name;
						    $category_id     = get_cat_ID($first_category);
						    $category_link   = get_category_link( $category_id );

					?>
						<div class="item">

							<?php if(has_post_thumbnail()){ ?>

							    <div class="media">
						        	<?php 
						        		$thumbnail = wp_get_attachment_image_url(get_post_thumbnail_id() , 'transflash_square' );
						        	?>
						        	<img src="<?php echo esc_url( $thumbnail ) ?>" alt="<?php the_title(); ?>">
						        </div>

					        <?php } ?>

		                        <div class="info">
		                        	<?php if( $show_meta == 'yes' ){ ?>
										<ul class="post-meta">

										    <li class="item-meta category">
												<span class="left icon-category">
													<i class="iconly iconly-Folder icli"></i>
										        </span>
												<span class="right">
													<a href="<?php echo esc_url($category_link); ?>">
														<?php echo esc_html($first_category); ?>
													</a>
												</span>
											</li>
											
											<li class="item-meta post-date">
												<span class="left icon-date">
													<i class="iconly iconly-Time-Circle icli"></i>
												</span>
												<span class="right date">
													<?php echo get_the_date('j, M Y');?>
												</span>
											</li>
											
										</ul>
								    <?php }?>
								
									<h2 class="post-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										    <?php the_title(); ?>
										</a>
									</h2>   

                                    <p class="excerpt">
                                    	<?php echo esc_html( $excerpt ); ?>
                                    </p>

									<?php if( $show_readmore == 'yes' ){ ?>
										<a class="read-more" href="<?php the_permalink(); ?>">
											<span>
												<?php  echo esc_html( $text_button ); ?>	
											</span>
											<i class="ovaicon-next-4"></i>
										</a>
									<?php } ?>
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
$widgets_manager->register( new Transflash_Elementor_Blog_Slider_Simple() );