<?php
/**
 * Pritam Theme Customizer
 *
 * @package Pritam
 */

if ( !function_exists('pritam_default_theme_options_values') ) :

    function pritam_default_theme_options_values() {

        $default_theme_options = array(

          /*Logo Options*/
          'pritam_logo_width_option' => '600',

            /*Header Image*/
            'pritam_enable_header_image_overlay'=> 0,
            'pritam_slider_overlay_color'=> '#000000',
            'pritam_slider_overlay_transparent'=> '0.1',
            'pritam_header_image_height'=> '100',

           /*Header Options*/
            'pritam_enable_search'  => 0,
            'pritam_subscribe_text'=> esc_html__('SUBSCRIBE','pritam'),
            'pritam_subscribe_link'=> '#',
            'pritam_subscribe_icon_name'=> 'la la-envelope-o',

            /*Colors Options*/
            'pritam_primary_color'              => '#d42929',

            /*Slider Options*/
            'pritam_enable_slider'      => 1,
            'pritam-select-category'    => 0,
    
            /*Boxes Section */
            'pritam_enable_promo'       => 1,
            'pritam-promo-select-category'=> 0,
            
            /*Blog Page*/
            'pritam-sidebar-blog-page' => 'no-sidebar',
            'pritam-column-blog-page'  => 'one-column',
            'pritam-blog-image-layout' => 'full-image',
            'pritam-content-show-from' => 'excerpt',
            'pritam-excerpt-length'    => 25,
            'pritam-pagination-options'=> 'ajax',
            'pritam-blog-exclude-category'=> '',
            'pritam-read-more-text'    => '',
            'pritam-show-hide-share'   => 1,
            'pritam-show-hide-category'=> 1,
            'pritam-show-hide-date'=> 1,
            'pritam-show-hide-author'=> 1,

            /*Single Page */
            'pritam-single-page-featured-image' => 1,
            'pritam-single-page-related-posts'  => 0,
            'pritam-single-page-related-posts-title' => esc_html__('Related Posts','pritam'),
            'pritam-sidebar-single-page'=> 'single-right-sidebar',
            'pritam-single-social-share' => 1,


            /*Sticky Sidebar*/
            'pritam-enable-sticky-sidebar' => 0,

            /*Footer Section*/
            'pritam-footer-copyright'  => esc_html__('Copyright All Rights Reserved 2022','pritam'),
            'pritam_footer_top_recommendation'=> 0,
            'pritam_footer_you_may_like'=> 0,

            /*Breadcrumb Options*/
            'pritam-extra-breadcrumb' => 1,
            'pritam-breadcrumb-selection-option'=> 'theme',

        );
return apply_filters( 'pritam_default_theme_options_values', $default_theme_options );
}
endif;
/**
 *  Pritam Theme Options and Settings
 *
 * @since Pritam 1.0.0
 *
 * @param null
 * @return array pritam_get_options_value
 *
 */
if ( !function_exists('pritam_get_options_value') ) :
    function pritam_get_options_value() {
        $pritam_default_theme_options_values = pritam_default_theme_options_values();
        $pritam_get_options_value = get_theme_mod( 'pritam_options');
        if( is_array( $pritam_get_options_value )){
            return array_merge( $pritam_default_theme_options_values, $pritam_get_options_value );
        }
        else{
            return $pritam_default_theme_options_values;
        }
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pritam_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
         'selector'        => '.site-title a',
         'render_callback' => 'pritam_customize_partial_blogname',
     ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
         'selector'        => '.site-description',
         'render_callback' => 'pritam_customize_partial_blogdescription',
     ) );
  }
  $default = pritam_default_theme_options_values();

  require get_template_directory() . '/templatesell/theme-settings/theme-settings.php';

}
add_action( 'customize_register', 'pritam_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function pritam_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function pritam_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pritam_customize_preview_js() {
	wp_enqueue_script( 'pritam-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20200412', true );
}
add_action( 'customize_preview_init', 'pritam_customize_preview_js' );

/*
** Customizer Styles
*/
function pritam_panels_css() {
     wp_enqueue_style('pritam-customizer-css', get_template_directory_uri() . '/css/customizer-style.css', array(), '4.5.0');
}
add_action( 'customize_controls_enqueue_scripts', 'pritam_panels_css' );