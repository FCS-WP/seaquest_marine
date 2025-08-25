<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Testimonial2 extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_testimonial2';
	}

	
	public function get_title() {
		return esc_html__( 'Testimonial2', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-testimonial';
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
			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'name_author',
					[
						'label'   => esc_html__( 'Author Name', 'transflash' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Darrell Steward', 'transflash' ),
					]
				);

				$repeater->add_control(
					'job',
					[
						'label'   => esc_html__( 'Job', 'transflash' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
		                'default' => esc_html__( 'Founder of DLG', 'transflash' ),
					]
				);

				$repeater->add_control(
					'image_author',
					[
						'label'   => esc_html__( 'Author Image', 'transflash' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					]
				);

				$repeater->add_control(
					'testimonial',
					[
						'label'   => esc_html__( 'Testimonial ', 'transflash' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( "Transflash team is amazing. They work in a Professional, timely, communicative way. When we face logistics challenges, they always find the right solution to deal with them. I would highly recommend to my friends", 'transflash' ),
					]
				);

			$this->add_control(
				'tab_item',
				[
					'label'       => esc_html__( 'Items Testimonial', 'transflash' ),
					'type'        => Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'default' => [
						[
							'name_author' => esc_html__('Darrell Steward', 'transflash'),
							'job' => esc_html__('Founder of DLG', 'transflash'),
							'testimonial' => esc_html__("Transflash team is amazing. They work in a Professional, timely, communicative way. When we face logistics challenges, they always find the right solution to deal with them. I would highly recommend to my friends", 'transflash'),
						],
						[
							'name_author' => esc_html__('Ronald Richards', 'transflash'),
							'job' => esc_html__('CEO of a law firm', 'transflash'),
							'testimonial' => esc_html__("Works like a charm. I love services of Transflash and would highly recommend to my friend and partners. I pleasant with your great performance and your professional attitude.", 'transflash'),
						],
						[
							'name_author' => esc_html__('Kristin Watson', 'transflash'),
							'job' => esc_html__('Manager of HG', 'transflash'),
							'testimonial' => esc_html__("I want to express my appreciation to your team. I hired you to organize shipping my cargo from Singapore to America. The service is excellent from start to finish. You supported me 24/7 during the journey.", 'transflash'),
						],
						[
							'name_author' => esc_html__('Marvin McKinney', 'transflash'),
							'job' => esc_html__('Founder of DLG', 'transflash'),
							'testimonial' => esc_html__("Transflash team is amazing. They work in a Professional, timely, communicative way. When we face logistics challenges, they always find the right solution to deal with them. I would highly recommend to my friends", 'transflash'),
						],
					],
					'title_field' => '{{{ name_author }}}',
				]
			);

		$this->end_controls_section();

		/*************  SECTION name author testimonial  *******************/
		$this->start_controls_section(
			'section_name_testimonial',
			[
				'label' => esc_html__( 'Name', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'name_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .client_info .name-job .name',
				]
			);

			$this->add_control(
				'name_color',
				[
					'label'     => esc_html__( 'Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .client_info .name-job .name' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'name_line_before_color',
				[
					'label'     => esc_html__( 'Line Before Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .client_info .name-job .name:before' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'name_margin',
				[
					'label'      => esc_html__( 'Margin', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .client_info .name-job .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end name author testimonial  ###############

		/*************  SECTION job author testimonial  *******************/
		$this->start_controls_section(
			'section_job_testimonial',
			[
				'label' => esc_html__( 'Job', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'job_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .client_info .name-job .job',
				]
			);

			$this->add_control(
				'job_color',
				[
					'label'     => esc_html__( 'Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .client_info .name-job .job' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'job_margin',
				[
					'label'      => esc_html__( 'Margin', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .client_info .name-job .job' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end job testimonial  ###############

		/*************  SECTION content testimonial  *******************/
		$this->start_controls_section(
			'section_content_testimonial',
			[
				'label' => esc_html__( 'Content Testimonial', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .testimonial',
				]
			);

			$this->add_control(
				'content_color',
				[
					'label'     => esc_html__( 'Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .testimonial' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_margin',
				[
					'label'      => esc_html__( 'Margin', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .testimonial' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => esc_html__( 'Padding', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2 .testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section content testimonial  ###############


		/*************  SECTION item testimonial2  *******************/
		$this->start_controls_section(
			'section_item_testimonial2',
			[
				'label' => esc_html__( 'Item Testimonial2', 'transflash' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'item_testimonial2_background_color',
				[
					'label'     => esc_html__( 'Background Color', 'transflash' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'item_testimonial2_padding',
				[
					'label'      => esc_html__( 'Padding', 'transflash' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial2 .item-testimonial2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();
		$tab_item = $settings['tab_item'];

		 ?>
		    <div class="ova-testimonial2">

				<?php if(!empty($tab_item)) : foreach ($tab_item as $item) :?>

					<div class="item-testimonial2">

                        <div class="client_info">

							<?php if( $item['image_author'] != '' ) { ?>
								<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','transflash' ); ?>
								<img class="client-img" src="<?php echo esc_attr($item['image_author']['url']) ?>" alt="<?php echo esc_attr( $alt ); ?>" >
							<?php } ?>
							
							<div class="name-job">
								
								<?php if( $item['name_author'] != '' ) { ?>
									<p class="name second_font">
										<?php echo esc_html($item['name_author']) ?>
									</p>
								<?php } ?>

								<?php if( $item['job'] != '' ) { ?>
									<p class="job">
										<?php echo esc_html($item['job']) ?>
									</p>
								<?php } ?>
							</div>

						</div>

						<?php if( $item['testimonial'] != '' ) : ?>
							<p class="testimonial">
								<?php echo esc_html($item['testimonial']) ?>
							</p>
						<?php endif; ?>

					</div>
							
				<?php endforeach; endif; ?>

			</div>

		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Testimonial2() );