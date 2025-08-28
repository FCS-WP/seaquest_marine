<?php
namespace ova_career_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_archive_career extends Widget_Base {


	public function get_name() {
		return 'ova_archive_career';
	}

	public function get_title() {
		return esc_html__( 'Career Archive', 'ova-career' );
	}

	public function get_icon() {
		return 'eicon-text-field';
	}

	public function get_categories() {
		return [ 'career' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__('Content', 'ova-career' ),
			]
		);

		$args = array(
			'taxonomy' => 'cat_career',
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
			$cate_array[] = esc_html__( "No content Category found", "ova-career" );
		}

		$this->add_control(
			'category',
			[
				'label'   => esc_html__('Category', 'ova-career' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array_merge( $catAll, $cate_array )
			]
		);

		$this->add_control(
			'total_count',
			[
				'label'   => esc_html__('Total', 'ova-career' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5
			]
		);

		$this->add_control(
			'orderby_post',
			[
				'label' => esc_html__('OrderBy Post', 'ova-career' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'ID'  => esc_html__('ID', 'ova-career' ),
					'ova_career_met_order_career' => esc_html__('Custom Order', 'ova-career' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle',
			[
				'label' => esc_html__( 'Toggle', 'ova-career' ),
			]
		);

			$this->add_control(
				'selected_icon',
				[
					'label' => esc_html__( 'Icon', 'ova-career' ),
					'type' => Controls_Manager::ICONS,
					'separator' => 'before',
					'default' => [
						'value' => 'ovaicon ovaicon-plus-1',
						'library' => 'ovaicon',
					],
					'recommended' => [
						'fa-solid' => [
							'fas fa-plus',
							'chevron-down',
							'angle-down',
							'angle-double-down',
							'caret-down',
							'caret-square-down',
						],
						'fa-regular' => [
							'caret-square-down',
						],
					],
					'skin' => 'inline',
					'label_block' => false,
				]
			);

			$this->add_control(
				'selected_active_icon',
				[
					'label' => esc_html__( 'Active Icon', 'ova-career' ),
					'type' => Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-minus',
						'library' => 'fa-solid',
					],
					'recommended' => [
						'fa-solid' => [
							'fas fa-minus',
							'chevron-up',
							'angle-up',
							'angle-double-up',
							'caret-up',
							'caret-square-up',
						],
						'fa-regular' => [
							'caret-square-up',
						],
					],
					'skin' => 'inline',
					'label_block' => false,
					'condition' => [
						'selected_icon[value]!' => '',
					],
				]
			);

			$this->add_control(
				'text_button',
				[
					'label'   => esc_html__('Text Button', 'ova-career' ),
					'type'    => Controls_Manager::TEXT,
					'default' => 'Join our team'
				]
			);

			$this->add_control(
				'icon_button',
				[
					'label' => esc_html__( 'Icon Button', 'ova-career' ),
					'type' => Controls_Manager::ICONS,
					'default' => [
						'value' => 'ovaicon ovaicon-next-4',
						'library' => 'ovaicon',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_position',
			[
				'label' => esc_html__('Position', 'ova-career' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'position_typography',
				'selector' => '{{WRAPPER}} .ova_archive_career .position a',
			]
		);

		$this->add_control(
			'color_position',
			[
				'label' => esc_html__('Color ', 'ova-career' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_archive_career .position a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_position_hover',
			[
				'label' => esc_html__('Color hover', 'ova-career' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_archive_career .position a:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_position',
			[
				'label' => esc_html__('Padding', 'ova-career' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_archive_career .position a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_position_text',
			[
				'label' => esc_html__('Text', 'ova-career' ),
				'type' => Controls_Manager::HEADING,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'position_text_typography',
					'selector' => '{{WRAPPER}} .ova_archive_career .position .text-heading',
				]
			);

			$this->add_control(
				'color_position_text',
				[
					'label' => esc_html__('Color', 'ova-career' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_archive_career .position .text-heading' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_position_text_circle',
				[
					'label' => esc_html__('Color Circle', 'ova-career' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_archive_career .position .text-heading:before' => 'background-color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_info',
			[
				'label' => esc_html__('Info', 'ova-career' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_info_text',
			[
				'label' => esc_html__('Text', 'ova-career' ),
				'type' => Controls_Manager::HEADING,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'info_text_typography',
					'selector' => '{{WRAPPER}} .ova_archive_career .info .text',
				]
			);

			$this->add_control(
				'color_info_text',
				[
					'label' => esc_html__('Color ', 'ova-career' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_archive_career .info .text' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'heading_info_content',
				[
					'label' => esc_html__('Content', 'ova-career' ),
					'type' => Controls_Manager::HEADING,
				]
			);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'info_content_typography',
						'selector' => '{{WRAPPER}} .ova_archive_career .info .content',
					]
				);

				$this->add_control(
					'color_info_content',
					[
						'label' => esc_html__('Color ', 'ova-career' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova_archive_career .info .content' => 'color : {{VALUE}};',
						],
					]
				);

			$this->add_responsive_control(
				'padding_info',
				[
					'label' => esc_html__('Padding', 'ova-career' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova_archive_career .info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style',
			[
				'label' => esc_html__('Toggle', 'ova-career' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_toggle_text',
			[
				'label' => esc_html__('Text', 'ova-career' ),
				'type' => Controls_Manager::HEADING,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'seemore_text_typography',
					'selector' => '{{WRAPPER}} .toggle .text',
				]
			);

			$this->add_control(
				'color_toggle_text',
				[
					'label' => esc_html__('Color ', 'ova-career' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .toggle .text' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'heading_toggle_content',
				[
					'label' => esc_html__('Content', 'ova-career' ),
					'type' => Controls_Manager::HEADING,
				]
			);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'toggle_content_typography',
						'selector' => '{{WRAPPER}} .ova_archive_career .content .item-career .toggle .toggle-item ul li',
					]
				);

				$this->add_control(
					'color_toggle_content',
					[
						'label' => esc_html__('Color ', 'ova-career' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova_archive_career .content .item-career .toggle .toggle-item ul li' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'color_toggle_content_circle',
					[
						'label' => esc_html__('Color Circle', 'ova-career' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova_archive_career .content .item-career .toggle .toggle-item ul li::marker' => 'color : {{VALUE}};',
						],
					]
				);

			$this->add_control(
				'heading_toggle_icon_seemore',
				[
					'label' => esc_html__('Icon', 'ova-career' ),
					'type' => Controls_Manager::HEADING,
				]
			);

				$this->start_controls_tabs( 'Style Seemore Icon' );

				$this->start_controls_tab(
					'seemore_icon_normal',
					[
						'label' => esc_html__( 'Normal', 'ova-career' ),
					]
				);
					$this->add_control(
						'color_seemore_icon',
						[
							'label' => esc_html__( 'Color', 'ova-career' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_archive_career .content .item-career .toggle .top .seemore i' => 'color : {{VALUE}};',
							],
						]
					);
                    $this->add_control(
						'background_seemore_color_icon',
						[
							'label' => esc_html__( 'Background Color', 'ova-career' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_archive_career .content .item-career .toggle .top .seemore i' => 'background-color : {{VALUE}};',
							],
							
						]
					);
				$this->end_controls_tab();

				$this->start_controls_tab(
					'seemore_icon_hover',
					[
						'label' => esc_html__( 'Hover', 'ova-career' ),
					]
				);
					$this->add_control(
						'color_seemore_icon_hover',
						[
							'label' => esc_html__( 'Color', 'ova-career' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_archive_career .content .item-career .toggle .top .seemore i:hover' => 'color : {{VALUE}};',
							],
						]
					);
					$this->add_control(
						'bg_seemore_icons_hover',
						[
							'label' => esc_html__( 'Background Color', 'ova-career' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .ova_archive_career .content .item-career .toggle .top .seemore i:hover' => 'background-color : {{VALUE}};',
							],
						]
					);

                $this->end_controls_tab();

			    $this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__('Button', 'ova-career' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'text_button_typography',
					'selector' => '{{WRAPPER}} .ova_archive_career .toggle .join-team .text-button',
				]
			);

			$this->start_controls_tabs( 'Style Button' );

				$this->start_controls_tab(
					'button_normal',
					[
						'label' => esc_html__( 'Normal', 'ova-career' ),
					]
				);

					$this->add_control(
						'color_button',
						[
							'label' => esc_html__('Color', 'ova-career' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_archive_career .toggle .join-team' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'bgcolor_button',
						[
							'label' => esc_html__('Background Color ', 'ova-career' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_archive_career .toggle .join-team' => 'background-color : {{VALUE}};',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'button_hover',
					[
						'label' => esc_html__( 'Hover', 'ova-career' ),
					]
				);

				    $this->add_control(
						'color_button_hover',
						[
							'label' => esc_html__('Color', 'ova-career' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_archive_career .toggle .join-team:hover' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'bgcolor_button_hover',
						[
							'label' => esc_html__('Background Color ', 'ova-career' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_archive_career .toggle .join-team:hover' => 'background-color : {{VALUE}};',
							],
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_responsive_control(
				'padding_button',
				[
					'label' => esc_html__('Padding', 'ova-career' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova_archive_career .toggle .join-team' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'el_elementor_ova_career', 'elementor/ova_archive_career.php' );

		ob_start();
		ovacareer_get_template( $template, $settings );
		echo ob_get_clean();
		
	}
}
