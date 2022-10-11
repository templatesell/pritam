<?php
$GLOBALS['pritam_theme_options'] = pritam_get_options_value();

/* Header Image Additional Options */
/*Enable Overlay on the Header Image Part*/
$wp_customize->add_setting( 'pritam_options[pritam_enable_header_image_overlay]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['pritam_enable_header_image_overlay'],
   'sanitize_callback' => 'pritam_sanitize_checkbox'
) );

$wp_customize->add_control(
    'pritam_options[pritam_enable_header_image_overlay]', 
    array(
       'label'     => __( 'Enable Header Image Overlay Color Height', 'pritam' ),
       'description' => __('This option will add colors over the header image.', 'pritam'),
       'section'   => 'header_image',
       'settings'  => 'pritam_options[pritam_enable_header_image_overlay]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );

/*callback functions slider getting from post*/
if ( !function_exists('pritam_header_overlay_color_active_callback') ) :
  function pritam_header_overlay_color_active_callback(){
      global $pritam_theme_options;
      $slider_overlay = absint($pritam_theme_options['pritam_enable_header_image_overlay']);
      if( $slider_overlay == 1 ){
          return true;
      }
      else{
          return false;
      }
  }
endif;  

/*Header Image Height*/
$wp_customize->add_setting( 'pritam_options[pritam_header_image_height]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_header_image_height'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'pritam_options[pritam_header_image_height]', array(
   'label'     => __( 'Header Image Min Height', 'pritam' ),
   'description' => __('Adjust the header image min height height. Minimum is 50px and maximum is 500px.', 'pritam'),
   'section'   => 'header_image',
   'settings'  => 'pritam_options[pritam_header_image_height]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 50,
          'max' => 500,
        ),
    'active_callback'=> 'pritam_header_overlay_color_active_callback',
) ); 

/* Select the color for the Overlay */
$wp_customize->add_setting( 'pritam_options[pritam_slider_overlay_color]',
    array(
        'default'           => $default['pritam_slider_overlay_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'pritam_options[pritam_slider_overlay_color]',
        array(
            'label'       => esc_html__( 'Header Image Overlay Color', 'pritam' ),
            'description' => esc_html__( 'It will add the color overlay of the Header image. To make it transparent, use the below option.', 'pritam' ),
            'section'     => 'header_image', 
            'priority'  => 15, 
            'active_callback'=> 'pritam_header_overlay_color_active_callback',
        )
    )
);

/*Overlay Range for transparent*/
$wp_customize->add_setting( 'pritam_options[pritam_slider_overlay_transparent]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam_slider_overlay_transparent'],
    'sanitize_callback' => 'pritam_sanitize_number'
) );
$wp_customize->add_control( 'pritam_options[pritam_slider_overlay_transparent]', array(
   'label'     => __( 'Header Image Overlay Color Transparent', 'pritam' ),
   'description' => __('You can make the overlay transparent using this option. Add range from 0.1 to 1.', 'pritam'),
   'section'   => 'header_image',
   'settings'  => 'pritam_options[pritam_slider_overlay_transparent]',
   'type'      => 'number',
   'priority'  => 15,
   'input_attrs' => array(
        'min' => '0.1',
        'max' => '1',
        'step' => '0.1',
    ),
   'active_callback' => 'pritam_header_overlay_color_active_callback',
) );