<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Transportation extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_transportation';
	}

	
	public function get_title() {
		return esc_html__( 'Transportation', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-image-rollover';
	}

	
	public function get_categories() {
		return [ 'transflash' ];
	}

	public function get_script_depends() {
		return [ '' ];
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
			
			$this->add_control(
				'image',
				[
					'label'   => esc_html__( 'Image', 'transflash' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'transflash' ),
					'type' => Controls_Manager::URL,
					
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'transflash' ),
				]
			);

            $this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( "Sea freight", 'transflash' ),
				]
			);

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'transflash' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( "Cargo agent for major airlines, reliable with high flight frequency, even with the overloading cargo...", 'transflash' ),
				]
			);

		$this->end_controls_section();

		//******Title style*****/
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ova-transportation .info .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation .info .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation .info .title:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_line_before_title',
				[
					'label' => esc_html__( 'Color Rectangle', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation .info .title:before' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_line_after_title',
				[
					'label' => esc_html__( 'Color Underline', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation .info .title:after' => 'background-color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-transportation .info .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' => esc_html__( 'Margin', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-transportation .info .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******Description style*****/
		$this->start_controls_section(
			'section_description_style',
			[
				'label' => esc_html__( 'Description', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
            
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'selector' => '{{WRAPPER}} .ova-transportation .content .description',
				]
			);

			$this->add_control(
				'color_description',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-transportation .content .description' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_description',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-transportation .content .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******Position style*****/
		$this->start_controls_section(
			'section_position_style',
			[
				'label' => esc_html__( 'Position', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		    $this->add_control(
				'title_heading_position',
				[
					'label' => esc_html__( 'Title', 'transflash' ),
					'type' => Controls_Manager::HEADING,
				]
			);

            $this->add_responsive_control(
				'title_position_bottom',
				[
					'label' 		=> esc_html__( 'Bottom', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%'],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-transportation .info' => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'title_position_bottom_hover',
				[
					'label' 		=> esc_html__( 'Bottom Hover', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%'],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-transportation:hover .info' => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'description_heading_position',
				[
					'label' => esc_html__( 'Description', 'transflash' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

            $this->add_responsive_control(
				'description_position_bottom',
				[
					'label' 		=> esc_html__( 'Top', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%'],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-transportation  .content' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'description_position_bottom_hover',
				[
					'label' 		=> esc_html__( 'Top Hover', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%'],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-transportation:hover .content' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		// get url image
		$url 	= $settings['image']['url'];
		if ( empty( $url ) ) {
			return;
		}

		// get 
		$title 	      = $settings['title'];
		$description  = $settings['description'];

		$alt_img = $title ? $title : esc_html__( 'Transportation', 'transflash' );

		// get link 
		$link             = $settings['link']['url'];
		$link_is_external = $settings['link']['is_external'];
		$link_target      = ( $link_is_external == 'on' ) ? 'target="_blank"' : '';

		 ?>

			<?php if( $link) { ?>
				<a href="<?php echo esc_url( $link );?>" <?php printf( $link_target ); ?>>
			<?php } ?>
	            
	             <div class="ova-transportation">

	                <div class="transportation-img">
	                	<img src="<?php echo esc_url( $url );?>" alt="<?php echo esc_attr( $alt_img ); ?>">
	                	<div class="mask"></div>
	                </div>

				    <div class="info">
				    	<?php if ( !empty ($title)) : ?>
							<h2 class="title">
								<?php echo esc_html($title); ?>
							</h2>
						<?php endif; ?>
	                </div>

	                <div class="content">
	                   <?php if ( !empty ($description)) : ?>
							<p class="description">
								<?php echo esc_html($description); ?> 
							</p>
						<?php endif; ?>
				    </div>

				</div>	

			<?php if( $link) { ?>
				</a>
			<?php } ?>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Transportation() );