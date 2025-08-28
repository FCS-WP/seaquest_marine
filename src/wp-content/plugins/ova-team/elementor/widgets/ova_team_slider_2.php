<?php
namespace ova_team_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_team_slider_2 extends Widget_Base {

	public function get_name() {
		return 'ova_team_slider_2';
	}

	public function get_title() {
		return __( 'Our Team Slide 2', 'ova-team' );
	}

	public function get_icon() {
		return ' eicon-slideshow';
	}

	public function get_categories() {
		return [ 'team' ];
	}

	public function get_script_depends() {
		wp_enqueue_style( 'owl-carousel', OVATEAM_PLUGIN_URI.'assets/libs/owl-carousel/assets/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', OVATEAM_PLUGIN_URI.'assets/libs/owl-carousel/owl.carousel.min.js', array('jquery'), false, true );
		return [ 'script-elementor' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-team' ),
			]
		);

		$args = array(
           'taxonomy' => 'cat_team',
           'orderby' => 'name',
           'order'   => 'ASC'
       	);
	
		$categories = get_categories($args);
		$catAll = array( 'all' => 'All categories');
		$cate_array = array();
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->slug] = $cate->cat_name;
			}
		} else {
			$cate_array["No content Category found"] = 0;
		}

		$this->add_control(
			'category',
			[
				'label'   => __( 'Category', 'ova-team' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array_merge( $catAll, $cate_array )
			]
		);

		$this->add_control(
			'total_count',
			[
				'label'   => __( 'Total', 'ova-team' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8
			]
		);

		$this->add_control(
			'orderby_post',
			[
				'label' => __( 'OrderBy Post', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'ID'  => __( 'ID', 'ova-team' ),
					'ova_team_met_order_team' => __( 'Custom Order', 'ova-team' ),
				],
			]
		);

		$this->add_control(
			'show_social',
			[
				'label' => __( 'Show Social', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-team' ),
				'label_off' => __( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_name',
			[
				'label' => __( 'Show Name', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-team' ),
				'label_off' => __( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_job',
			[
				'label' => __( 'Show Job', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-team' ),
				'label_off' => __( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_email',
			[
				'label' => __( 'Show Email', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-team' ),
				'label_off' => __( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'show_phone',
			[
				'label' => __( 'Show Phone', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-team' ),
				'label_off' => __( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'show_link_to_detail',
			[
				'label' => __( 'Show Link to Detail', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-team' ),
				'label_off' => __( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => __( 'Additional Options', 'ova-team' ),
			]
		);


		/***************************  VERSION 1 ***********************/
			$this->add_control(
				'margin_items',
				[
					'label'   => __( 'Space between 2 items', 'ova-team' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 30,
				]
				
			);

			$this->add_control(
				'item_number',
				[
					'label'       => __( 'Number of Items', 'ova-team' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => __( 'Number of Items', 'ova-team' ),
					'default'     => 3,
				]
			);

	

			$this->add_control(
				'slides_to_scroll',
				[
					'label'       => __( 'Slides to Scroll', 'ova-team' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => __( 'Set how many slides are scrolled per swipe.', 'ova-team' ),
					'default'     => 1,
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label'   => __( 'Pause on Hover', 'ova-team' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => __( 'Yes', 'ova-team' ),
						'no'  => __( 'No', 'ova-team' ),
					],
					'frontend_available' => true,
				]
			);


			$this->add_control(
				'infinite',
				[
					'label'   => __( 'Infinite Loop', 'ova-team' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => __( 'Yes', 'ova-team' ),
						'no'  => __( 'No', 'ova-team' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay',
				[
					'label'   => __( 'Autoplay', 'ova-team' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => __( 'Yes', 'ova-team' ),
						'no'  => __( 'No', 'ova-team' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay_speed',
				[
					'label'     => __( 'Autoplay Speed', 'ova-team' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 3000,
					'step'      => 500,
					'condition' => [
						'autoplay' => 'yes',
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'smartspeed',
				[
					'label'   => __( 'Smart Speed', 'ova-team' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 500,
				]
			);

			$this->add_control(
				'dot_control',
				[
					'label'   => __( 'Show Dots', 'ova-team' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => __( 'Yes', 'ova-team' ),
						'no'  => __( 'No', 'ova-team' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'nav_control',
				[
					'label'   => esc_html__( 'Show Nav', 'ova-team' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'ova-team' ),
						'no'  => esc_html__( 'No', 'ova-team' ),
					],
					'frontend_available' => true,
				]
			);

		$this->end_controls_section();

		/* Begin Name Style */
		$this->start_controls_section(
            'name_style',
            [
                'label' => esc_html__( 'Name', 'ova-team' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 	=> 'name_typography',
					'selector' 	=> '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-info-content .name',	
				]
			);

			$this->add_control(
	            'name_color_normal',
	            [
	                'label' 	=> esc_html__( 'Color', 'ova-team' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-info-content .name' => 'color: {{VALUE}}',
	                ],
	            ]
	        );

			$this->add_control(
	            'name_color_hover',
	            [
	                'label' 	=> esc_html__( 'Color Hover', 'ova-team' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-info-content .name:hover' => 'color: {{VALUE}}',
	                ],
	            ]
	        );


			$this->add_responsive_control(
	            'name_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'ova-team' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-info-content .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
        /* End Name Style */

         /* Begin job Style */
		$this->start_controls_section(
            'job_section_style',
            [
                'label' => esc_html__( 'Job', 'ova-team' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 	=> 'job_typography',
					'selector' 	=> '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-info-content .job',
				]
			);

			$this->add_control(
	            'job_color_normal',
	            [
	                'label' 	=> esc_html__( 'Color', 'ova-team' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-info-content .job' => 'color: {{VALUE}}',
	                ],
	            ]
	        );

			$this->add_control(
	            'job_color_hover',
	            [
	                'label' 	=> esc_html__( 'Color Hover', 'ova-team' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-info-content .job:hover' => 'color: {{VALUE}}',
	                ],
	            ]
	        );

			$this->add_responsive_control(
	            'job_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'ova-team' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-info-content .job' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
        /* End Job Style */

        /* Begin Social Icon Style */
		$this->start_controls_section(
            'social_style',
            [
                'label' => esc_html__( 'Social', 'ova-team' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_responsive_control(
				'icon_size',
				[
					'label' 	=> esc_html__( 'Size', 'ova-team' ),
					'type' 		=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'size_units' 	=> [ 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-media .ova-social ul li a i' => 'font-size: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'icon_bg_size',
				[
					'label' 	=> esc_html__( 'Background Size', 'ova-team' ),
					'type' 		=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'size_units' 	=> [ 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-media .ova-social ul li a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_icon_style' );

				$this->start_controls_tab(
		            'tab_icon_normal',
		            [
		                'label' => esc_html__( 'Normal', 'ova-team' ),
		            ]
		        );

					$this->add_control(
			            'icon_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'ova-team' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-media .ova-social ul li a i' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

			        $this->add_control(
			            'icon_background_normal',
			            [
			                'label' 	=> esc_html__( 'Background', 'ova-team' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-media .ova-social ul li a' => 'background-color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'tab_icon_hover',
		            [
		                'label' => esc_html__( 'Hover', 'ova-team' ),
		            ]
		        );

					$this->add_control(
			            'icon_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'ova-team' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-media .ova-social ul li a:hover i' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

			        $this->add_control(
			            'icon_background_hover',
			            [
			                'label' 	=> esc_html__( 'Background', 'ova-team' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-media .ova-social ul li a:hover' => 'background-color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();
			$this->end_controls_tabs();

	        $this->add_control(
	            'icon_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'ova-team' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-media .ova-social ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'icon_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'ova-team' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .item .ova-media .ova-social ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
        /* End Social Style */

        /* Begin Nav Style */
		$this->start_controls_section(
            'nav_style',
            [
                'label' => esc_html__( 'Nav', 'ova-team' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'nav_control' => 'yes',
				]
            ]
        );

        	$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'nav_typography',
					'selector' 	=> '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-nav button i',
				]
			);

			$this->add_responsive_control(
				'nav_size',
				[
					'label' 	=> esc_html__( 'Size', 'ova-team' ),
					'type' 		=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-nav button' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'nav_top',
				[
					'label' 	=> esc_html__( 'Top Position', 'ova-team' ),
					'type' 		=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'size_units' 	=> [ 'px', '%'],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-nav button' => 'top: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_nav_style' );

				$this->start_controls_tab(
		            'tab_nav_normal',
		            [
		                'label' => esc_html__( 'Normal', 'ova-team' ),
		            ]
		        );

					$this->add_control(
			            'nav_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'ova-team' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-nav button i' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'nav_background_normal',
							'label' 	=> esc_html__( 'Background', 'ova-team' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-nav button',
						]
					);

					$this->add_control(
						'nav_opacity_normal',
						[
							'label' 		=> esc_html__( 'Opacity', 'ova-team' ),
							'type' 			=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' 	=> 0,
									'max' 	=> 1,
									'step' 	=> 0.1,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-team-slider-2 .slide-team-2  .owl-nav button' => 'opacity: {{SIZE}}',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'tab_nav_hover',
		            [
		                'label' => esc_html__( 'Hover', 'ova-team' ),
		            ]
		        );

					$this->add_control(
			            'nav_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'ova-team' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2  .owl-nav button:hover i' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'nav_background_hover',
							'label' 	=> esc_html__( 'Background', 'ova-team' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-nav button:hover',
						]
					);

					$this->add_control(
			            'nav_border_color_hover',
			            [
			                'label' 	=> esc_html__( 'Border Color Hover', 'ova-team' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-nav button:hover' => 'border-color: {{VALUE}}',
			                ],
			            ]
			        );

					$this->add_control(
						'nav_opacity_hover',
						[
							'label' 		=> esc_html__( 'Opacity', 'ova-team' ),
							'type' 			=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' 	=> 0,
									'max' 	=> 1,
									'step' 	=> 0.1,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-nav button:hover' => 'opacity: {{SIZE}}',
							],
						]
					);

				$this->end_controls_tab();
			$this->end_controls_tabs();

	        $this->add_control(
	            'nav_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'ova-team' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2  .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'nav_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'ova-team' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
        /* End Nav Style */

        /* Begin Dots Style */
		$this->start_controls_section(
            'dots_style',
            [
                'label' => esc_html__( 'Dots', 'ova-team' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'dot_control' => 'yes',
				]
            ]
        );

			$this->start_controls_tabs( 'tabs_dots_style' );
				
				$this->start_controls_tab(
		            'tab_dots_normal',
		            [
		                'label' => esc_html__( 'Normal', 'ova-team' ),
		            ]
		        );

					$this->add_responsive_control(
						'dots_width',
						[
							'label' 	=> esc_html__( 'Width', 'ova-team' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'dots_height',
						[
							'label' 	=> esc_html__( 'Height', 'ova-team' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
			            'dots_border_radius',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'ova-team' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_dots_hover',
		            [
		                'label' => esc_html__( 'Hover', 'ova-team' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'dots_bg_gradient_hover',
							'label' 	=> esc_html__( 'Background Gradient', 'ova-team' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-dots .owl-dot span:hover',
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_dots_active',
		            [
		                'label' => esc_html__( 'Active', 'ova-team' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'dots_bg_gradient_active',
							'label' 	=> esc_html__( 'Background Gradient', 'ova-team' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-dots .owl-dot.active span',
						]
					);

					$this->add_responsive_control(
						'dots_width_active',
						[
							'label' 	=> esc_html__( 'Width', 'ova-team' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-dots .owl-dot.active span' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'dots_height_active',
						[
							'label' 	=> esc_html__( 'Height', 'ova-team' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-dots .owl-dot.active span' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
			            'dots_border_radius_active',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'ova-team' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .ova-team-slider-2 .slide-team-2 .owl-dots .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

        $this->end_controls_section();
        /* End Dots Style */

	}


	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'el_elementor_ova_team', 'elementor/ova_team_slider_2_temp.php' );

		ob_start();
		ovateam_get_template( $template, $settings );
		echo ob_get_clean();
		
	}
}
