<?php
/*Slider Options*/
$GLOBALS['pritam_theme_options'] = pritam_get_options_value();

$wp_customize->add_section( 'pritam_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Slider Settings', 'pritam' ),
   'panel' 		 => 'pritam_panel',
) );

/*callback functions slider*/
if ( !function_exists('pritam_slider_active_callback') ) :
  function pritam_slider_active_callback(){
      global $pritam_theme_options;
      $enable_slider = absint($pritam_theme_options['pritam_enable_slider']);
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Enable Option*/
$wp_customize->add_setting( 'pritam_options[pritam_enable_slider]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['pritam_enable_slider'],
   'sanitize_callback' => 'pritam_sanitize_checkbox'
) );

$wp_customize->add_control(
    'pritam_options[pritam_enable_slider]', 
    array(
       'label'     => __( 'Enable Slider', 'pritam' ),
       'description' => __('You can select the category for the slider below. More Options are available on premium version.', 'pritam'),
       'section'   => 'pritam_slider_section',
       'settings'  => 'pritam_options[pritam_enable_slider]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );        

/*Slider Category Selection*/
$wp_customize->add_setting( 'pritam_options[pritam-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Pritam_Customize_Category_Dropdown_Control(
        $wp_customize,
        'pritam_options[pritam-select-category]',
        array(
            'label'     => __( 'Select Category For Slider', 'pritam' ),
            'description' => __('Choose one category to show the slider. More settings are in pro version.', 'pritam'),
            'section'   => 'pritam_slider_section',
            'settings'  => 'pritam_options[pritam-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'pritam_slider_active_callback',
        )
    )

);