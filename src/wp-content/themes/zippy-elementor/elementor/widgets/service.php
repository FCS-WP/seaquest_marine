<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography; 
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Service extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_service';
	}

	
	public function get_title() {
		return esc_html__( 'Service', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-image-bold';
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
				'template',
				[
					'label' => esc_html__( 'Template', 'transflash' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'template1',
					'options' => [
						'template1' => esc_html__('Template 1', 'transflash'),
						'template2' => esc_html__('Template 2', 'transflash'),
					]
				]
			);

		    
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
					'default' => esc_html__( "Warehousing", 'transflash' ),
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'transflash' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'ovaicon ovaicon-plus',
						'library' 	=> 'ovaicon',
					],
					'skin' => 'inline',
					'label_block' => false,
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
					'selector' => '{{WRAPPER}} .ova-service .info .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .info .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .info .title:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_triangle_template1',
				[
					'label' => esc_html__( 'Color Triangle', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .info .title:before' => ' background: linear-gradient(to bottom left, transparent 0%, transparent 50%, {{VALUE}} 50%, {{VALUE}} 100%) ;',
					],
					'condition' => [
						'template' => 'template1'
					]
				]
			);

			$this->add_control(
				'color_triangle_template2',
				[
					'label' => esc_html__( 'Color Triangle', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .info .title:before' => ' background: linear-gradient(to top left, transparent 0%, transparent 50%, {{VALUE}} 50%, {{VALUE}} 100%) ;',
					],
					'condition' => [
						'template' => 'template2'
					]
				]
			);

			$this->add_control(
				'color_underline',
				[
					'label' => esc_html__( 'Color Underline', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .info .title:after' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'title_position_left',
				[
					'label' 		=> esc_html__( 'Left', 'transflash' ),
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
						'{{WRAPPER}} .ova-service .info' => 'left: {{SIZE}}{{UNIT}};',
					],
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
						'{{WRAPPER}} .ova-service .info' => 'bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-service .info .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-service .info .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

         //******Icon style*****/

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'color_icon',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .service-icon i' => 'color : {{VALUE}};',
					],
				]
		    );
            
			$this->add_control(
				'color_icon_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .service-icon:hover i' => 'color : {{VALUE}};',
					],
				]
			);    

			$this->add_responsive_control(
				'size_icon',
				[
					'label' => esc_html__( 'Size', 'transflash' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 10,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service .service-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'bgc_icon_heading',
				[
					'label' => esc_html__( 'Background', 'transflash' ),
					'type' => Controls_Manager::HEADING,
				]
		    );

			    $this->add_control(
					'bgcolor_icon',
					[
						'label' => esc_html__( 'Color', 'transflash' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-service .service-icon ' => 'background-color : {{VALUE}};',
						],
					]
			    );

				$this->add_control(
					'bgcolor_icon_hover',
					[
						'label' => esc_html__( 'Color Hover', 'transflash' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-service .service-icon:hover ' => 'background-color : {{VALUE}};',
						],
					]
			    );

				$this->add_responsive_control(
					'bgsize_width_icon',
					[
						'label' => esc_html__( 'Width', 'transflash' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 10,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ova-service .service-icon' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_responsive_control(
					'bgsize_heigth_icon',
					[
						'label' => esc_html__( 'Height', 'transflash' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 10,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ova-service .service-icon' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);

			$this->add_responsive_control(
				'icon_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-service .service-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();

         //******Overlay Image (mask) style*****/
		$this->start_controls_section(
			'section_overlay_style',
			[
				'label' => esc_html__( 'Overlay Image', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
				'background_overlay',
				[
					'label' => esc_html__( 'Background', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .service-img .mask' => 'background-color : {{VALUE}};',
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
		$template     = $settings['template'];
		$title 	      = $settings['title'];
		$icon 	      = $settings['icon']['value'];

		$alt_img = $title ? $title : esc_html__( 'Service', 'transflash' );

		// get link 
		$link             = $settings['link']['url'];
		$link_is_external = $settings['link']['is_external'];
		$link_target      = ( $link_is_external == 'on' ) ? 'target="_blank"' : '';

		 ?>
             
            <?php if( $link) { ?>
				<a href="<?php echo esc_url( $link );?>" <?php printf( $link_target ); ?>>
			<?php } ?>
	            
	             <div class="ova-service ova-service-<?php echo esc_attr($template) ;?>">

	                <div class="service-img">
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

	                <?php if( !empty ($icon) ) : ?>
	                	<div class="service-icon">
	                    	<i class="<?php echo esc_attr($icon); ?>"></i>
	                    </div>
	                <?php endif; ?>

				</div>	

			<?php if( $link) { ?>
				</a>
			<?php } ?>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Service() );