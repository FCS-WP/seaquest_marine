<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !function_exists( 'ovacareer_locate_template' ) ){
	function ovacareer_locate_template( $template_name, $template_path = '', $default_path = '' ) {
		
		// Set variable to search in ovacoll-templates folder of theme.
		if ( ! $template_path ) :
			$template_path = 'ovacareer-templates/';
		endif;

		// Set default plugin templates path.
		if ( ! $default_path ) :
			$default_path = OVACAREER_PLUGIN_PATH . 'templates/'; // Path to the template folder
		endif;

		// Search template file in theme folder.
		$template = locate_template( array(
			$template_path . $template_name
			// $template_name
		) );

		// Get plugins template file.
		if ( ! $template ) :
			$template = $default_path . $template_name;
		endif;

		return apply_filters( 'ovacareer_locate_template', $template, $template_name, $template_path, $default_path );
	}

}


function ovacareer_get_template( $template_name, $args = array(), $tempate_path = '', $default_path = '' ) {
	if ( is_array( $args ) && isset( $args ) ) :
		extract( $args );
	endif;
	$template_file = ovacareer_locate_template( $template_name, $tempate_path, $default_path );
	if ( ! file_exists( $template_file ) ) :
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_file ), '1.0.0' );
		return;
	endif;

	
	include $template_file;
}


add_filter( 'transflash_header_customize', 'transflash_header_customize_career', 10, 1 );
function transflash_header_customize_career( $header ){


	if( is_tax( 'cat_career' ) ||  get_query_var( 'cat_career' ) != '' || is_post_type_archive( 'ova_career' ) ){

	  	$header = get_theme_mod( 'header_archive_career', 'default' );

	}else if( is_singular( 'ova_career' ) ){

		$header = get_theme_mod( 'header_single_career', 'default' );
	}

	return $header;

}


add_filter( 'transflash_header_bg_customize', 'transflash_header_bg_customize_career', 10, 1 );
function transflash_header_bg_customize_career( $bg ){

	if( is_tax( 'cat_career' ) ||  get_query_var( 'cat_career' ) != '' || is_post_type_archive( 'ova_career' ) ){

	  	$bg = get_theme_mod( 'archive_background_career', '' );

	}else if( is_singular( 'ova_career' ) ){

		$bg = get_theme_mod( 'single_background_career', '' );

		$current_id = transflash_get_current_id();
        $header_bg_source =  get_the_post_thumbnail_url( $current_id, 'full' );

        if( $header_bg_source ){
            $bg = $header_bg_source;
        }
	}


	return $bg;
}


add_filter( 'transflash_footer_customize', 'transflash_footer_customize_career', 10, 1 );
function transflash_footer_customize_career( $footer ){
    
   if( is_tax( 'cat_career' ) ||  get_query_var( 'cat_career' ) != '' || is_post_type_archive( 'ova_career' ) ){

        $footer = get_theme_mod( 'archive_footer_career', '' );

    }else if( is_singular( 'ova_career' ) ){

        $footer = get_theme_mod( 'single_footer_career', '' );
    }

    return $footer;

}