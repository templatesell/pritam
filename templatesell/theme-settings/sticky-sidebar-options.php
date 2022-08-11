<?php 
/*Sticky Sidebar*/
$wp_customize->add_section( 'pritam_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar Settings', 'pritam' ),
   'panel' 		 => 'pritam_panel',
) );

/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'pritam_options[pritam-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam-enable-sticky-sidebar'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
) );

$wp_customize->add_control( 'pritam_options[pritam-enable-sticky-sidebar]', array(
    'label'     => __( 'Enable Sticky Sidebar', 'pritam' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'pritam'),
    'section'   => 'pritam_sticky_sidebar',
    'settings'  => 'pritam_options[pritam-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );