<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Card extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_card';
	}

	
	public function get_title() {
		return esc_html__( 'Card', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-icon-box';
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
				'link_to',
				[
					'label' => esc_html__( 'Link', 'transflash' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'none' => esc_html__( 'None', 'transflash' ),
						'custom' => esc_html__( 'Custom URL', 'transflash' ),
					],
					'default' => 'custom',
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
					'condition' => [
						'link_to' => 'custom',
					],
					'show_label' => false,
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => __( 'Icon', 'transflash' ),
					'type' => Controls_Manager::ICONS,
					'default' => [
						'value' => 'flaticon flaticon-boat',
						'library' => 'flaticon',
					],

				]
			);
            
			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'row' => 5,
					'default' => esc_html__('Sea freight','transflash'),
				]
			);

			$this->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'transflash' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'Sea freight transportation is offered from home to abroad and vice versa.', 'transflash' ),
				]
			);

			$this->add_responsive_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'transflash' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'transflash' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'transflash' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'transflash' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
					'default'	=> 'left',
					'separator' => 'before'
				]
			);

		$this->end_controls_section();

		/* Begin icon Style */
		$this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__( 'Icon', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );
            
			$this->add_responsive_control(
				'size_icon',
				[
					'label' 		=> esc_html__( 'Size', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-card .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-card .icon i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'icon_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-card:hover .icon i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'icon_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-card .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End icon style */

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
					'selector' 	=> '{{WRAPPER}} .ova-card .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-card .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-card:hover .title' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-card .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' 	=> '{{WRAPPER}} .ova-card .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-card .description' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-card .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	                    '{{WRAPPER}} .ova-card .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */

		/* Begin Card Style */
		$this->start_controls_section(
            'card_style',
            [
                'label' => esc_html__( 'Ova Card', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

			$this->add_control(
				'card_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-card' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'card_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Color Hover', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-card:hover' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'card_hover_animation',
				[
					'label' => __( 'Hover Animation', 'transflash' ),
					'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
					'prefix_class' => 'elementor-animation-',
					'default' => 'float'
				]
			);

	        $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_card',
					'label' => __( 'Box Shadow', 'transflash' ),
					'selector' => '{{WRAPPER}} .ova-card',
				]
		    );

		    $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_card-hover',
					'label' => __( 'Box Shadow Hover', 'transflash' ),
					'selector' => '{{WRAPPER}} .ova-card:hover',
				]
		    );

		    $this->add_responsive_control(
	            'card_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */
	
	}

	private function get_link_url( $settings ) {

		if ( 'none' === $settings['link_to'] ) {
			return false;
		}

		if ( 'custom' === $settings['link_to'] ) {
			if ( empty( $settings['link']['url'] ) ) {
				return false;
			}

			return $settings['link'];
		}

		return false;
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$title            =    $settings['title'];
		$description      =    $settings['description'];
		$class_icon       =    $settings['icon']['value'];
		$link             =    $this->get_link_url( $settings );

		 ?>

		    <?php if(!empty( $link['url'])) : ?>
			<?php $nofollow = ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? ' rel="nofollow"' : ''; ?>
			  <a href="<?php echo esc_url( $link['url'] ); ?> " <?php echo ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? ' target="_blank"' : '' ?>  <?php echo esc_attr( $nofollow ); ?>>
		    <?php endif; ?>
 
	            <div class="ova-card">

	                <?php if (!empty( $class_icon )): ?>
		            	<div class="icon">
		            		<i class="<?php echo esc_attr( $class_icon ); ?>"></i>
		            	</div>
		            <?php endif;?>

		            <?php if (!empty( $title )): ?>
						<h4 class="title">
							<?php echo esc_html( $title ); ?>
						</h4>
					<?php endif;?>

					<?php if (!empty( $description )): ?>
						<p class="description">
							<?php echo esc_html( $description ); ?>
						</p>
					<?php endif;?>
			    </div>

		   <?php if(!empty( $link['url'])) : ?>
			 </a>
		   <?php endif; ?>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Card() );