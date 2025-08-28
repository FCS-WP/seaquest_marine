<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Transflash_Shortcode') ){
    
    class Transflash_Shortcode {

        public function __construct() {

            add_shortcode( 'transflash-elementor-template', array( $this, 'transflash_elementor_template' ) );
            
        }

        public function transflash_elementor_template( $atts ){

            $atts = extract( shortcode_atts(
            array(
                'id'  => '',
            ), $atts) );

            $args = array(
                'id' => $id
                
            );

            if( did_action( 'elementor/loaded' ) ){
                return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );    
            }
            return;

            
        }

        

    }
}



return new Transflash_Shortcode();

