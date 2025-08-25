<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Transflash_Elementor_Portfolio extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_portfolio';
	}

	public function get_title() {
		return esc_html__( 'Portfolio', 'transflash' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'transflash' ];
	}

	public function get_script_depends() {
		wp_enqueue_style('fancybox', get_template_directory_uri().'/assets/libs/fancybox.css');
		wp_enqueue_script('fancybox', get_template_directory_uri().'/assets/libs/fancybox.js', array('jquery'),null,true);
		wp_enqueue_script('masonry', get_template_directory_uri().'/assets/libs/masonry.min.js', array('jquery'), false, true );
		
		return [ 'transflash-elementor-portfolio' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'transflash' ),
			]
		);

			$this->add_control(
				'id_portfolio',
				[
					'label' => esc_html__( 'ID', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => time(),
				]
			);	
			
			// Add Class control
			$repeater = new \Elementor\Repeater();

			$default_icon = 'fas fa-search-plus';

			$repeater->add_control(
				'class_icon',
				[
					'label' 	=> esc_html__( 'Class Icon', 'transflash' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> $default_icon,
				]
			);

			$repeater->add_control(
				'caption',
				[
					'label'   => esc_html__( 'Caption Image', 'transflash' ),
					'type'    => Controls_Manager::TEXT,
					'default' => esc_html__( 'Portfolio', 'transflash' ),
				]
			);

			$repeater->add_control(
				'image',
				[
					'label'   => esc_html__( 'Image', 'transflash' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater->add_control(
				'image_popup',
				[
					'label'   => esc_html__( 'Popup Image', 'transflash' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater->add_responsive_control(
				'image_width',
				[
					'label' 		=> esc_html__( 'Width', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ '%', 'px' ],
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 500,
							'step' 	=> 10,
						],
						'%' => [
							'min' 	=> 0,
							'max' 	=> 100,
							'step' 	=> 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-portfolio .grid {{CURRENT_ITEM}}' => 'width: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$repeater->add_responsive_control(
				'image_padding',
				[
					'label'      => esc_html__( 'Padding', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-portfolio .grid {{CURRENT_ITEM}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'tab_item',
				[
					'label'		=> esc_html__( 'Items Portfolio', 'transflash' ),
					'type'		=> Controls_Manager::REPEATER,
					'fields'  	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'class_icon' 	=> $default_icon,
						],
						[
							'class_icon' 	=> $default_icon,
						],
						[
							'class_icon' 	=> $default_icon,
						],
					],
				]
			);

			$this->add_responsive_control(
				'grid_sizer',
				[
					'label' 		=> esc_html__( 'Grid Sizer', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ '%', 'px' ],
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 500,
							'step' 	=> 10,
						],
						'%' => [
							'min' 	=> 0,
							'max' 	=> 100,
							'step' 	=> 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-portfolio .grid .grid-sizer' => 'width: {{SIZE}}{{UNIT}}',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'image_padding',
				[
					'label'      => esc_html__( 'Padding', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-portfolio .grid .grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon', 'transflash' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'icon_typography',
					'selector' => '{{WRAPPER}} .ova-portfolio .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon i',
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label'     => esc_html__( 'Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-portfolio .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon i' => 'color : {{VALUE}};',
					],
				]
			);
			
			$this->add_responsive_control(
				'icon_top',
				[
					'label' => esc_html__( 'Top', 'transflash' ),
					'type' 	=> Controls_Manager::SLIDER,
					'size_units' => [ '%', 'px' ],
					'default' => [
						'unit' => 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 500,
							'step' 	=> 1,
						],
						'%' => [
							'min' 	=> 0,
							'max' 	=> 100,
							'step' 	=> 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-portfolio .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon' => 'top: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'icon_right',
				[
					'label' => esc_html__( 'Right', 'transflash' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ '%', 'px' ],
					'default' => [
						'unit' => 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-portfolio .grid .grid-item .gallery-fancybox .gallery-container .gallery-icon' => 'right: {{SIZE}}{{UNIT}}',
					],
				]
			);

		$this->end_controls_section();
	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();

		// Get list item
		$tabs 	  = $settings['tab_item'];
		$group    = $settings['id_portfolio'];

		?>

		<?php if ( $tabs && is_array( $tabs ) ): ?>
	        <div class="ova-portfolio" data-group="<?php printf($group) ; ?>">
	        	<div class="grid">
	        		<div class="grid-sizer"></div>
	  				<?php foreach ( $tabs as $key => $items ): 
	  					$img_url 	= $items['image']['url'];
	  					$img_popup 	= $items['image_popup']['url'];
	  					$img_alt 	= isset( $items['image']['alt'] ) ? $items['image']['alt'] : esc_html__('Portfolio','transflash');
	  					$caption 	= $items['caption'];
	  					$item_id 	= 'elementor-repeater-item-' . $items['_id'];
	  					$icon 		= $items['class_icon'];

	  					if ( ! $caption ) {
	  						$caption = $img_alt;
	  					}
	  				?>
	  					<div class="grid-item <?php echo esc_attr( $item_id ); ?><?php if ( 0 == $key ) echo esc_attr(' grid-item-fisrt'); ?>">
	  						<a class="gallery-fancybox" data-src="<?php echo esc_url( $img_popup ); ?>" 
	  							data-fancybox="<?php printf($group) ; ?>" 
	  							data-caption="<?php echo esc_attr( $caption ); ?>">

	  							<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $caption ); ?>">
	  							<div class="gallery-container">
		  							<?php if ( $icon ): ?>
		  								<div class="gallery-icon">
			  								<i class="<?php echo esc_attr( $icon ); ?>"></i>
			  							</div>
		  							<?php endif; ?>
		  						</div>
	  						</a>
	  					</div>
	  				<?php endforeach; ?>
	        	</div>

			</div>
		<?php
		endif;
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Portfolio() );