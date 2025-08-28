<?php

if (!defined( 'ABSPATH' )) {
	exit;
}
if (!class_exists( 'Ova_Sev_Customize' )){

	class Ova_Sev_Customize {

		public function __construct() {
			add_action( 'customize_register', array( $this, 'ova_sev_customize_register' ) );
		}

		public function ova_sev_customize_register($wp_customize) {

			$this->ova_sev_init( $wp_customize );

			do_action( 'ova_sev_customize_register', $wp_customize );
		}


		public function ova_sev_init( $wp_customize ){

			$wp_customize->add_section( 'ova_sev_section' , array(
				'title'      => esc_html__( 'Service', 'ova-sev' ),
				'priority'   => 5,
			) );


			$wp_customize->add_setting( 'ova_sev_total_record', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '9',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
			$wp_customize->add_control('ova_sev_total_record', array(
				'label' => esc_html__('Number of posts per page','ova-sev'),
				'section' => 'ova_sev_section',
				'settings' => 'ova_sev_total_record',
				'type' =>'number'
			));


			$wp_customize->add_setting( 'ova_sev_layout', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'three_column',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
			$wp_customize->add_control('ova_sev_layout', array(
				'label' => esc_html__('Layout','ova-sev'),
				'section' => 'ova_sev_section',
				'settings' => 'ova_sev_layout',
				'type' =>'select',
				'choices' => array(
					'two_column'      => __( '2 column', 'ova-sev' ),
					'three_column' => __( '3 column', 'ova-sev' ),
					'four_column'      => __( '4 column', 'ova-sev' ),
				)
			));

			$wp_customize->add_setting( 'ova_sev_link_all_service', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
			$wp_customize->add_control('ova_sev_link_all_service', array(
				'label' => esc_html__('Link All Service','ova-sev'),
				'section' => 'ova_sev_section',
				'settings' => 'ova_sev_link_all_service',
				'type' =>'text'
			));


			$wp_customize->add_setting( 'archive_background_sev', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name 
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'archive_background_sev', array(
				'label'             => esc_html__('Background Archive Service', 'ova-sev'),
				'section'           => 'ova_sev_section',
				'settings'          => 'archive_background_sev',    
			)));

			$wp_customize->add_setting( 'single_background_sev', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name 
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'single_background_sev', array(
				'label'             => esc_html__('Background Single Service', 'ova-sev'),
				'section'           => 'ova_sev_section',
				'settings'          => 'single_background_sev',    
			)));
			

			$wp_customize->add_setting( 'header_archive_sev', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('header_archive_sev', array(
				'label' => esc_html__('Header Archive','ova-sev'),
				'section' => 'ova_sev_section',
				'settings' => 'header_archive_sev',
				'type' =>'select',
				'choices' => apply_filters('transflash_list_header', '')
			));

			$wp_customize->add_setting( 'archive_footer_sev', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('archive_footer_sev', array(
				'label' => esc_html__('Footer Archive','ova-dep'),
				'section' => 'ova_sev_section',
				'settings' => 'archive_footer_sev',
				'type' =>'select',
				'choices' => apply_filters('transflash_list_footer', '')
			));

			$wp_customize->add_setting( 'header_single_sev', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('header_single_sev', array(
				'label' => esc_html__('Header Single','ova-sev'),
				'section' => 'ova_sev_section',
				'settings' => 'header_single_sev',
				'type' =>'select',
				'choices' => apply_filters('transflash_list_header', '')
			));


			$wp_customize->add_setting( 'single_footer_sev', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('single_footer_sev', array(
				'label' => esc_html__('Footer Single','ova-dep'),
				'section' => 'ova_sev_section',
				'settings' => 'single_footer_sev',
				'type' =>'select',
				'choices' => apply_filters('transflash_list_footer', '')
			));

		}

	}

}

new Ova_Sev_Customize();






