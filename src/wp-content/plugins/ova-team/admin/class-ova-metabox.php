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



add_action( 'cmb2_init', 'ova_team_metaboxes' );
function ova_team_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'ova_team_met_';
    
    /* Team Settings ***************************************************************************/
    /* ************************************************************************************/
    $team_settings = new_cmb2_box( array(
        'id'            => 'ovateam_settings',
        'title'         => esc_html__( 'Team settings', 'ova-team' ),
        'object_types'  => array( 'team'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );

        // Avata
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Avatar', 'ova-team' ),
            'description' => esc_html__( 'Use in Team Detail', 'ova-team' ),
            'id'         => $prefix . 'avatar',
            'type'    => 'file',
            'query_args' => array(
                'type' => array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ),
            ),
        ) );


        // Job
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Job', 'ova-team' ),
            'id'         => $prefix . 'job',
            'type'    => 'text',
        ) );
       
        // Email
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Email', 'ova-team' ),
            'id'         => $prefix . 'email',
            'type' => 'text_email',
        ) );

        // Phone
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Phone', 'ova-team' ),
            'id'         => $prefix . 'phone',
            'type'    => 'text',
        ) );

        // Address
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Address', 'ova-team' ),
            'id'         => $prefix . 'address',
            'type'    => 'text',
        ) );

        $team_settings->add_field( array(
            'name'       => esc_html__( 'Link Address', 'ova-team' ),
            'id'         => $prefix . 'link_address',
            'type'    => 'text_url',
        ) );


        // Social
        $group_icon = $team_settings->add_field( array(
            'id'          => $prefix . 'group_icon',
            'type'        => 'group',
            'description' => esc_html__( 'List Social', 'ova-team' ),
            'options'     => array(
                'group_title'       => esc_html__( 'Social', 'ova-team' ), 
                'add_button'        => esc_html__( 'Add Social', 'ova-team' ),
                'remove_button'     => esc_html__( 'Remove', 'ova-team' ),
                'sortable'          => true,
               
            ),
        ) );

        $team_settings->add_group_field( $group_icon, array(
            'name' => esc_html__( 'Class icon social', 'ova-team' ),
            'id'   => $prefix . 'class_icon_social',
            'type' => 'text',
        ) );


         $team_settings->add_group_field( $group_icon, array(
            'name' => esc_html__( 'Link social', 'ova-team' ),
            'id'   => $prefix . 'link_social',
            'type' => 'text_url',
        ) );

        // Excerpt 1
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Excerpt 1', 'ova-team' ),
            'id'         => $prefix . 'excerpt_1',
            'type'    => 'wysiwyg',
        ) );

        // Achievements
        $group_achievements = $team_settings->add_field( array(
            'id'          => $prefix . 'group_achievements',
            'type'        => 'group',
            'description' => esc_html__( 'Achievements', 'ova-team' ),
            'options'     => array(
                'group_title'       => esc_html__( 'Achievements', 'ova-team' ), 
                'add_button'        => esc_html__( 'Add Achievements', 'ova-team' ),
                'remove_button'     => esc_html__( 'Remove', 'ova-team' ),
                'sortable'          => true,
               
            ),
        ) );

         $team_settings->add_group_field( $group_achievements, array(
            'name' => esc_html__( 'Topic', 'ova-team' ),
            'id'   => $prefix . 'achi_topic',
            'type' => 'text',
        ) );       

        $team_settings->add_group_field( $group_achievements, array(
            'name' => esc_html__( 'Percent', 'ova-team' ),
            'id'   => $prefix . 'achi_percent',
            'type' => 'text',
            'attributes' => array(
                'type' => 'number',
            ),
        ) );

        // Experience excerpt 1
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Experience 1', 'ova-team' ),
            'id'         => $prefix . 'experience_1',
            'type'    => 'wysiwyg',
        ) );

        // Experience
        $group_experience = $team_settings->add_field( array(
            'id'          => $prefix . 'group_experience',
            'type'        => 'group',
            'description' => esc_html__( 'Experience', 'ova-team' ),
            'options'     => array(
                'group_title'       => esc_html__( 'Experience', 'ova-team' ), 
                'add_button'        => esc_html__( 'Add Experience', 'ova-team' ),
                'remove_button'     => esc_html__( 'Remove', 'ova-team' ),
                'sortable'          => true,
               
            ),
        ) );

         $team_settings->add_group_field( $group_experience, array(
            'name' => esc_html__( 'Year', 'ova-team' ),
            'id'   => $prefix . 'exp_year',
            'type' => 'text',
        ) );       

        $team_settings->add_group_field( $group_experience, array(
            'name' => esc_html__( 'Description', 'ova-team' ),
            'id'   => $prefix . 'exp_desc',
            'type' => 'text',
        ) );

        // Experience excerpt 2
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Experience 2', 'ova-team' ),
            'id'         => $prefix . 'experience_2',
            'type'    => 'wysiwyg',
        ) );


        $team_settings->add_field( array(
            'name'       => esc_html__( 'Sort Order', 'ova-team' ),
            'id'         => $prefix . 'order_team',
            'desc' => esc_html__( 'Insert Number', 'ova-team' ),
            'type'    => 'text',
            'default' =>'1',
        ) );


    }

