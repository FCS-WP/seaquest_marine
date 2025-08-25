<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Transflash_Elementor_Service_List extends Widget_Base {

	
	public function get_name() {
		return 'transflash_elementor_service_list';
	}

	
	public function get_title() {
		return esc_html__( 'Service List', 'transflash' );
	}

	
	public function get_icon() {
		return 'eicon-bullet-list';
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
				'text',
				[
					'label' 	=> esc_html__( 'Text', 'transflash' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'All Services', 'transflash' ),
				]
			);

			$this->add_control(
				'posts_per_page',
				[
					'label'   => esc_html__( 'Post Per Page', 'transflash' ),
					'type'    => Controls_Manager::NUMBER,
					'min'     => 1,
					'default' => 5
				]
			);

			$this->add_control(
				'order_by',
				[
					'label'   => esc_html__( 'Order By', 'transflash' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'date',
					'options' => [
						'title' => esc_html__( 'Title', 'transflash' ),
						'date' 	=> esc_html__( 'Date', 'transflash' ),
						'ID' 	=> esc_html__( 'ID', 'transflash' ),			
					],
				]
			);

			$this->add_control(
				'order',
				[
					'label'   => esc_html__( 'Order', 'transflash' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'DESC',
					'options' => [
						'DESC' => esc_html__( 'Descending', 'transflash' ),
						'ASC'  => esc_html__( 'Ascending', 'transflash' ),
					],
				]
			);

			$this->add_control(
				'target_blank',
				[
					'label' 		=> esc_html__( 'Target Blank', 'transflash' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'label_on' 		=> esc_html__( 'Yes', 'transflash' ),
					'label_off' 	=> esc_html__( 'No', 'transflash' ),
					'default' 		=> 'no',
				]
			);

			$this->add_control(
				'title_limit',
				[
					'label'   		=> esc_html__( 'Title Limit', 'transflash' ),
					'type'    		=> Controls_Manager::NUMBER,
					'min'     		=> -1,
					'default' 		=> 10,
					'description' 	=> esc_html__( 'Limit characters to display "Title Post"', 'transflash' ),
				]
			);

		$this->end_controls_section();

		 //******text style*****/
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Text', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => '_typography',
					'selector' => '{{WRAPPER}} .service-list .text',
				]
			);

			$this->add_control(
				'color_text',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-list .text' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_text_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-list .text:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_underline',
				[
					'label' => esc_html__( 'Color Underline', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-list .text:before' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_text',
				[
					'label' => esc_html__( 'Padding', 'transflash' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-list .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();
		
		//******Title Post style*****/
		$this->start_controls_section(
			'section_title_post_style',
			[
				'label' => esc_html__( 'Title Post', 'transflash' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_post_typography',
					'selector' => '{{WRAPPER}} .service-list .post-title-list .item a',
				]
			);

			$this->add_control(
				'color_title_post',
				[
					'label' => esc_html__( 'Color', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-list .post-title-list .item a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title_post_hover',
				[
					'label' => esc_html__( 'Color Hover', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-list .post-title-list .item:hover a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_line_before_title_post',
				[
					'label' => esc_html__( 'Color Line', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-list .post-title-list .item a:before' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_line_before_active_title_post',
				[
					'label' => esc_html__( 'Color Line Active', 'transflash' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-list .post-title-list .item.active a:before' => 'background-color : {{VALUE}};',
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
						'{{WRAPPER}} .service-list .post-title-list .item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$text 			= $settings['text'];
		$posts_per_page = $settings['posts_per_page'];
		$order_by       = $settings['order_by'];
		$order          = $settings['order'];
		$limit          = $settings['title_limit'];
		$target 	    = 'yes' == $settings['target_blank'] ? ' target="_blank"' : '';

		$args_posts = array(
			'post_type' => 'ova_sev',
            'post_status'   => 'publish',
            'posts_per_page' => $posts_per_page,
			'orderby' => $order_by,
			'order'   => $order
		);

		$posts = new \WP_Query( $args_posts );

		$post_id = get_the_ID();

		 ?>
             
            <div class="service-list">

		 		<?php if(!empty($text)) :?>
	                <p class="text">
	                	<?php echo esc_html( $text ); ?>
	                </p>
                <?php endif; ?>

				<ul class="post-title-list">
					<?php if ( $posts->have_posts() ) : ?>
					<?php while ( $posts->have_posts() ) : $posts->the_post(); 
						$id       = get_the_ID();
						$title    = get_the_title( $id );
						$excerpt  = wp_trim_words( $title, $limit, '' );
						

					?>
						<?php if ( $post_id && $post_id == $id ): ?>
						 	<li class="item active">
						<?php else: ?>
						  	<li class="item">
						<?php endif; ?>
							<a href="<?php echo esc_url( get_post_permalink( $id ) ); ?>" <?php echo esc_html( $target ); ?>>
                            <?php if ( !empty( $title )) { 
                                	echo esc_html( $excerpt ) ; 
                                }
                                else { 
                                	echo esc_html_e('Untitled', 'transflash'); 
                                }
                            ?>
							</a>
						</li>
					<?php endwhile; ?>
				    <?php wp_reset_postdata(); ?>
			        <?php endif; ?>
				</ul>

			</div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Transflash_Elementor_Service_List() );