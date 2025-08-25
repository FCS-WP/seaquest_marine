<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Contact_Card extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_contact_card';
	}

	
	public function get_title() {
		return esc_html__( 'Contact Card', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-email-field';
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
					'label' => esc_html__( 'Choose Image', 'transflash' ),
					'type' => Controls_Manager::MEDIA,
					'dynamic' => [
						'active' => true,
					],
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

		    $this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__('Do you need support?', 'transflash'),
				]
			);

			$this->add_control(
				'icon_class',
				[
					'label' => esc_html__( 'Icon', 'transflash' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'iconly iconly-Calling icbo',
						'library' 	=> 'all',
					],
				]
			);

			$this->add_control(
				'link',
				[
					'label' 		=> esc_html__( 'Link', 'transflash' ),
					'type' 			=> Controls_Manager::URL,
					'placeholder' 	=> esc_html__( 'https://your-link.com', 'transflash' ),
					'show_external' => true,
					'default' => [
						'url' => '',
					],
				]
			);

			$this->add_control(
				'text_button',
				[
					'label' => esc_html__( 'Text Button', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__('Contact us now', 'transflash'),
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background',
					'label' => esc_html__( 'Background', 'transflash' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .ova-contact-card',
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
					'selector' => '{{WRAPPER}} .ova-contact-card .content .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-card .content .title' => 'color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-contact-card .content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
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
						'{{WRAPPER}} .ova-contact-card .content .button-contact i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'color_icon',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-card .content .button-contact i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_icon_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-card .content .button-contact:hover i' => 'color : {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();

        //******text button style*****/
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Text Button', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => '_typography',
					'selector' => '{{WRAPPER}} .ova-contact-card .content .button-contact .text-button',
				]
			);

			$this->add_control(
				'color_text',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-card .content .button-contact .text-button' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_text_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-card .content .button-contact:hover .text-button' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_text',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-card .content .button-contact .text-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******button style*****/
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
						'{{WRAPPER}} .ova-contact-card .content .button-contact' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bgcolor_button_hover',
				[
					'label' => esc_html__( 'Background Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-card .content .button-contact:hover ' => 'background-color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-contact-card .content .button-contact' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_button',
				[
					'label' => esc_html__( 'Margin', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-card .content .button-contact' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

        $url 	        = $settings['image']['url'];
        if ( empty( $url ) ) {
			return;
		}
        $alt            = esc_html__('Contact Card', 'transflash' );

		$title 			= $settings['title'];
		$text_button    = $settings['text_button'];
		$icon_class 	= $settings['icon_class']['value'];
		$link 	        = $settings['link'];
		$target 		= $settings['link']['is_external'] ? ' target="_blank"' : '';

		 ?>
         
            <div class="ova-contact-card">

        		<div class="contact-card-img">
					<img src="<?php echo esc_url( $url );?>" alt="<?php echo esc_attr( $alt ); ?>">
				</div>

				<div class="content">
					<?php if ( !empty ($title)) : ?>
						<h3 class="title">
							<?php echo esc_html($title); ?>
						</h3>
					<?php endif; ?>

					<?php if ( !empty($link['url'])) : ?>	
						<a href="<?php echo esc_url( $link['url'] ); ?> "  <?php echo esc_attr( $target ); ?>>
					 <?php endif; ?>
						<div class="button-contact">

							<?php if ( !empty ($icon_class)) : ?>
				                <i class="<?php echo esc_attr($icon_class)?>"></i>
		                    <?php endif; ?>

							<?php if ( !empty ($text_button)) : ?>
								<span class="text-button">
									<?php echo esc_html($text_button); ?>	
			                    </span>
			                <?php endif; ?>
						</div>
					<?php if ( !empty($link['url']) ) : ?>
					    </a>
				    <?php endif; ?>
				</div>

            </div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Contact_Card() );