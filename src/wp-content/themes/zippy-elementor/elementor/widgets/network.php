<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Network extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_network';
	}

	
	public function get_title() {
		return esc_html__( 'Network', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-editor-list-ul';
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
				'continents',
				[
					'label' 	=> esc_html__( 'Continents', 'transflash' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Asian', 'transflash' ),
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'country',
				[
					'label' 	=> esc_html__( 'Country', 'transflash' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Australia', 'transflash' ),
				]
			);

			$this->add_control(
				'tab_item',
				[
					'label'		=> esc_html__( 'Tabs', 'transflash' ),
					'type'		=> Controls_Manager::REPEATER,
					'fields'  	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'country'  => esc_html__('Australia', 'transflash'),
						],
						[
							'country'  => esc_html__('Singapore', 'transflash'),
						],
						[
							'country'  => esc_html__('China', 'transflash'),
						],
					],
					'title_field' => '{{{ country }}}',
				]
			);
	
		$this->end_controls_section();

		//******Continents style*****/
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Continents', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'continents_typography',
					'selector' => '{{WRAPPER}} .ova-network .continents',
				]
			);

			$this->add_control(
				'color_continents',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-network .continents' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_continents_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-network .continents:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'border_color_continents',
				[
					'label' => esc_html__( 'Border Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-network .continents' => 'border-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'border_color_hover_continents',
				[
					'label' => esc_html__( 'Border Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-network:hover .continents' => 'border-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_continents',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-network .continents' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_continents',
				[
					'label' => esc_html__( 'Margin', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-network .continents' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******Country style*****/
		$this->start_controls_section(
			'section_text_list_style',
			[
				'label' => esc_html__( 'Country', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'country_typography',
					'selector' => '{{WRAPPER}} .ova-network .country-list .country',
				]
			);

			$this->add_control(
				'color_country',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-network .country-list .country' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_marker',
				[
					'label' => esc_html__( 'Color Marker', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-network .country-list .country::marker' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'border_color_country',
				[
					'label' => esc_html__( 'Border Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-network .country-list .country' => 'border-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_country',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-network .country-list .country' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_country',
				[
					'label' => esc_html__( 'Margin', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-network .country-list .country' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******Network style*****/
		$this->start_controls_section(
			'section_net_work_style',
			[
				'label' => esc_html__( 'Network', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'padding_net_work',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-network' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => __( 'Box Shadow Hover', 'transflash' ),
					'selector' => '{{WRAPPER}} .ova-network:hover',
				]
			);

        $this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$continents = $settings['continents'];
		$tab_item   = $settings['tab_item'];

		 ?>
           
            <div class="ova-network">
	            <?php if(!empty( $continents )) : ?>
	            	<h3 class="continents">
	            		 <?php echo esc_html($continents); ?>
	            	</h3>
	            <?php endif;?>

	            <ul class="country-list">
		            <?php foreach($tab_item as $item) : ?>
	            		<li class="country">
	            			<?php echo esc_html($item['country']); ?>
	            		</li>	
		            <?php endforeach;?>
	            </ul>

            </div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Network() );