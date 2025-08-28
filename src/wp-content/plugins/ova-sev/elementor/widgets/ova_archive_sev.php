<?php
namespace ova_sev_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_archive_sev extends Widget_Base {


	public function get_name() {
		return 'ova_archive_sev';
	}

	public function get_title() {
		return esc_html__( 'Service Archive', 'ova-sev' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'service' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__('Content', 'ova-sev' ),
			]
		);

		$args = array(
			'taxonomy' => 'cat_sev',
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
			$cate_array[] = esc_html__( "No content Category found", "ova-sev" );
		}

		$this->add_control(
			'category',
			[
				'label'   => esc_html__('Category', 'ova-sev' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array_merge( $catAll, $cate_array )
			]
		);

		$this->add_control(
			'total_count',
			[
				'label'   => esc_html__('Total', 'ova-sev' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 9
			]
		);

		$this->add_control(
			'number_column',
			[
				'label' => esc_html__('Number Of Columns', 'ova-sev' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'two_column',
				'options' => [
					'two_column'      => esc_html__('2 Columns', 'ova-sev' ),
					'three_column' => esc_html__('3 Columns', 'ova-sev' ),
					'four_column'      => esc_html__('4 Columns', 'ova-sev' ),
				],
			]
		);

		$this->add_control(
			'orderby_post',
			[
				'label' => esc_html__('OrderBy Post', 'ova-sev' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'ID'  => esc_html__('ID', 'ova-sev' ),
					'ova_sev_met_order_sev' => esc_html__('Custom Order', 'ova-sev' ),
				],
			]
		);


		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'ova-sev' ),
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

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .archive_sev .info .name',
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => esc_html__('Color ', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_sev .info .name' => 'color : {{VALUE}};',
					'{{WRAPPER}} .archive_sev .info .name a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_title_hover',
			[
				'label' => esc_html__('Color Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_sev .info .name:hover' => 'color : {{VALUE}};',
					'{{WRAPPER}} .archive_sev .info .name a:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_triangle',
			[
				'label' => esc_html__( 'Color Triangle', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive_sev .info .name:before' => ' background: linear-gradient(to top left, transparent 0%, transparent 50%, {{VALUE}} 50%, {{VALUE}} 100%) ;',
				],
			]
		);

		$this->add_responsive_control(
			'padding_title',
			[
				'label' => esc_html__('Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .archive_sev .info .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_title',
			[
				'label' => esc_html__('Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .archive_sev .info .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		//******Icon style*****/

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'ova-sev' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'color_icon',
				[
					'label' => esc_html__( 'Color', 'ova-sev' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .archive_sev .item-service .service-icon i' => 'color : {{VALUE}};',
					],
				]
		    );
            
			$this->add_control(
				'color_icon_hover',
				[
					'label' => esc_html__( 'Color Hover', 'ova-sev' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .archive_sev .item-service .service-icon:hover i' => 'color : {{VALUE}};',
					],
				]
			);    

			$this->add_responsive_control(
				'size_icon',
				[
					'label' => esc_html__( 'Size', 'ova-sev' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 10,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .archive_sev .item-service .service-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'bgc_icon_heading',
				[
					'label' => esc_html__( 'Background', 'ova-sev' ),
					'type' => Controls_Manager::HEADING,
				]
		    );

			    $this->add_control(
					'bgcolor_icon',
					[
						'label' => esc_html__( 'Color', 'ova-sev' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .archive_sev .item-service .service-icon ' => 'background-color : {{VALUE}};',
						],
					]
			    );

				$this->add_control(
					'bgcolor_icon_hover',
					[
						'label' => esc_html__( 'Color Hover', 'ova-sev' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .archive_sev .item-service .service-icon:hover ' => 'background-color : {{VALUE}};',
						],
					]
			    );

				$this->add_responsive_control(
					'bgsize_width_icon',
					[
						'label' => esc_html__( 'Width', 'ova-sev' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 10,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .archive_sev .item-service .service-icon' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_responsive_control(
					'bgsize_heigth_icon',
					[
						'label' => esc_html__( 'Height', 'ova-sev' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 10,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .archive_sev .item-service .service-icon' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);

			$this->add_responsive_control(
				'icon_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'ova-sev' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .archive_sev .item-service .service-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'el_elementor_ova_sev', 'elementor/ova_archive_sev.php' );

		ob_start();
		ovasev_get_template( $template, $settings );
		echo ob_get_clean();
		
	}
}
