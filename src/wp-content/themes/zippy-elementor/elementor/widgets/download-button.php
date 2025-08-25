<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Download_Button extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_download_button';
	}

	
	public function get_title() {
		return esc_html__( 'Download button', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-download-button';
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
				'class_icon',
				[
					'label' => esc_html__( 'Icon', 'transflash' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'iconly iconly-Download icli',
						'library' 	=> 'iconly',
					],
				]
			);

            $this->add_control(
				'text',
				[
					'label' => esc_html__( 'Text', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( "Download service brochures", 'transflash' ),
				]
			);

		$this->end_controls_section();

		//******icon style*****/
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_responsive_control(
				'icon_size',
				[
					'label' 		=> esc_html__( 'Icon Size', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-download-button i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'color_icon',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-download-button i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_icon_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-download-button:hover i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_icon',
				[
					'label' => esc_html__( 'Margin', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-download-button i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******text style*****/
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Text', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'selector' => '{{WRAPPER}} .ova-download-button a',
				]
			);

			$this->add_control(
				'color_text',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-download-button a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_text_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-download-button:hover a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_text',
				[
					'label' => esc_html__( 'Margin', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-download-button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******Button Download style*****/
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'bgcolor_button',
				[
					'label' => esc_html__( 'Background Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-download-button' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bgcolor_button_hover',
				[
					'label' => esc_html__( 'Background Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-download-button:hover' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_button',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-download-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'border_radius_button',
				[
					'label' => esc_html__( 'Border Raidus', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-download-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$text        = $settings['text'];
		$link 	     = $settings['link']['url'];
		$class_icon  = $settings['class_icon']['value'];

		 ?>
            
		 	<div class="ova-download-button">
	 			<i class="<?php echo esc_attr($class_icon);?>"></i>
		 		<a href="<?php echo esc_url( $link ); ?>" download>
		 			<?php echo esc_html( $text ) ; ?>
		 		</a>
			</div>

		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Download_Button() );