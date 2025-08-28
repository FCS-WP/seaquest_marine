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



add_action( 'cmb2_init', 'ova_career_metaboxes' );
function ova_career_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'ova_career_met_';
    
    /* Career Settings ***************************************************************************/
    /* ************************************************************************************/
    $career_settings = new_cmb2_box( array(
        'id'            => 'ovacareer_settings',
        'title'         => esc_html__( 'Career settings', 'ova-career' ),
        'object_types'  => array( 'ova_career'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );

        // Carerr Details Image
        $career_settings->add_field( array(
            'name'       => esc_html__( 'Career Detail Thumbnail', 'ova-career' ),
            'description' => esc_html__( 'Use in Career Detail', 'ova-career' ),
            'id'         => $prefix . 'career_img',
            'type'    => 'file',
            'query_args' => array(
                'type' => array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ),
            ),
        ) );

        // Offered Salary
        $career_settings->add_field( array(
            'name'       => esc_html__( 'Offered Salary', 'ova-career' ),
            'id'         => $prefix . 'salary',
            'type'    => 'text',
        ) );

        // Availability
        $career_settings->add_field( array(
            'name'       => esc_html__( 'Availability', 'ova-career' ),
            'id'         => $prefix . 'availability',
            'type'    => 'text',
        ) );

        // Vacancy
        $career_settings->add_field( array(
            'name' => esc_html__( 'Vacancy', 'ova-career' ),
            'id'   => $prefix . 'vacancy',
            'type' => 'text',
            'attributes' => array(
                'type' => 'number',
            ),
        ) );

        // Experience
        $career_settings->add_field( array(
            'name' => esc_html__( 'Experience', 'ova-career' ),
            'description' => esc_html__( 'Use in Career Detail', 'ova-career' ),
            'id'   => $prefix . 'exp',
            'type' => 'text',
        ) );

        // Age
        $career_settings->add_field( array(
            'name' => esc_html__( 'Age', 'ova-career' ),
            'description' => esc_html__( 'Use in Career Detail', 'ova-career' ),
            'id'   => $prefix . 'age',
            'type' => 'text',
        ) );

        // Gender
        $career_settings->add_field( array(
            'name' => esc_html__( 'Gender', 'ova-career' ),
            'description' => esc_html__( 'Use in Career Detail', 'ova-career' ),
            'id'   => $prefix . 'gender',
            'type' => 'text',
        ) );

        // Qualification
        $career_settings->add_field( array(
            'name' => esc_html__( 'Qualification', 'ova-career' ),
            'description' => esc_html__( 'Use in Career Detail', 'ova-career' ),
            'id'   => $prefix . 'qualification',
            'type' => 'text',
        ) );

        // Job Description
        $career_settings->add_field( array(
            'name'       => esc_html__( 'Job Description', 'ova-career' ),
            'description' => esc_html__( 'Use in Career Detail', 'ova-career' ),
            'id'         => $prefix . 'job_des',
            'type'    => 'wysiwyg',
        ) );  

        // Benefits: 
        $group_benefits = $career_settings->add_field( array(
            'id'          => $prefix . 'group_benefits',
            'type'        => 'group',
            'description' => esc_html__( 'Benefits', 'ova-career' ),
            'options'     => array(
                'group_title'       => esc_html__( 'Benefits', 'ova-career' ), 
                'add_button'        => esc_html__( 'Add Benefits', 'ova-career' ),
                'remove_button'     => esc_html__( 'Remove', 'ova-career' ),
                'sortable'          => true, 
            ),
        ) );

         $career_settings->add_group_field( $group_benefits, array(
            'name' => esc_html__( 'Description', 'ova-career' ),
            'id'   => $prefix . 'benefits_des',
            'type' => 'text',
        ) );   

        // Responsibility 
        $group_responsibility = $career_settings->add_field( array(
            'id'          => $prefix . 'group_responsibility',
            'type'        => 'group',
            'description' => esc_html__( 'Responsibility', 'ova-career' ),
            'options'     => array(
                'group_title'       => esc_html__( 'Responsibility', 'ova-career' ), 
                'add_button'        => esc_html__( 'Add Responsibility', 'ova-career' ),
                'remove_button'     => esc_html__( 'Remove', 'ova-career' ),
                'sortable'          => true, 
            ),
        ) );

        $career_settings->add_group_field( $group_responsibility, array(
            'name' => esc_html__( 'Description', 'ova-career' ),
            'id'   => $prefix . 'responsibility_des',
            'type' => 'text',
        ) );

        // Skill 
        $group_skill = $career_settings->add_field( array(
            'id'          => $prefix . 'group_skill',
            'type'        => 'group',
            'description' => esc_html__( 'Skill', 'ova-career' ),
            'options'     => array(
                'group_title'       => esc_html__( 'Skill', 'ova-career' ), 
                'add_button'        => esc_html__( 'Add Skill', 'ova-career' ),
                'remove_button'     => esc_html__( 'Remove', 'ova-career' ),
                'sortable'          => true, 
            ),
        ) );

        $career_settings->add_group_field( $group_skill, array(
            'name' => esc_html__( 'Description', 'ova-career' ),
            'description' => esc_html__( 'Use in Career Detail', 'ova-career' ),
            'id'   => $prefix . 'skill_des',
            'type' => 'text',
        ) );

        // Link Apply for this job 
        $career_settings->add_field( array(
            'name' => esc_html__( 'Link to Apply', 'ova-career' ),
            'description' => esc_html__( 'Link used in Career Detail for Apply Career Button (Prioritize)', 'ova-career' ),
            'id'   => $prefix . 'link_apply_career',
            'type' => 'text_url',
        ) );

        // Shortcode form apply career
        $career_settings->add_field( array(
            'name' => esc_html__( 'Shortcode', 'ova-career' ),
            'description' => esc_html__( 'Instead of using the link you can enter the Shortcode Contact Form', 'ova-career' ),
            'id'   => $prefix . 'shortcode',
            'type' => 'text',
        ) );

        $career_settings->add_field( array(
            'name'       => esc_html__( 'Sort Order', 'ova-career' ),
            'id'         => $prefix . 'order_career',
            'desc' => esc_html__( 'Insert Number', 'ova-career' ),
            'type'    => 'text',
            'default' =>'1',
        ) );

}

