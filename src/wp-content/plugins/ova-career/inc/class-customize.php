<?php

if (!defined( 'ABSPATH' )) {
	exit;
}
if (!class_exists( 'Ova_Career_Customize' )){

	class Ova_Career_Customize {

		public function __construct() {
			add_action( 'customize_register', array( $this, 'ova_career_customize_register' ) );
		}

		public function ova_career_customize_register($wp_customize) {

			$this->ova_career_init( $wp_customize );

			do_action( 'ova_career_customize_register', $wp_customize );
		}


		public function ova_career_init( $wp_customize ){

			$wp_customize->add_section( 'ova_career_section' , array(
				'title'      => esc_html__( 'Career', 'ova-career' ),
				'priority'   => 5,
			) );


			$wp_customize->add_setting( 'ova_career_total_record', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '9',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
			$wp_customize->add_control('ova_career_total_record', array(
				'label' => esc_html__('Number of posts per page','ova-career'),
				'section' => 'ova_career_section',
				'settings' => 'ova_career_total_record',
				'type' =>'number'
			));


			$wp_customize->add_setting( 'ova_career_layout', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'three_column',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
			$wp_customize->add_control('ova_career_layout', array(
				'label' => esc_html__('Layout','ova-career'),
				'section' => 'ova_career_section',
				'settings' => 'ova_career_layout',
				'type' =>'select',
				'choices' => array(
					'two_column'      => __( '2 column', 'ova-career' ),
					'three_column' => __( '3 column', 'ova-career' ),
					'four_column'      => __( '4 column', 'ova-career' ),
				)
			));

			$wp_customize->add_setting( 'ova_career_link_all_career', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
			$wp_customize->add_control('ova_career_link_all_career', array(
				'label' => esc_html__('Link All Career','ova-career'),
				'section' => 'ova_career_section',
				'settings' => 'ova_career_link_all_career',
				'type' =>'text'
			));


			$wp_customize->add_setting( 'archive_background_career', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name 
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'archive_background_career', array(
				'label'             => esc_html__('Background Archive Career', 'ova-career'),
				'section'           => 'ova_career_section',
				'settings'          => 'archive_background_career',    
			)));

			$wp_customize->add_setting( 'single_background_career', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name 
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'single_background_career', array(
				'label'             => esc_html__('Background Single Career', 'ova-career'),
				'section'           => 'ova_career_section',
				'settings'          => 'single_background_career',    
			)));
			

			$wp_customize->add_setting( 'header_archive_career', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('header_archive_career', array(
				'label' => esc_html__('Header Archive','ova-career'),
				'section' => 'ova_career_section',
				'settings' => 'header_archive_career',
				'type' =>'select',
				'choices' => apply_filters('transflash_list_header', '')
			));

			$wp_customize->add_setting( 'archive_footer_career', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('archive_footer_career', array(
				'label' => esc_html__('Footer Archive','ova-dep'),
				'section' => 'ova_career_section',
				'settings' => 'archive_footer_career',
				'type' =>'select',
				'choices' => apply_filters('transflash_list_footer', '')
			));

			$wp_customize->add_setting( 'header_single_career', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('header_single_career', array(
				'label' => esc_html__('Header Single','ova-career'),
				'section' => 'ova_career_section',
				'settings' => 'header_single_career',
				'type' =>'select',
				'choices' => apply_filters('transflash_list_header', '')
			));


			$wp_customize->add_setting( 'single_footer_career', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('single_footer_career', array(
				'label' => esc_html__('Footer Single','ova-dep'),
				'section' => 'ova_career_section',
				'settings' => 'single_footer_career',
				'type' =>'select',
				'choices' => apply_filters('transflash_list_footer', '')
			));

		}

	}

}

new Ova_Career_Customize();






