<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Transportation_Slider extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_transportation_slider';
	}

	
	public function get_title() {
		return esc_html__( 'Transportation Slider', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-slides';
	}

	
	public function get_categories() {
		return [ 'transflash' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/libs/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/libs/owl.carousel.min.js', array('jquery'), false, true );
		return [ 'transflash-elementor-transportation-slider' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'transflash' ),
			]
		);	
			
			// Add Class control
			
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'image',
				[
					'label'   => esc_html__( 'Choose Image', 'transflash' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'transflash' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'transflash' ),
					'show_label' => true,
					'default' => [
						'url' => '',
					],
				]
			);

			 $repeater->add_control(
				'service',
				[
					'label' => esc_html__( 'Service', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Rail freight', 'transflash' ),
				]
			);

            $repeater->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'transflash' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Secure rail freight transportation service.', 'transflash' ),
				]
			);

			$this->add_control(
				'tab_item',
				[
					'label'		=> esc_html__( 'Tabs', 'transflash' ),
					'type'		=> Controls_Manager::REPEATER,
					'fields'  	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'title'           => esc_html__('Secure rail freight transportation service.', 'transflash'),
							'service'     => esc_html__('Rail freight', 'transflash'),
						],
						[
							'title'           => esc_html__('Sea freight transportation service.', 'transflash'),
							'service'     => esc_html__('Sea freight', 'transflash'),
						],
					],
					'title_field' => '{{{ title }}}',
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
					'frontend_available' => false,
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
				'navText_control',
				[
					'label'   => esc_html__( 'Show navText', 'transflash' ),
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

		/****************************  SECTION STYLE ******************************/
         //******title style*****/
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'title_typography',
					'selector' => '{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-item .item .info .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label'     => esc_html__( 'Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-item .item  .info .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label'     => esc_html__( 'Color Hover', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-item .item  .info .title:hover' => 'color : {{VALUE}};',
					],
				]
			);
            
			$this->add_responsive_control(
				'title_margin',
				[
					'label'      => esc_html__( 'Margin', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-item .item  .info .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

        //******service style*****/
		$this->start_controls_section(
			'section_service',
			[
				'label' => esc_html__( 'Service', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'service_typography',
					'selector' => '{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-item .item  .info .service',
				]
			);

			$this->add_control(
				'service_color',
				[
					'label'     => esc_html__( 'Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-item .item .info .service' => 'color : {{VALUE}};',
					],
				]
			);

            $this->add_responsive_control(
				'service_padding',
				[
					'label'      => esc_html__( 'Padding', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-item .item .info .service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			]
		);

			$this->add_control(
				'nav_color',
				[
					'label'     => esc_html__( 'Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-nav .owl-prev' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-nav .owl-next' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_color_hover',
				[
					'label'     => esc_html__( 'Color Hover', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-nav .owl-prev:hover' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-nav .owl-next:hover' => 'color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-transportation-slider .transportation-slider .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$tab_item = $settings['tab_item'];

		$data_options['items']              = $settings['item_number'];
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['margin']             = $settings['margin_items'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['nav']                = $settings['navText_control'] === 'yes' ? true : false;
		$data_options['rtl']				= is_rtl() ? true: false;

		 ?>

            <div class="ova-transportation-slider">

				<div class="transportation-slider owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
					<?php if(!empty($tab_item)) : foreach ($tab_item as $items) : 
					
						$img_url 	 = $items['image']['url'];
						$img_alt 	 = isset( $items['image']['alt'] ) ? $items['image']['alt'] : $items['title'];
						$title       = $items['title'];
						$service     = $items['service'];
						$link        = $items['link'];
						$nofollow    = ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? ' rel="nofollow"' : '';
						$target      = ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? ' target="_blank"' : '';
						?>

	                        <?php if ( !empty($link['url'])) : ?>	
							<a href="<?php echo esc_url( $link['url'] ); ?> "  <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
						    <?php endif; ?>

								<div class="item">
									<div class="transportation-slider-img">
										<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
										<div class="mask"></div>
									</div>

									<div class="info">

										<?php if ( !empty ($service)) : ?>
											<p  class="service">
												<?php echo esc_html($service) ; ?>
											</p>
										<?php endif; ?>

										<?php if ( !empty ($title)) : ?>
											<h3 class="title">
												<?php echo esc_html($title); ?>
											</h3>
										<?php endif; ?>

									</div>
								</div>
								
							<?php if ( !empty($link['url']) ) : ?>
						        </a>
					        <?php endif; ?>

					<?php endforeach; endif; ?>

				</div>

			</div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Transportation_Slider() );