<?php

class Transflash_Elementor {
	
	public function __construct() {
		// Register Header Footer Category in Pane
	    add_action( 'elementor/elements/categories_registered', [ $this, 'transflash_add_category' ] );

	    // After register styles
	    add_action( 'elementor/frontend/after_register_styles', [ $this, 'transflash_enqueue_styles' ] );

	    // After register scripts
	    add_action( 'elementor/frontend/after_register_scripts', [ $this, 'transflash_enqueue_scripts' ] );
		
		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'transflash_include_widgets' ] );
		
		// Add new animations
		add_filter( 'elementor/controls/animations/additional_animations', [ $this, 'transflash_add_animations' ], 10 , 0 );

		// Enqueue footer scripts
		add_action( 'wp_print_footer_scripts', [ $this, 'transflash_enqueue_footer_scripts' ] );

		// Custom control style for icon list widget
		add_action( 'elementor/element/icon-list/section_icon_list/before_section_start', [ $this, 'transflash_icon_list_custom' ], 10, 2 );

		// Add new icons
		add_filter( 'elementor/icons_manager/additional_tabs', [ $this, 'transflash_icons_filters_new' ], 9999999, 1 );

		// Remove animations style from Elementor
		add_action( 'wp_enqueue_scripts', [ $this, 'transflash_remove_animations_styles' ] );
	}

	/**
	 * Add new category
	 */
	public function transflash_add_category() {
	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'hf',
	        [
	            'title' => esc_html__( 'Header Footer', 'transflash' ),
	            'icon' 	=> 'fa fa-plug'
	        ]
	    );

	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'transflash',
	        [
	            'title' => esc_html__( 'Transflash', 'transflash' ),
	            'icon' 	=> 'fa fa-plug'
	        ]
	    );

	}

	/**
	 * Widget social icons style
	 */
	public function transflash_enqueue_styles() {
		// Widget social icons
        if ( defined( 'ELEMENTOR_ASSETS_PATH' ) && defined( 'ELEMENTOR_ASSETS_URL' ) ) {
        	if ( file_exists( ELEMENTOR_ASSETS_PATH . 'css/widget-social-icons.min.css' ) ) {
                wp_enqueue_style( 'widget-social-icons', ELEMENTOR_ASSETS_URL . 'css/widget-social-icons.min.css', [], ELEMENTOR_VERSION );
            }
        }
	}

	/**
	 * Enqueue scripts
	 */
	public function transflash_enqueue_scripts() {
        $files = glob( get_theme_file_path( '/assets/js/elementor/*.js' ) );
        
        foreach ( $files as $file ) {
            $file_name = wp_basename( $file );
            $handle    = str_replace( ".js", '', $file_name );
            $src       = get_theme_file_uri( '/assets/js/elementor/' . $file_name );

            if ( file_exists( $file ) ) {
                wp_register_script( 'transflash-elementor-' . $handle, $src, ['jquery'], false, true );
            }
        }
	}

	/**
	 * Incluide widget files
	 */
	public function transflash_include_widgets( $widgets_manager ) {
        $files = glob( get_theme_file_path( 'elementor/widgets/*.php' ) );

        foreach ( $files as $file ) {
            $file = get_theme_file_path( 'elementor/widgets/' . wp_basename( $file ) );

            if ( file_exists( $file ) ) {
                require_once $file;
            }
        }
    }

    /**
     * Add new animations
     */
    public function transflash_add_animations() {
    	$animations = [
    		'Transflash' => [
            	'ova-move-up' 		=> esc_html__( 'Move Up', 'transflash' ),
                'ova-move-down' 	=> esc_html__( 'Move Down', 'transflash' ),
                'ova-move-left'     => esc_html__( 'Move Left', 'transflash' ),
                'ova-move-right'    => esc_html__( 'Move Right', 'transflash' ),
                'ova-scale-up'      => esc_html__( 'Scale Up', 'transflash' ),
                'ova-flip'          => esc_html__( 'Flip', 'transflash' ),
                'ova-helix'         => esc_html__( 'Helix', 'transflash' ),
                'ova-popup'			=> esc_html__( 'PopUp','transflash' )
            ]
    	];

        return $animations;
    }

    /**
     * Enqueue footer scripts
     */
	public function transflash_enqueue_footer_scripts() {
		// Font Icon
	    wp_enqueue_style('ovaicon', TRANSFLASH_URI.'/assets/libs/ovaicon/font/ovaicon.css', [], null);

	    // Iconly
	    wp_enqueue_style('iconly', TRANSFLASH_URI.'/assets/libs/iconly/css/style.css', [], null);

	    // Law Icon
	    wp_enqueue_style('transflash', TRANSFLASH_URI.'/assets/libs/transflash/font/flaticon.css', [], null);
	}
	
	/**
	 * Add new icons
	 */
	public function transflash_icons_filters_new( $tabs = [] ) {
		$icons = [];

		// Default
		$font_data['json_url'] = TRANSFLASH_URI.'/assets/libs/ovaicon/ovaicon.json';
		$font_data['name'] = 'ovaicon';

		$icons[ $font_data['name'] ] = [
			'name'          => $font_data['name'],
			'label'         => esc_html__( 'Default', 'transflash' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'ovaicon-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $font_data['json_url']
		];

		// Add Transflash Icon
		$transflash['json_url'] = TRANSFLASH_URI.'/assets/libs/transflash/transflash.json';
		$transflash['name'] 	= 'transflash';

		$icons[ $transflash['name'] ] = [
			'name'          => $transflash['name'],
			'label'         => esc_html__( 'Transflash', 'transflash' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'flaticon-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $transflash['json_url']
		];

		// Add Iconly
		$iconly['json_url'] = TRANSFLASH_URI.'/assets/libs/iconly/iconly.json';
		$iconly['name'] 	= 'iconly';

		$icons[ $iconly['name'] ] = [
			'name'          => $iconly['name'],
			'label'         => esc_html__( 'Iconly', 'transflash' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'iconly-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $iconly['json_url']
		];

		return array_merge( $tabs, $icons );
	}

	/**
	 * Icon list widget
	 */
    public function transflash_icon_list_custom( $element, $args ) {
		$element->start_controls_section(
			'ova_tabs',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Tabs', 'transflash' ),
			]
		);

			$element->add_responsive_control(
		        'list_item_padding',
		        [
		            'label' 		=> esc_html__( 'List Item Padding', 'transflash' ),
		            'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
		            'size_units' 	=> [ 'px', '%', 'em' ],
		            'selectors' 	=> [
		             '{{WRAPPER}}.elementor-widget .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		            ],
		         ]
		    );

		$element->end_controls_section();
	}
    
	/**
	 * Remove animations style from Elementor
	 */
	public function transflash_remove_animations_styles() {
		// Deregister the stylesheet by handle
	    foreach ( $this->transflash_add_animations() as $animations ) {
	    	if ( !empty( $animations ) && is_array( $animations ) ) {
	    		foreach ( array_keys( $animations ) as $animation ) {
	    			wp_deregister_style( 'e-animation-'.$animation );
	    			wp_enqueue_style( 'e-animation-'.$animation, TRANSFLASH_URI.'/assets/scss/none.css', array(), null);
	    		}
	    	}
	    }
	}
}

return new Transflash_Elementor();





