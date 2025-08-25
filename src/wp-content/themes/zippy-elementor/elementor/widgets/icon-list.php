<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_icon_list extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_icon_list';
	}

	
	public function get_title() {
		return esc_html__( 'Icon List', 'transflash' );
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
            
            $repeater_1 = new \Elementor\Repeater();

			$repeater_1->add_control(
				'class_icon_1',
				[
					'label' => esc_html__( 'Icon', 'transflash' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'ovaicomoon ovaicomoon-status-up',
						'library' 	=> 'iconmoon',
					],
				]
			);
				
			$repeater_1->add_control(
				'title_1',
				[
					'label' => esc_html__( 'Title', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Customize according to needs ', 'transflash' ),
				]
			);

			$repeater_1->add_control(
				'link_1',
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

			$repeater_1->add_control(
				'sub_title_1',
				[
					'label' => esc_html__( 'Sub-Title', 'transflash' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( "We can customize our service according to the amount of goods you want to store.", 'transflash' ),
				]
			);

			$this->add_control(
				'items_1',
				[
					'label' => esc_html__( 'List Content', 'transflash' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater_1->get_controls(),
					'default' => [
						[	
							'class_icon_1' => [
								'value' 	=> 'flaticon flaticon-customize',
								'library' 	=> 'flaticon',
							],
							'title_1'      => esc_html__( 'Customize according to needs', 'transflash' ),
							'sub_title_1'      => esc_html__( 'We can customize our service according to the amount of goods you want to store.', 'transflash' ),
						],
						[	
							'class_icon_1' => [
								'value' 	=> 'flaticon flaticon-price',
								'library' 	=> 'flaticon',
							],
							'title_1'      => esc_html__( 'Reduce your costs', 'transflash' ),
							'sub_title_1'      => esc_html__( 'You will not have to invest to build and operate a private warehouse', 'transflash' ),
						],
						[	
							'class_icon_1' => [
								'value' 	=> 'flaticon flaticon-wall-clock',
								'library' 	=> 'flaticon',
							],
							'title_1'      => esc_html__( 'Shorten your cycle time', 'transflash' ),
							'sub_title_1'      => esc_html__( 'Shorten your cycle time is the benefit warehousing service bring for businesses.', 'transflash' ),
						],
						[	
							'class_icon_1' => [
								'value' 	=> 'flaticon flaticon-increase',
								'library' 	=> 'flaticon',
							],
							'title_1'      => esc_html__( 'Increase operation efficiency', 'transflash' ),
							'sub_title_1'      => esc_html__( 'Warehousing service help reduce cost & save you time  ', 'transflash' ),
						],   
					],
					'title_field' => '{{{ title_1 }}}',
					'condition' => [
						'template' 	=> 'template1',
					],
				]
			);

			$repeater_2 = new \Elementor\Repeater();

			$repeater_2->add_control(
				'class_icon_2',
				[
					'label' => esc_html__( 'Icon', 'transflash' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'fas fa-circle',
						'library' 	=> 'all',
					],
				]
			);
				
			$repeater_2->add_control(
				'title_2',
				[
					'label' => esc_html__( 'Title', 'transflash' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Location :', 'transflash' ),
				]
			);

			$repeater_2->add_control(
				'sub_title_2',
				[
					'label' => esc_html__( 'Sub-Title', 'transflash' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( "We can customize our service according to the amount of goods you want to store.", 'transflash' ),
				]
			);

			$repeater_2->add_control(
				'link_2',
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

			$this->add_control(
				'items_2',
				[
					'label' => esc_html__( 'List Content', 'transflash' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater_2->get_controls(),
					'default' => [
						[	
							'title_2'      => esc_html__( 'Location :', 'transflash' ),
							'sub_title_2'      => esc_html__( '2972 Westheimer Rd. Santa Ana, Illinois 85486', 'transflash' ),
						],
						[	
							'title_2'      => esc_html__( 'Compliance :', 'transflash' ),
							'sub_title_2'      => esc_html__( 'ISO9001:2008, FTZ, TS16949:2002, FDA Regulation', 'transflash' ),
						], 
						[	
							'title_2'      => esc_html__( 'Dimension :', 'transflash' ),
							'sub_title_2'      => esc_html__( 'Length 250 M, Width 80 M, 12 Meter', 'transflash' ),
						],
						[	
							'title_2'      => esc_html__( 'Roof slope :', 'transflash' ),
							'sub_title_2'      => esc_html__( '1 : 10', 'transflash' ),
						],
						[	
							'title_2'      => esc_html__( 'Crane System :', 'transflash' ),
							'sub_title_2'      => esc_html__( 'Applicable', 'transflash' ),
						]
					],
					'title_field' => '{{{ title_2 }}}',
					'condition' => [
						'template' 	=> 'template2',
					],
				]
			);

			$this->add_responsive_control(
				'align',
				[
					'label' 	=> esc_html__( 'Alignment', 'transflash' ),
					'type' 		=> Controls_Manager::CHOOSE,
					'options' 	=> [
						'left' 	=> [
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
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list' 	            => 'text-align: {{VALUE}};',
						'{{WRAPPER}} .ova-icon-list .icon-list' 	=> 'justify-content: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

		 //******icon style*****/
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_responsive_control(
				'icon_size',
				[
					'label' 		=> esc_html__( 'Icon Size', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items .icon-list i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'color_icon',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items .icon-list i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_icon_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items:hover .icon-list i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_icon',
				[
					'label' => esc_html__( 'Margin', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items .icon-list i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' => '{{WRAPPER}} .ova-icon-list .icon-list-items .icon-list .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items .icon-list .title' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-icon-list .icon-list-items .icon-list .title a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items:hover .icon-list .title' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-icon-list .icon-list-items:hover .icon-list .title a' => 'color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-icon-list .icon-list-items .icon-list .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-icon-list .icon-list-items .icon-list .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******sub-title style*****/
		$this->start_controls_section(
			'section_sub_title_style',
			[
				'label' => esc_html__( 'Sub-Title', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'sub_title_typography',
					'selector' => '{{WRAPPER}} .ova-icon-list .icon-list-items .sub-title',
				]
			);

			$this->add_control(
				'color_sub_title',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items .sub-title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_sub_title',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list  .icon-list-items .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_sub_title',
				[
					'label' => esc_html__( 'Margin', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******icon list style*****/
		$this->start_controls_section(
			'section_icon_list_style',
			[
				'label' => esc_html__( 'Icon List', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_responsive_control(
				'space_beetween',
				[
					'label' 		=> esc_html__( 'Space Beetween', 'transflash' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_icon_list',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .icon-list-items .icon-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => __( 'Border', 'transflash' ),
					'selector' => '{{WRAPPER}} .ova-icon-list .icon-list-items:not(:last-child)',
				]
			);

        $this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();
        
        $template            =    $settings['template'];
		$items_1             =    $settings['items_1'];
        $items_2             =    $settings['items_2'];

		 ?>
            <?php if ( $template === 'template1' ) : ?>

	            <div class="ova-icon-list  ova-icon-list-<?php echo esc_attr($template) ;?>">
	            	
			         <?php 
			           foreach( $items_1 as $item_1 ) { 
			               $class_icon =    $item_1['class_icon_1']['value'];
			           	   $title      =    $item_1['title_1'];
			           	   $sub_title  =    $item_1['sub_title_1'];
						   $link       =    $item_1['link_1'];
						   $nofollow   =    ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? ' rel="nofollow"' : '';
			               $target     =    ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? ' target="_blank"' : '';  
					  
				    ?>
				    <div class="icon-list-items">
						<div class="icon-list">
		                   
							<?php if ( !empty ($class_icon)) : ?>
								<div class="icon">
									<i class="<?php echo esc_attr($class_icon)?>"></i>
								</div>
							<?php endif; ?>

							<div class="info">
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

								<?php if ( !empty ($sub_title)) : ?>
									<p class="sub-title">
										<?php echo esc_html($sub_title) ; ?>
									</p>
								<?php endif; ?>
							</div>

						</div>
	                </div>
					<?php } ?>

				</div>

		 	<?php elseif( $template === 'template2' ) : ?>

                <div class="ova-icon-list  ova-icon-list-<?php echo esc_attr($template) ;?>">
	            	
			         <?php 
			           foreach( $items_2 as $item_2 ) { 
			               $class_icon =    $item_2['class_icon_2']['value'];
			           	   $title      =    $item_2['title_2'];
			           	   $sub_title  =    $item_2['sub_title_2'];
						   $link       =    $item_2['link_2'];
						   $nofollow   =    ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? ' rel="nofollow"' : '';
			               $target     =    ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? ' target="_blank"' : '';  
					  
				    ?>
				    <div class="icon-list-items">
						<div class="icon-list">
		                   
							<?php if ( !empty ($class_icon)) : ?>
								<i class="<?php echo esc_attr($class_icon)?>"></i>
							<?php endif; ?>

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
						</div>

                        <?php if ( !empty ($sub_title)) : ?>
							<div class="sub-title">
									<?php echo esc_html( $sub_title); ?>
							</div>
						<?php endif; ?>

	                </div>
					<?php } ?>

				</div>
			<?php endif; ?>

		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_icon_list() );