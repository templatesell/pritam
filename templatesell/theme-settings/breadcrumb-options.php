<?php 
/*Extra Options*/
$GLOBALS['pritam_theme_options'] = pritam_get_options_value();
$wp_customize->add_section( 'pritam_extra_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Settings', 'pritam' ),
    'panel'          => 'pritam_panel',
) );

/*Breadcrumb Enable*/
$wp_customize->add_setting( 'pritam_options[pritam-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['pritam-extra-breadcrumb'],
    'sanitize_callback' => 'pritam_sanitize_checkbox'
) );

$wp_customize->add_control( 'pritam_options[pritam-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'pritam' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'pritam' ),
    'section'   => 'pritam_extra_options',
    'settings'  => 'pritam_options[pritam-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions related posts*/
if (!function_exists('pritam_breadcrumb_callback')) :
    function pritam_breadcrumb_callback()
    {
        global $pritam_theme_options;
        $breadcrumb = absint($pritam_theme_options['pritam-extra-breadcrumb']);
        if (1 == $breadcrumb) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Select Breadcrumb From*/
$wp_customize->add_setting('pritam_options[pritam-breadcrumb-selection-option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['pritam-breadcrumb-selection-option'],
    'sanitize_callback' => 'pritam_sanitize_select'
));

$wp_customize->add_control('pritam_options[pritam-breadcrumb-selection-option]', array(
    'choices' => array(
        'theme' => __('Theme Default', 'pritam'),
        'yoast' => __('Yoast Plugin', 'pritam'),
        'rankmath' => __('Rank Math Plugin', 'pritam'),
        'navxt' => __('NavXT Plugin', 'pritam'),
    ),
    'label' => __('Select Breadcrumb From', 'pritam'),
    'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'You need to install and activate the respected plugin to show their Breadcrumb. Otherwise, your default theme Breadcrumb will appear. If you see error in search console, then we recommend to use plugin Breadcrumb. We recommend', 'pritam' ),
        esc_url('https://rankmath.com/?ref=templatesell'),
        __('Rank Math Plugin' , 'pritam'),
        __('for better SEO and optimization. Here we included an affiliate link to Rank Math Plugin. If you click on the link and buy the product, we’ll receive a small fee. No worries though, you’ll still pay the standard amount without any extra cost to you.' ,'pritam')
    ),
    'section' => 'pritam_extra_options',
    'settings' => 'pritam_options[pritam-breadcrumb-selection-option]',
    'type' => 'select',
    'priority' => 15,
    'active_callback'=>'pritam_breadcrumb_callback',
));