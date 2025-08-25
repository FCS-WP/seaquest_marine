<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Our_Progress extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_our_progress';
	}

	
	public function get_title() {
		return esc_html__( 'Our Progress', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-number-field';
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
				'text_number',
				[
					'label' => esc_html__( 'Text Number', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' =>  esc_html__( '1', 'transflash' ),
					
				]
			);
				
			$repeater->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Before journey', 'transflash' ),
				]
			);

			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link Title', 'transflash' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'transflash' ),
					'show_label' => true,
				]
			);

			$repeater->add_control(
				'text_list',
				[
					'label' => esc_html__( 'Text List', 'transflash' ),
					'type' => Controls_Manager::WYSIWYG,
				]
			);

			$this->add_control(
				'items',
				[
					'label' => esc_html__( 'Our Progress', 'transflash' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[	
							'text_number'  => esc_html__( '1', 'transflash' ),
							'title'      => esc_html__( 'Before journey', 'transflash' ),
						],
						[	
							'text_number'  => esc_html__( '2', 'transflash' ),
							'title'      => esc_html__( 'During journey', 'transflash' ),
						],
						[	
							'text_number'  => esc_html__( '3', 'transflash' ),
							'title'      => esc_html__( 'After journey', 'transflash' ),
						], 
					],
					'title_field' => '{{{ title }}}',
				]
			);

		$this->end_controls_section();

		//******text number style*****/
		$this->start_controls_section(
			'section_text_number_style',
			[
				'label' => esc_html__( 'Text Number', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'text_number_typography',
					'selector' => '{{WRAPPER}} .ova-our-progress .progress-list .text-number',
				]
			);

			$this->add_control(
				'color_text_number',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-our-progress .progress-list .text-number' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bg_color_text_number',
				[
					'label' => esc_html__( 'Background Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-our-progress .progress-list .text-number' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'border_radius_text_number',
				[
					'label' => esc_html__( 'Border Raius', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-our-progress .progress-list .text-number' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

		//******title style*****/
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
					'selector' => '{{WRAPPER}} .ova-our-progress .progress-list .content .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-our-progress .progress-list .content .title' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-our-progress .progress-list .content .title a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-our-progress .progress-list .content  .title:hover' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-our-progress .progress-list .content  .title:hover a' => 'color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-our-progress .progress-list .content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-our-progress .progress-list .content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******Text list style*****/
		$this->start_controls_section(
			'section_text_list_style',
			[
				'label' => esc_html__( 'Text list', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		    $this->add_control(
				'bulleted_list',
				[
					'label' => esc_html__( 'Bulleted list', 'transflash' ),
					'type' => Controls_Manager::HEADING,
				]
			);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'text_list_typography',
						'selector' => '{{WRAPPER}} .ova-our-progress .progress-list .content .text-list ul li',
					]
				);

				$this->add_control(
					'color_text_list',
					[
						'label' => esc_html__( 'Color', 'transflash' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-our-progress .progress-list .content .text-list ul li' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'color_marker',
					[
						'label' => esc_html__( 'Color Marker', 'transflash' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-our-progress .progress-list .content .text-list ul li::marker' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_responsive_control(
					'padding_text_list',
					[
						'label' => esc_html__( 'Padding', 'transflash' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .ova-our-progress .progress-list .content .text-list ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->add_control(
				'paragraph',
				[
					'label' => esc_html__( 'Paragraph', 'transflash' ),
					'type' => Controls_Manager::HEADING,
				]
			);

			    $this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'p_typography',
						'selector' => '{{WRAPPER}} .ova-our-progress .progress-list .content .text-list p',
					]
				);

				$this->add_control(
					'color_p',
					[
						'label' => esc_html__( 'Color', 'transflash' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-our-progress .progress-list .content .text-list p' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_responsive_control(
					'padding_p',
					[
						'label' => esc_html__( 'Padding', 'transflash' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .ova-our-progress .progress-list .content .text-list p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

        $this->end_controls_section();

        //******Progress list style*****/
		$this->start_controls_section(
			'section_progress_list_style',
			[
				'label' => esc_html__( 'Progress List', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		    $this->add_control(
				'color_line',
				[
					'label' => esc_html__( 'Color Line', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-our-progress .progress-list:before' => 'border-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'height_line',
				[
					'label' 		=> esc_html__( 'Line Height', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px','%'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-our-progress .progress-list:before' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'left_position_line',
				[
					'label' 		=> esc_html__( 'Left Position', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px','%'],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-our-progress .progress-list:before' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'progress_list_padding',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-our-progress .progress-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$items    = $settings['items'];

		 ?>

		 	 <div class="ova-our-progress">
	            	
		        <?php 
		           foreach( $items as $item ) { 
		           	   $text_number  =    $item['text_number'];
		           	   $title        =    $item['title'];
		           	   $text_list    =    $item['text_list'];
					   $link         =    $item['link'];
					   $nofollow     =    ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? ' rel="nofollow"' : '';
		               $target       =    ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? ' target="_blank"' : '';  
				  
			    ?>
			    <div class="progress-list">

                 	<?php if ( !empty ($text_number)) : ?>
						<div class="text-number">
							<?php echo esc_html( $text_number ); ?>
						</div>
					<?php endif; ?>

					<div class="content">
						<?php if ( !empty ($title)) : ?>
							<h4 class="title">
										
			                    <?php if ( $link['url'] != '' ): ?>
									<a href="<?php echo esc_url( $link['url'] ); ?>"<?php echo esc_html( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
										<?php echo esc_html( $title ); ?>
									</a>
							    <?php else: ?>
									<?php echo esc_html( $title ); ?>
							    <?php endif; ?>

							</h4>
						<?php endif; ?>

						<?php if ( !empty ($text_list)) : ?>
							<div class="text-list">
								<?php printf($text_list) ; ?>
							</div>
						<?php endif; ?>
					</div>

                </div>
				<?php } ?>

			</div>

		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Our_Progress() );