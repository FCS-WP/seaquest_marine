<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Gallery_Slider extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_gallery_slider';
	}

	
	public function get_title() {
		return esc_html__( 'Gallery Slider', 'transflash' );
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
		return [ 'transflash-elementor-gallery-slider' ];
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
				'list_title_item',
				[
					'label' => esc_html__( 'List Title Item', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Gallery Image', 'transflash' ),
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
							'list_title_item'  => esc_html__('Gallery Image', 'transflash'),
						],
						[
							'list_title_item'  => esc_html__('Gallery Image', 'transflash'),
						],
					],
					'title_field' => '{{{ list_title_item }}}',
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
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav .owl-prev' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav .owl-next' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_color_hover',
				[
					'label'     => esc_html__( 'Color Hover', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav .owl-prev:hover' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav .owl-next:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_bgcolor',
				[
					'label'     => esc_html__( 'Background Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav .owl-prev' => 'background-color : {{VALUE}};',
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav .owl-next' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_bgcolor_hover',
				[
					'label'     => esc_html__( 'Background Color Hover', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav .owl-prev:hover' => 'background-color : {{VALUE}};',
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav .owl-next:hover' => 'background-color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-gallery-slider .gallery-slider .owl-nav' => 'left: {{SIZE}}{{UNIT}};',
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

		 	<div class="ova-gallery-slider">

				<div class="gallery-slider owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
					<?php if(!empty($tab_item)) : foreach ($tab_item as $items) : 
					
						$img_url 	 = $items['image']['url'];
						$img_alt 	 = isset( $items['image']['alt'] ) ? $items['image']['alt'] : esc_html__('Gallery slider','transflash');
						?>

							<div class="item">
								<div class="gallery-slider-img">
									<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
									<div class="mask"></div>
								</div>
							</div>

					<?php endforeach; endif; ?>

				</div>

			</div>

		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Gallery_Slider() );