<?php
	if(defined('TRANSFLASH_URL') 	== false) 	define('TRANSFLASH_URL', get_template_directory());
	if(defined('TRANSFLASH_URI') 	== false) 	define('TRANSFLASH_URI', get_template_directory_uri());

	load_theme_textdomain( 'transflash', TRANSFLASH_URL . '/languages' );

	// Main Feature
	require_once( TRANSFLASH_URL.'/inc/class-main.php' );

	// Functions
	require_once( TRANSFLASH_URL.'/inc/functions.php' );

	// Hooks
	require_once( TRANSFLASH_URL.'/inc/class-hook.php' );

	// Widget
	require_once (TRANSFLASH_URL.'/inc/class-widgets.php');
	

	// Elementor
	if (defined('ELEMENTOR_VERSION')) {
		require_once (TRANSFLASH_URL.'/inc/class-elementor.php');
	}
	
	// WooCommerce
	if (class_exists('WooCommerce')) {
		require_once (TRANSFLASH_URL.'/inc/class-woo.php');	
	}
	
	
	/* Customize */
	if( current_user_can('customize') ){
	    require_once TRANSFLASH_URL.'/customize/custom-control/google-font.php';
	    require_once TRANSFLASH_URL.'/customize/custom-control/heading.php';
	    require_once TRANSFLASH_URL.'/inc/class-customize.php';
	}
    
   
	require_once ( TRANSFLASH_URL.'/install-resource/active-plugins.php' );
	

	
	