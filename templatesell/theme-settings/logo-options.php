<?php 
/*Logo Section*/
$wp_customize->add_setting( 'pritam_options[pritam_logo_width_option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_logo_width_option'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'pritam_options[pritam_logo_width_option]', array(
   'label'     => __( 'Logo Width', 'pritam' ),
   'description' => __('Adjust the logo width. Minimum is 100px and maximum is 600px.', 'pritam'),
   'section'   => 'title_tagline',
   'settings'  => 'pritam_options[pritam_logo_width_option]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 100,
          'max' => 600,
        ),
) );