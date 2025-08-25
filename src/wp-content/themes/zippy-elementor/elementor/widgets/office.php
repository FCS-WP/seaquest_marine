<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Office extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_office';
	}

	
	public function get_title() {
		return esc_html__( 'Office', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-tel-field';
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
				'title',
				[
					'label' 	=> esc_html__( 'Office Title', 'transflash' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Head office', 'transflash' ),
					'description' => esc_html__( 'Office or Warehouse ', 'transflash' ),
				]
			);

			 $this->add_control(
				'phone',
				[
					'label' 	=> esc_html__( 'Phone', 'transflash' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

				$this->add_control(
					'phone_heading',
					[
						'label' 	=> esc_html__( 'Heading', 'transflash' ),
						'type' 		=> Controls_Manager::TEXT,
						'default' 	=> esc_html__( 'Phone number :', 'transflash' ),
					]
				);

				$this->add_control(
					'phone_label',
					[
						'label'   => esc_html__( 'Label', 'transflash' ),
						'type'    => Controls_Manager::TEXT,
						'default' 	=> esc_html__( '(480) 555-0103', 'transflash' ),
						'description' => esc_html__( '+012 (345) 678', 'transflash' ),
					]
				);

				$this->add_control(
					'phone_address',
					[
						'label'   => esc_html__( 'Phone Adress', 'transflash' ),
						'type'    => Controls_Manager::TEXT,
						'default' 	=> esc_html__( '4805550103', 'transflash' ),
						'description' => esc_html__( '+012345678', 'transflash' ),
					]
				);


			$this->add_control(
				'email',
				[
					'label' 	=> esc_html__( 'Email', 'transflash' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

			    $this->add_control(
					'email_heading',
					[
						'label' 	=> esc_html__( 'Heading', 'transflash' ),
						'type' 		=> Controls_Manager::TEXT,
						'default' 	=> esc_html__( 'Email :', 'transflash' ),
					]
				);

				$this->add_control(
					'email_label',
					[
						'label'   => esc_html__( 'Label', 'transflash' ),
						'type'    => Controls_Manager::TEXT,
						'default' 	=> esc_html__( 'kenzi.lawson@example.com', 'transflash' ),
					]
				);

				$this->add_control(
					'email_address',
					[
						'label'   => esc_html__( 'Email Adress', 'transflash' ),
						'type'    => Controls_Manager::TEXT,
						'default' 	=> esc_html__( 'kenzi.lawson@example.com', 'transflash' ),
						'description' => esc_html__( 'email@company.com', 'transflash' ),
					]
				);
            
			$this->add_control(
				'address',
				[
					'label' 	=> esc_html__( 'Address', 'transflash' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

			    $this->add_control(
					'address_heading',
					[
						'label' 	=> esc_html__( 'Heading', 'transflash' ),
						'type' 		=> Controls_Manager::TEXT,
						'default' 	=> esc_html__( 'Adress :', 'transflash' ),
					]
				);

				$this->add_control(
					'address_label',
					[
						'label'   => esc_html__( 'Label', 'transflash' ),
						'type'    => Controls_Manager::TEXT,
						'default' 	=> esc_html__( '4140 Parker Rd. Allentown, New Mexico 31134', 'transflash' ),
					]
				);

				$this->add_control(
					'link_address',
					[
						'label'   => esc_html__( 'Link Adress', 'transflash' ),
						'type'    => Controls_Manager::URL,
						'description' => esc_html__( 'https://maps.google.com', 'transflash' ),
						'show_external' => false,
						'default' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],

					]
				);

			$this->add_control(
				'heading_working_hours',
				[
					'label' 	=> esc_html__( 'Working Hours', 'transflash' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

				$this->add_control(
					'working_hours_heading',
					[
						'label' 	=> esc_html__( 'Heading', 'transflash' ),
						'type' 		=> Controls_Manager::TEXT,
						'default' 	=> esc_html__( 'Working Hours', 'transflash' ),
					]
				);

				$this->add_control(
					'working_day',
					[
						'label' 	=> esc_html__( 'Working Day', 'transflash' ),
						'type' 		=> Controls_Manager::TEXT,
						'default' 	=> esc_html__( 'T2 - T6', 'transflash' ),
					]
				);

				$this->add_control(
					'working_hours',
					[
						'label' 	=> esc_html__( 'Working Hours', 'transflash' ),
						'type' 		=> Controls_Manager::TEXT,
						'default' 	=> esc_html__( '8:00 - 17:00', 'transflash' ),
					]
				);

		$this->end_controls_section();

		/* Begin title Style */
		$this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__( 'Office Title', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-office .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .title:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'circle_title_color',
				[
					'label' 	=> esc_html__( 'Circle Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .title:before' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'title_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-office .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'title_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-office .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End title style */

		/* Begin Heading Style */
		$this->start_controls_section(
            'heading_style',
            [
                'label' => esc_html__( 'Heading', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'heading_typography',
					'selector' 	=> '{{WRAPPER}} .ova-office .heading',
				]
			);

			$this->add_control(
				'heading_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .heading' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'heading_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-office .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'heading_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-office .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End heading style */

		/* Begin Phone Style */
		$this->start_controls_section(
            'phone_style',
            [
                'label' => esc_html__( 'Phone', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'phone_typography',
					'selector' 	=> '{{WRAPPER}} .ova-office .divided .phone a',
				]
			);

			$this->add_control(
				'phone_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .divided .phone a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'phone_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .divided .phone:hover a' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End phone style */

		/* Begin Email Style */
		$this->start_controls_section(
            'email_style',
            [
                'label' => esc_html__( 'Email', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'email_typography',
					'selector' 	=> '{{WRAPPER}} .ova-office .divided .email a',
				]
			);

			$this->add_control(
				'email_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .divided .email a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'email_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .divided .email:hover a' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End email style */

		/* Begin Address Style */
		$this->start_controls_section(
            'address_style',
            [
                'label' => esc_html__( 'Address', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'address_typography',
					'selector' 	=> '{{WRAPPER}} .ova-office .address a',
				]
			);

			$this->add_control(
				'address_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .address a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'address_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .address:hover a' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End address style */

		/* Begin Working Hours Style */
		$this->start_controls_section(
            'working_hours_style',
            [
                'label' => esc_html__( 'Working Hours', 'transflash' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'working_hours_typography',
					'selector' 	=> '{{WRAPPER}} .ova-office .divided .right .working_hours',
				]
			);

			$this->add_control(
				'working_hours_color',
				[
					'label' 	=> esc_html__( 'Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .divided .right .working_hours' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'circle_working_hours_color',
				[
					'label' 	=> esc_html__( 'Circle Color', 'transflash' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-office .divided .right .working_hours:before' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'working_hours_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-office .divided .right .working_hours' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'working_hours_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'transflash' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-office .divided .right .working_hours' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End working_hours style */
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$title 	        = $settings['title'];
        
        $email_heading 	= $settings['email_heading'];
		$email_label 	= $settings['email_label'];
		$email_address 	= $settings['email_address'];
        
        $phone_heading 	= $settings['phone_heading'];
		$phone_label 	= $settings['phone_label'];
		$phone_address 	= $settings['phone_address'];
        
        $address_heading     = $settings['address_heading'];
		$address_label 	     = $settings['address_label'];
		$link_address 	     = $settings['link_address']['url'];
		$link_address_target = ( isset( $settings['link_address']['is_external'] ) && $settings['link_address']['is_external'] !== false ) ? ' target="_blank"' : '';
 

		$working_hours_heading	= $settings['working_hours_heading'];
		$working_hours	        = $settings['working_hours'];
		$working_day	        = $settings['working_day'];

		 ?>
            
            <div class="ova-office">
            	<?php if (!empty( $title )): ?>
					<h3 class="title">
						<?php echo esc_html( $title ); ?>
					</h3>
				<?php endif;?>

				<div class="divided">

                    <div class="left">
                    	<div class="phone">
							<?php if (!empty( $phone_heading )): ?>
								<h5 class="heading phone_heading">
									<?php echo esc_html( $phone_heading ); ?>
								</h5>
							<?php endif;?>
							<?php if( $phone_address && $phone_label ) { ?>
								<a href="tel:<?php echo esc_attr( $phone_address ) ?> ">
									<?php echo esc_html( $phone_label ); ?>
								</a>
							<?php } ?>
					    </div>

						<div class="email">
							<?php if (!empty( $email_heading )): ?>
								<h5 class="heading email_heading">
									<?php echo esc_html( $email_heading ); ?>
								</h5>
							<?php endif;?>
							<?php if( $email_address && $email_label ) { ?>
								<a href="mailto:<?php echo esc_attr( $email_address ) ?> ">
									<?php echo esc_html( $email_label ); ?>
								</a>
							<?php } ?>
					    </div>
                    </div>
					
					<div class="right">
						<?php if (!empty( $working_hours_heading )): ?>
							<h5 class="heading working_hours_heading">
								<?php echo esc_html( $working_hours_heading ); ?>
							</h5>
						<?php endif;?>
						<?php if (!empty( $working_day )): ?>
							<div class="working_hours day">
								<?php echo esc_html( $working_day ); ?>
							</div>
						<?php endif;?>
						<?php if (!empty( $working_hours )): ?>
							<div class="working_hours hours">
								<?php echo esc_html( $working_hours ); ?>
							</div>
						<?php endif;?>	
				    </div>

				</div>

			    <div class="address">
					<?php if (!empty( $address_heading )): ?>
						<h5 class="heading address_heading">
							<?php echo esc_html( $address_heading ); ?>
						</h5>
					<?php endif;?>
					<?php if( $link_address && $address_label ) { ?>
						<a href="<?php echo esc_attr( $link_address ) ?>" <?php echo esc_html( $link_address_target ) ?>>
							<?php echo esc_html( $address_label ); ?>
						</a>
					<?php } ?>
			    </div>

            </div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Office() );