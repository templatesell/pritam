<?php
$GLOBALS['pritam_theme_options'] = pritam_get_options_value();

/*Header Options*/
$wp_customize->add_section('pritam_header_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Header Settings', 'pritam'),
    'panel' => 'pritam_panel',
));


/*Header Search Enable Option*/
$wp_customize->add_setting( 'pritam_options[pritam_enable_search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_enable_search'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
) );

$wp_customize->add_control( 'pritam_options[pritam_enable_search]', array(
    'label'     => __( 'Enable Search', 'pritam' ),
    'description' => __('It will help to display the search in Menu.', 'pritam'),
    'section'   => 'pritam_header_section',
    'settings'  => 'pritam_options[pritam_enable_search]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );