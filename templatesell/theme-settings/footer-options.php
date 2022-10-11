<?php
/*Footer Options*/
$wp_customize->add_section('pritam_footer_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer Settings', 'pritam'),
    'panel' => 'pritam_panel',
));


/*Copyright Setting*/
$wp_customize->add_setting('pritam_options[pritam-footer-copyright]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('pritam_options[pritam-footer-copyright]', array(
    'label' => __('Copyright Text', 'pritam'),
    'description' => __('Enter your own copyright text.', 'pritam'),
    'section' => 'pritam_footer_section',
    'settings' => 'pritam_options[pritam-footer-copyright]',
    'type' => 'text',
    'priority' => 15,
));

/*Recommendation section*/
$wp_customize->add_setting( 'pritam_options[pritam_footer_top_recommendation]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_footer_top_recommendation'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Pritam_Customize_Category_Dropdown_Control(
        $wp_customize,
        'pritam_options[pritam_footer_top_recommendation]',
        array(
            'label'     => __( 'Category For Recommended Posts', 'pritam' ),
            'description' => __('From the dropdown select the category for the recommended section.', 'pritam'),
            'section'   => 'pritam_footer_section',
            'settings'  => 'pritam_options[pritam_footer_top_recommendation]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'pritam_promo_active_callback'
        )
    )
);


/*You may liked section*/
$wp_customize->add_setting( 'pritam_options[pritam_footer_you_may_like]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_footer_you_may_like'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Pritam_Customize_Category_Dropdown_Control(
        $wp_customize,
        'pritam_options[pritam_footer_you_may_like]',
        array(
            'label'     => __( 'Category For You May Like Posts', 'pritam' ),
            'description' => __('From the dropdown select the category for the you may like section.', 'pritam'),
            'section'   => 'pritam_footer_section',
            'settings'  => 'pritam_options[pritam_footer_you_may_like]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'pritam_promo_active_callback'
        )
    )
);