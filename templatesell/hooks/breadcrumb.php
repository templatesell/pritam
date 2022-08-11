<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('pritam_breadcrumb_options')) :
    function pritam_breadcrumb_options()
    {
        global $pritam_theme_options;
        $breadcrumbs = absint($pritam_theme_options['pritam-extra-breadcrumb']);
        $breadcrumb_from = esc_attr($pritam_theme_options['pritam-breadcrumb-selection-option']);        

        if ( $breadcrumbs == 1 && $breadcrumb_from == 'theme' ) {
            pritam_breadcrumbs();
        }elseif($breadcrumbs == 1 &&  $breadcrumb_from == 'yoast' && (function_exists('yoast_breadcrumb'))){
            yoast_breadcrumb();
        }elseif($breadcrumbs == 1 && 'rankmath' == $breadcrumb_from && (function_exists('rank_math_the_breadcrumbs'))) {
          rank_math_the_breadcrumbs();
        }elseif($breadcrumbs == 1 && 'navxt' == $breadcrumb_from && (function_exists('bcn_display'))){
            bcn_display();
        }else{
            //do nothing
        }
    }
endif;
add_action('pritam_breadcrumb_options_hook', 'pritam_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('pritam_breadcrumbs')):
    function pritam_breadcrumbs()
    {
        if (!function_exists('pritam_breadcrumb_trail')) {
            require get_template_directory() . '/templatesell/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );        
        pritam_breadcrumb_trail($breadcrumb_args);
    }
endif;
add_action('pritam_breadcrumbs_hook', 'pritam_breadcrumbs');