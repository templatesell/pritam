<?php
/*Promo Section Options*/
$GLOBALS['pritam_theme_options'] = pritam_get_options_value();

$wp_customize->add_section( 'pritam_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Featured Stories Section', 'pritam' ),
    'panel'          => 'pritam_panel',
) );

/*callback functions slider*/
if ( !function_exists('pritam_promo_active_callback') ) :
    function pritam_promo_active_callback(){
        global $pritam_theme_options;
        $enable_promo = absint($pritam_theme_options['pritam_enable_promo']);
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Boxes Enable Option*/
$wp_customize->add_setting( 'pritam_options[pritam_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_enable_promo'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
) );

$wp_customize->add_control( 'pritam_options[pritam_enable_promo]', array(
    'label'     => __( 'Enable Boxes', 'pritam' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'pritam'),
    'section'   => 'pritam_promo_section',
    'settings'  => 'pritam_options[pritam_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Featured Stories Text*/
$wp_customize->add_setting( 'pritam_options[pritam_featured_stories_text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_featured_stories_text'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'pritam_options[pritam_featured_stories_text]', array(
    'label'     => __( 'Featured Stories Text', 'pritam' ),
    'description' => __('Enter the text for the featured stories.', 'pritam'),
    'section'   => 'pritam_promo_section',
    'settings'  => 'pritam_options[pritam_featured_stories_text]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=>'pritam_promo_active_callback'

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'pritam_options[pritam-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Pritam_Customize_Category_Dropdown_Control(
        $wp_customize,
        'pritam_options[pritam-promo-select-category]',
        array(
            'label'     => __( 'Category For Boxes', 'pritam' ),
            'description' => __('From the dropdown select the category for the boxes. Category having post will display in below boxes section.', 'pritam'),
            'section'   => 'pritam_promo_section',
            'settings'  => 'pritam_options[pritam-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'pritam_promo_active_callback'
        )
    )
);