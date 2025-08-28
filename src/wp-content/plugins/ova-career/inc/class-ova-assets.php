<?php 
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'OVAcareer_assets' ) ){
	class OVACAREER_assets{

		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'ovacareer_enqueue_scripts' ), 10, 0 );

			/* Add JS for Elementor */
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'ova_enqueue_scripts_elementor_career' ) );

		}



		public function ovacareer_enqueue_scripts(){

			// Init Css
			wp_enqueue_style( 'career_style', OVACAREER_PLUGIN_URI.'assets/css/style.css' );	

			// Add JS
			wp_enqueue_script( 'script-career', OVACAREER_PLUGIN_URI. 'assets/js/script.js', [ 'jquery' ], false, true );

		}

		// Add JS for elementor
		public function ova_enqueue_scripts_elementor_career(){
			wp_enqueue_script( 'script-elementor-career', OVACAREER_PLUGIN_URI. 'assets/js/script-elementor.js', [ 'jquery' ], false, true );
		}


	}
	new OVACAREER_assets();
}
