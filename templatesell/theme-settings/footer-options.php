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
