<?php
namespace ova_team_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_team_3 extends Widget_Base {

	public function get_name() {
		return 'ova_team_3';
	}

	public function get_title() {
		return __( 'Our Team 3', 'ova-team' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	public function get_categories() {
		return [ 'team' ];
	}

	public function get_script_depends() {
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
			'number_column',
			[
				'label' => __( 'Number Of Column', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'four_column',
				'options' => [
					'two_column'      => __( '2 Columns', 'ova-team' ),
					'three_column' => __( '3 Columns', 'ova-team' ),
					'four_column'      => __( '4 Columns', 'ova-team' ),
				],
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
					'title'  => __( 'Title', 'ova-team' ),
					'ova_team_met_order_team' => __( 'Custom Order', 'ova-team' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC'  => __( 'Ascending', 'ova-team' ),
					'DESC'  => __( 'Descending', 'ova-team' ),
				],
			]
		);

		$this->add_control(
			'show_img',
			[
				'label' => __( 'Show Image', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ova-team' ),
				'label_off' => __( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
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

		// Info Tab Style
		$this->start_controls_section(
			'section_style_info',
			[
				'label' => esc_html__( 'Info', 'ova-team' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'Style Info' );

		$this->start_controls_tab(
			'info_normal',
			[
				'label' => esc_html__( 'Normal', 'ova-team' ),
			]
		);

			
			$this->add_control(
				'color_name',
				[
					'label' => esc_html__( 'Color Name', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team-3 .content .item-team .info .name, {{WRAPPER}} .ova-team-3 .content .item-team .info .name a' => 'color : {{VALUE}};'
					],
				]
			);

			$this->add_control(
				'color_job',
				[
					'label' => esc_html__( 'Color Job', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team-3 .content .item-team .info .job' => 'color : {{VALUE}};',
					],
				]
			);
			
		$this->end_controls_tab();

		$this->start_controls_tab(
			'info_hover',
			[
				'label' => esc_html__( 'Hover', 'ova-team' ),
			]
		);
				
			
			$this->add_control(
				'color_name_hover',
				[
					'label' => esc_html__( 'Color Name', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team-3 .content .item-team .info .name:hover, {{WRAPPER}} .ova-team-3 .content .item-team .info .name a:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_job_hover',
				[
					'label' => esc_html__( 'Color Job', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team-3 .content .item-team .info .job:hover' => 'color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();

	    $this->end_controls_tabs();
		    
		$this->end_controls_section();

		// ICON Tab
        $this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icons', 'ova-team' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_social' => 'yes'
				]
			]
		);
			$this->start_controls_tabs( 'Style Icons' );

				$this->start_controls_tab(
					'icon_normal',
					[
						'label' => esc_html__( 'Normal', 'ova-team' ),
					]
				);
					$this->add_control(
						'color_icon',
						[
							'label' => esc_html__( 'Color', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-team-3 .content .item-team .list-icon ul .item i' => 'color : {{VALUE}};',
							],
						]
					);
                    $this->add_control(
						'background_color_icon',
						[
							'label' => esc_html__( 'Background Color', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-team-3 .content .item-team .list-icon ul .item' => 'background-color : {{VALUE}};',
							],
							
						]
					);
				$this->end_controls_tab();

				$this->start_controls_tab(
					'icon_hover',
					[
						'label' => esc_html__( 'Hover', 'ova-team' ),
					]
				);
					$this->add_control(
						'color_social_icons_hover',
						[
							'label' => esc_html__( 'Color', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-team-3 .content .item-team .list-icon .item i:hover' => 'color : {{VALUE}};',
							],
						]
					);
					$this->add_control(
						'bg_color_social_icons_hover',
						[
							'label' => esc_html__( 'Background Color', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .ova-team-3 .content .item-team .list-icon ul .item:hover' => 'background-color : {{VALUE}};',
							],
						]
					);

                $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'el_elementor_ova_team', 'elementor/ova_team_3.php' );

		ob_start();
		ovateam_get_template( $template, $settings );
		echo ob_get_clean();
		
	}
}
