<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Transflash_Elementor_Testimonial extends Widget_Base {

	public function get_name() {
		return 'transflash_elementor_testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'transflash' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'transflash' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/libs/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/libs/owl.carousel.min.js', array('jquery'), false, true );
		return [ 'transflash-elementor-testimonial' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'transflash' ),
			]
		);

			$this->add_control(
				'version',
				[
					'label' => esc_html__( 'Version', 'transflash' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'version_1',
					'options' => [
						'version_1' => esc_html__( 'Version 1', 'transflash' ),
						'version_2' => esc_html__( 'Version 2', 'transflash' ),
					]
				]
			);


			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'name_author',
					[
						'label'   => esc_html__( 'Author Name', 'transflash' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Alex', 'transflash' ),
					]
				);

				$repeater->add_control(
					'city',
					[
						'label'   => esc_html__( 'City', 'transflash' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
		                'default' => esc_html__( 'Tokyo', 'transflash' ),
					]
				);

				$repeater->add_control(
					'image_author',
					[
						'label'   => esc_html__( 'Author Image', 'transflash' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					]
				);

				$repeater->add_control(
					'icon',
					[
						'label' => __( 'Icon', 'transflash' ),
						'type' => Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-quote-left',
							'library' => 'all',
						],

					]
				);

				$repeater->add_control(
					'testimonial',
					[
						'label'   => esc_html__( 'Testimonial ', 'transflash' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( "We are proud to be the Transflash's long-term partner. They help me quickly deliver cargo to our Singapore clients, without penalties and delays", 'transflash' ),
					]
				);

				$this->add_control(
					'tab_item',
					[
						'label'       => esc_html__( 'Items Testimonial', 'transflash' ),
						'type'        => Controls_Manager::REPEATER,
						'fields'      => $repeater->get_controls(),
						'default' => [
							[
								'name_author' => esc_html__('Leslie Alexander', 'transflash'),
								'city' => esc_html__('New York', 'transflash'),
								'testimonial' => esc_html__("We are proud to be the Transflash's long-term partner. They help me quickly deliver cargo to our Singapore clients, without penalties and delays", 'transflash'),
							],
							[
								'name_author' => esc_html__('Bessie Cooper', 'transflash'),
								'city' => esc_html__('Dubai', 'transflash'),
								'testimonial' => esc_html__("We are proud to be the Transflash's long-term partner. They help me quickly deliver cargo to our Singapore clients, without penalties and delays", 'transflash'),
							],
						],
						'title_field' => '{{{ name_author }}}',
					]
				);
			

		$this->end_controls_section();

		/*****************  END SECTION CONTENT ******************/


		/*****************************************************************
						START SECTION ADDITIONAL
		******************************************************************/

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'transflash' ),
			]
		);


		/***************************  VERSION 1 ***********************/
			$this->add_control(
				'margin_items',
				[
					'label'   => esc_html__( 'Margin Right Items', 'transflash' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 0,
				]
				
			);

			$this->add_control(
				'item_number',
				[
					'label'       => esc_html__( 'Item Number', 'transflash' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'transflash' ),
					'default'     => 1,
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
				'dot_control',
				[
					'label'   => esc_html__( 'Show Dots', 'transflash' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'transflash' ),
						'no'  => esc_html__( 'No', 'transflash' ),
					],
					'frontend_available' => true,
					'condition' => [
						'version' => 'version_2'
					]
				]
			);

		$this->end_controls_section();

		/****************************  END SECTION ADDITIONAL *********************/

		/*************  SECTION NAME city. *******************/
		$this->start_controls_section(
			'section_general',
			[
				'label' => esc_html__( 'General', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			

			$this->add_control(
				'quote_color',
				[
					'label'     => esc_html__( 'Quote Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .client_info .icon-quote span:before' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .icon-quote i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'dot_active_color',
				[
					'label'     => esc_html__( 'Dot Active Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot.active span' => 'background : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .owl-dots .owl-dot.active span' => 'background : {{VALUE}};',	
					],
					'condition' => [
						'dot_control' => 'yes',
						'version'     => 'version_1'
					]
				]
			);


		$this->end_controls_section();
		###############  end section city  ###############


		/*************  SECTION content testimonial  *******************/
		$this->start_controls_section(
			'section_content_testimonial',
			[
				'label' => esc_html__( 'Content Testimonial', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .testimonial',
				]
			);

			$this->add_control(
				'content_color',
				[
					'label'     => esc_html__( 'Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .testimonial' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_margin',
				[
					'label'      => esc_html__( 'Margin', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .testimonial' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => esc_html__( 'Padding', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section content testimonial  ###############


		/*************  SECTION NAME AUTHOR. *******************/
		$this->start_controls_section(
			'section_author_name',
			[
				'label' => esc_html__( 'Author Name', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'      => 'author_name_v1_typography',
					'selector'  => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-city .name',
					'condition' => [
						'version' => 'version_1'
					]
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'      => 'author_name_v2_typography',
					'selector'  => '{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot button .name',
					'condition' => [
						'version' => 'version_2'
					]
				]
			);

			$this->add_control(
				'author_name_color',
				[
					'label'     => esc_html__( 'Color Author', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-city .name' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot button .name' => 'color : {{VALUE}};'
					],
				]
			);

			$this->add_responsive_control(
				'author_name_margin',
				[
					'label'      => esc_html__( 'Margin', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-city .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot button .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					],
				]
			);

			$this->add_responsive_control(
				'author_name_padding',
				[
					'label'      => esc_html__( 'Padding', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-city .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot button .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					],
				]
			);


		$this->end_controls_section();
		###############  end section author  ###############


		/*************  SECTION NAME city. *******************/
		$this->start_controls_section(
			'section_city',
			[
				'label' => esc_html__( 'City', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'city_v1_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-city .city',
					'condition' => [
						'version' => 'version_1'
					]
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'city_v2_typography',
					'selector'  => '{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot button .city',
					'condition' => [
						'version' => 'version_2'
					]
				]
			);

			$this->add_control(
				'city_color',
				[
					'label'     => esc_html__( 'Color City', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-city .city' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot button .city' => 'color : {{VALUE}};'
					],
				]
			);

			$this->add_responsive_control(
				'city_margin',
				[
					'label'      => esc_html__( 'Margin', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-city .city' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot button .city' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					],
				]
			);

			$this->add_responsive_control(
				'city_padding',
				[
					'label'      => esc_html__( 'Padding', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-city .city' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot button .city' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					],
				]
			);


		$this->end_controls_section();
		###############  end section city  ###############

	}

	protected function render() {

		$settings = $this->get_settings();
		$version = $settings['version'];

		$tab_item = $settings['tab_item'];
		

		$data_options['items']              = $settings['item_number'];
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['margin']             = $settings['margin_items'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];

		if ($version === 'version_2') {
           $data_options['dots']            = $settings['dot_control'] === 'yes' ? true : false;
		}
		else  $data_options['dots'] = false ;
		
		$data_options['rtl']				= is_rtl() ? true: false;

		?>

		<?php if( $version === 'version_1' ){ ?>

			<section class="ova-testimonial ">

					<div class="slide-testimonials owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
						<?php if(!empty($tab_item)) : foreach ($tab_item as $item) :?>
							<div class="item">
								<div class="client_info">

                                    <?php if( $item['icon']['value'] != '' ) : ?>
										<div class="icon-quote">
											<i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
										</div>
									<?php endif; ?>

									<?php if( $item['testimonial'] != '' ) : ?>
										<p class="testimonial">
											<?php echo esc_html($item['testimonial']) ?>
										</p>
									<?php endif; ?>

									<div class="info">

										<div class="client">
											<?php if( $item['image_author'] != '' ) { ?>
												<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','transflash' ); ?>
												<img src="<?php echo esc_attr($item['image_author']['url']) ?>" alt="<?php echo esc_attr( $alt ); ?>" >
											<?php } ?>
										</div>
										<div class="name-city">
											
											<?php if( $item['name_author'] != '' ) { ?>
												<p class="name second_font">
													<?php echo esc_html($item['name_author']) ?>
												</p>
											<?php } ?>

											<?php if( $item['city'] != '' ) { ?>
												<p class="city">
													<?php echo esc_html($item['city']) ?>
												</p>
											<?php } ?>
										</div>
									</div><!-- end info -->
									
								</div>
							</div>
						<?php endforeach; endif; ?>
					</div>

			</section>

		<?php } else{ ?>
			<section class="ova-testimonial version_2">

					<div class="slide-testimonials owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
						<?php if(!empty($tab_item)) : foreach ($tab_item as $item) : 

							$url_img = isset($item['image_author']['url']) ? $item['image_author']['url'] : '';
							$name    = isset($item['name_author']) ? $item['name_author'] : '' ;
							$city    = isset($item['city']) ? $item['city'] : '' ;
							$alt     = isset($name) && $name ? $name : esc_html__( 'testimonial','transflash' );

							$data_dot_content = "<div class='info'>" . "<p class='name'>$name</p>" . "<p class='city'>$city</p>" . "<div>";
							$data_dot         = "<button role='button' style='background-image:url($url_img)'>" .$data_dot_content. "</button>";

							?>
							<div class="item" data-dot='<?php echo esc_attr($data_dot);?>'>
								<div class="client_info">

									<?php if( $item['icon']['value'] != '' ) : ?>
										<div class="icon-quote">
											<i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
										</div>
									<?php endif; ?>

									<div class="client">

										<?php if( $item['testimonial'] != '' ) : ?>
											<p class="testimonial"><?php echo esc_html($item['testimonial']) ?></p>
										<?php endif; ?>
							
									</div>

								</div>
							</div>
						<?php endforeach; endif; ?>
					</div>

			</section>
		<?php } ?>
		
		<?php
	}
	// end render
}

$widgets_manager->register( new Transflash_Elementor_Testimonial() );

