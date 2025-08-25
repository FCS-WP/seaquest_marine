<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Transflash_Elementor_Video extends Widget_Base {
	
	public function get_name() {
		return 'transflash_elementor_video';
	}
	
	public function get_title() {
		return esc_html__( 'Video', 'transflash' );
	}

	public function get_icon() {
		return 'eicon-youtube';
	}
	
	public function get_categories() {
		return [ 'transflash' ];
	}

	public function get_script_depends() {
		return [ 'transflash-elementor-video' ];
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
				'icon',
				[
					'label' 	=> esc_html__( 'Icon', 'transflash' ),
					'type' 		=> Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'iconly-Arrow-Right-2 icbo',
						'library' 	=> 'iconly',
					],
				]
			);

			$this->add_control(
				'url_video',
				[
					'label' 		=> esc_html__( 'URL Video', 'transflash' ),
					'type' 			=> Controls_Manager::TEXT,
					'placeholder' 	=> esc_html__( 'Enter your URL', 'transflash' ) . ' (YouTube)',
					'default' 		=> 'https://www.youtube.com/watch?v=XHOmBV4js_E',
				]
			);

			$this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'transflash' ),
					'type' 	=> Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'video_options',
				[
					'label' 	=> esc_html__( 'Video Options', 'transflash' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'url_video!' => '',
					],
				]
			);

			$this->add_control(
				'autoplay_video',
				[
					'label' 	=> esc_html__( 'Autoplay', 'transflash' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'transflash' ),
					'label_off' => esc_html__( 'No', 'transflash' ),
					'default' 	=> 'yes',
					'condition' => [
						'url_video!' => '',
					],
				]
			);

			$this->add_control(
				'mute_video',
				[
					'label' 	=> esc_html__( 'Mute', 'transflash' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'transflash' ),
					'label_off' => esc_html__( 'No', 'transflash' ),
					'default' 	=> 'no',
					'condition' => [
						'url_video!' => '',
					],
				]
			);

			$this->add_control(
				'loop_video',
				[
					'label' 	=> esc_html__( 'Loop', 'transflash' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'transflash' ),
					'label_off' => esc_html__( 'No', 'transflash' ),
					'default' 	=> 'yes',
					'condition' => [
						'url_video!' => '',
					],
				]
			);

			$this->add_control(
				'player_controls_video',
				[
					'label' 	=> esc_html__( 'Player Controls', 'transflash' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'transflash' ),
					'label_off' => esc_html__( 'No', 'transflash' ),
					'default' 	=> 'yes',
					'condition' => [
						'url_video!' => '',
					],
				]
			);

			$this->add_control(
				'modest_branding_video',
				[
					'label' 	=> esc_html__( 'Modest Branding', 'transflash' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'transflash' ),
					'label_off' => esc_html__( 'No', 'transflash' ),
					'default' 	=> 'yes',
					'condition' => [
						'url_video!' => '',
					],
				]
			);

			$this->add_control(
				'show_info_video',
				[
					'label' 	=> esc_html__( 'Show Info', 'transflash' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'transflash' ),
					'label_off' => esc_html__( 'No', 'transflash' ),
					'default' 	=> 'no',
					'condition' => [
						'url_video!' => '',
					],
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
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
					'condition' => [
						'image[url]' => '',
					]
				]
			);

		$this->end_controls_section();

		/* Begin section video style */
		$this->start_controls_section(
			'section_video_style',
			[
				'label' => esc_html__( 'Video', 'transflash' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'video_width',
				[
					'label' 	=> esc_html__( 'Width', 'transflash' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-video .ova-video-container .video-content' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs(
				'style_video_tabs'
			);

				$this->start_controls_tab(
					'style_video_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'transflash' ),
					]
				);

					$this->add_control(
			            'video_background_normal',
			            [
			                'label' 	=> esc_html__( 'Background', 'transflash' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .ova-video-container .video-content' => 'background-color: {{VALUE}};',
			                ],
			            ]
			        );

				$this->end_controls_tab();

				$this->start_controls_tab(
					'style_video_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'transflash' ),
					]
				);

					$this->add_control(
			            'video_background_hover',
			            [
			                'label' 	=> esc_html__( 'Background', 'transflash' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .ova-video-container .video-content:hover' => 'background-color: {{VALUE}};',
			                ],
			            ]
			        );

			        $this->add_control(
						'video_border_color_hover',
						[
							'label' 	=> esc_html__( 'Border Color', 'transflash' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-video .ova-video-container .video-content:hover' => 'border-color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 		=> 'video_border',
					'label' 	=> esc_html__( 'Border', 'transflash' ),
					'selector' 	=> '{{WRAPPER}} .ova-video .ova-video-container .video-content',
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'video_border_radius',
				[
					'label' 		=> esc_html__( 'Border Radius', 'transflash' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-video .ova-video-container .video-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/* End section video style */

		/* Begin section icon style */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'transflash' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

	        $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'icon_typography',
					'selector' 	=> '{{WRAPPER}} .ova-video .ova-video-container .video-content i',
				]
			);

			$this->start_controls_tabs(
				'style_icon_tabs'
			);

				$this->start_controls_tab(
					'style_icon_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'transflash' ),
					]
				);

					$this->add_control(
			            'icon_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'transflash' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .ova-video-container .video-content i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

				$this->end_controls_tab();

				$this->start_controls_tab(
					'style_icon_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'transflash' ),
					]
				);

					$this->add_control(
			            'icon_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'transflash' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .ova-video-container .video-content:hover i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

				$this->end_controls_tab();
			$this->end_controls_tabs();

		$this->end_controls_section();
		/* End section icon style */

		/* Begin section image style */
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'transflash' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'image_width',
				[
					'label' 		=> esc_html__( 'Width', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%', 'vw' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
						'vw' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-video .ova-video-container img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'image_max_width',
				[
					'label' 		=> esc_html__( 'Max Width', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%', 'vw' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
						'vw' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-video .ova-video-container img' => 'max-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'image_height',
				[
					'label' 		=> esc_html__( 'Height', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%', 'vh' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
						'vh' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-video .ova-video-container img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/* End section Image style */
	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();

		$icon 		= $settings['icon']['value'];
		$url_video 	= $settings['url_video'];
		$image_url 	= isset( $settings['image']['url'] ) ? $settings['image']['url'] : '';
		$image_alt 	= isset( $settings['image']['alt'] ) ? $settings['image']['alt'] : '';
		$class_img 	= $image_url ? ' video-image' : '';
		$autoplay 	= $settings['autoplay_video'];
		$mute 		= $settings['mute_video'];
		$loop 		= $settings['loop_video'];
		$controls 	= $settings['player_controls_video'];
		$modest 	= $settings['modest_branding_video'];
		$show_info 	= $settings['show_info_video'];

		?>

	 	<?php if ( $url_video ): ?>
			<div class="ova-video">
				<div class="ova-video-container">
					<?php if ( $image_url ): ?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
					<?php endif; ?>
					<div class="video-content video-btn<?php echo esc_attr( $class_img ); ?>" id="ova-video" 
						 data-src="<?php echo esc_url( $url_video ); ?>" 
						 data-autoplay="<?php echo esc_html( $autoplay ); ?>" 
						 data-mute="<?php echo esc_html( $mute ); ?>" 
						 data-loop="<?php echo esc_html( $loop ); ?>" 
						 data-controls="<?php echo esc_html( $controls ); ?>" 
						 data-modest="<?php echo esc_html( $modest ); ?>" 
						 data-show_info="<?php echo esc_html( $show_info ); ?>">
						<i class="<?php echo esc_html( $icon ); ?>"></i>
					</div>
				</div>
				<div class="modal-container">
					<div class="modal">
						<i class="ovaicon-cancel"></i>
						<iframe class="modal-video" allow="autoplay"></iframe>
					</div>
				</div>
			</div>
		<?php
		endif;
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Video() );