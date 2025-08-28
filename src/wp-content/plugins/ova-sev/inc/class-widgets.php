<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('OvaSev_Widgets') ){
	
	class OvaSev_Widgets {

		function __construct(){

			/**
			 * Regsiter Widget
			 */
			add_action( 'widgets_init', array( $this, 'ovasev_register_widgets' ) );

		}
		

		function ovasev_register_widgets() {
		  
		  $args_service = array(
		    'name' => esc_html__( 'Service Sidebar', 'transflash'),
		    'id' => "service-sidebar",
		    'description' => esc_html__( 'Service Sidebar', 'transflash' ),
		    'class' => '',
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => "</div>",
		    'before_title' => '<h4 class="widget-title">',
		    'after_title' => "</h4>",
		  );
		  register_sidebar( $args_service );
		  

		}


	}
}

return new OvaSev_Widgets();