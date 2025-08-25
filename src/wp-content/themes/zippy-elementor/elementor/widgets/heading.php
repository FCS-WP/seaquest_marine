<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Heading extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_heading';
	}

	
	public function get_title() {
		return esc_html__( 'Heading', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-heading';
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
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'transflash' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Add Your Heading Text Here', 'transflash' ),
				]
			);

			$this->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'transflash' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( '', 'transflash' ),
				]
			);

			$this->add_control(
				'title_link',
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
				'html_tag',
				[
					'label' 	=> esc_html__( 'HTML Tag', 'transflash' ),
					'type' 		=> Controls_Manager::SELECT,
					'default' 	=> 'h2',
					'options' 	=> [
						'h1' 	=> esc_html__('H1', 'transflash'),
						'h2' 	=> esc_html__('H2', 'transflash'),
						'h3' 	=> esc_html__('H3', 'transflash'),
						'h4'	=> esc_html__('H4', 'transflash'),
						'h5' 	=> esc_html__('H5', 'transflash'),
						'h6' 	=> esc_html__('H6', 'transflash'),
						'p' 	=> esc_html__('p', 'transflash'),
					]
				]
			);

			$this->add_responsive_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'transflash' ),
					'type' 	=> Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'transflash' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'transflash' ),
							'icon' 	=> 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'transflash' ),
							'icon' 	=> 'eicon-text-align-right',
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'transflash' ),
							'icon' 	=> 'eicon-text-align-justify',
						],
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

		/* Begin title Style */
		$this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__( 'Title', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-heading .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-heading .title' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ova-heading .title a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-heading .title:hover' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ova-heading .title:hover a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'title_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-heading .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'title_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-heading .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End title style */

		/* Begin description Style */
		$this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__( 'Description', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'description_typography',
					'selector' 	=> '{{WRAPPER}} .ova-heading .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-heading .description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'description_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-heading .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'description_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-heading .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$title 			= $settings['title'];
		$description 	= $settings['description'];
		$title_link 	= $settings['title_link']['url'];
		$target 		= $settings['title_link']['is_external'] ? ' target="_blank"' : '';


		 ?>

		    <div class="ova-heading">
		 	   <?php echo '<'. esc_html( $settings['html_tag'] ) .' class="title">'; ?>
					<?php if ( $title_link ): ?>
						<a href="<?php echo esc_url( $title_link ); ?>"<?php echo esc_html( $target ); ?>>
							<?php echo esc_html( $title ); ?>
						</a>
					<?php else: ?>
						<?php echo esc_html( $title ); ?>
					<?php endif; ?>
				<?php echo '</'. esc_html( $settings['html_tag'] ) .'>' ?>

				<?php if (!empty( $description )): ?>
					<p class="description">
							<?php echo esc_html( $description ); ?>
					</p>
				<?php endif;?>
		    </div>

         <?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Heading() );