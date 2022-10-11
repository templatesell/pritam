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

/*Subscribe Text*/
$wp_customize->add_setting( 'pritam_options[pritam_subscribe_text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_subscribe_text'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'pritam_options[pritam_subscribe_text]', array(
    'label'     => __( 'Enter Subscribe Text', 'pritam' ),
    'description' => __('This is the text to add for subscribe form or email.', 'pritam'),
    'section'   => 'pritam_header_section',
    'settings'  => 'pritam_options[pritam_subscribe_text]',
    'type'      => 'text',
    'priority'  => 5,

) );

/*Subscribe Link*/
$wp_customize->add_setting( 'pritam_options[pritam_subscribe_link]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_subscribe_link'],
    'sanitize_callback' => 'esc_url_raw'
) );

$wp_customize->add_control( 'pritam_options[pritam_subscribe_link]', array(
    'label'     => __( 'Enter Link', 'pritam' ),
    'description' => __('Enter the valid link for subscribe.', 'pritam'),
    'section'   => 'pritam_header_section',
    'settings'  => 'pritam_options[pritam_subscribe_link]',
    'type'      => 'url',
    'priority'  => 5,

) );

/*Font awesome class name*/
$wp_customize->add_setting( 'pritam_options[pritam_subscribe_icon_name]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_subscribe_icon_name'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'pritam_options[pritam_subscribe_icon_name]', array(
    'label'     => __( 'Enter Icon Class Name', 'pritam' ),
    'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'Enter icon class like la la-envelope-o, la la-bell, la la-car etc. You can find more icons here in', 'pritam' ),
        esc_url('https://icons8.com/line-awesome'),
        __('Icons8 lists and icons name' , 'pritam'),
        __('so that you can use any icon from here.' ,'pritam')
    ),
    'section'   => 'pritam_header_section',
    'settings'  => 'pritam_options[pritam_subscribe_icon_name]',
    'type'      => 'text',
    'priority'  => 5,

) );