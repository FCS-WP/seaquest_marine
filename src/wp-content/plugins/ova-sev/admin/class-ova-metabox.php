<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */



add_action( 'cmb2_init', 'ova_sev_metaboxes' );
function ova_sev_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'ova_sev_met_';
    
    /* Team Settings ***************************************************************************/
    /* ************************************************************************************/
    $sev_settings = new_cmb2_box( array(
        'id'            => 'ovasev_settings',
        'title'         => esc_html__( 'Service settings', 'ova-sev' ),
        'object_types'  => array( 'ova_sev'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );


        $sev_settings->add_field( array(
            'name'       => esc_html__( 'Thumbnail', 'ova-sev' ),
            'id'         => $prefix . 'thumbnail',
            'type'    => 'file',
            'query_args' => array(
                'type' => array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ),
            ),
            'description' =>'Image displayed in Service Archive',
        ) );

         $sev_settings->add_field( array(
            'name'       => esc_html__( 'Sort Order', 'ova-sev' ),
            'id'         => $prefix . 'order_sev',
            'desc' => esc_html__( 'Insert Number', 'ova-sev' ),
            'type'    => 'text',
            'default' =>'1',
        ) );

}

