<?php
/**
 * Add sidebar class in body
 *
 * @since Pritam 1.0.0
 *
 */

add_filter('body_class', 'pritam_body_class');
function pritam_body_class($classes)
{
    $classes[] = 'at-sticky-sidebar';
    global $pritam_theme_options;
    
    // if (is_singular()) {
    //     $sidebar = $pritam_theme_options['pritam-sidebar-single-page'];
    //     if ($sidebar == 'single-no-sidebar') {
    //         $classes[] = 'single-no-sidebar';
    //     } elseif ($sidebar == 'single-left-sidebar') {
    //         $classes[] = 'single-left-sidebar';
    //     } elseif ($sidebar == 'single-middle-column') {
    //         $classes[] = 'single-middle-column';
    //     } else {
    //         $classes[] = 'single-right-sidebar';
    //     }
    // }
    
    $sidebar = $pritam_theme_options['pritam-sidebar-blog-page'];
    if ($sidebar == 'no-sidebar') {
        $classes[] = 'no-sidebar';
    } elseif ($sidebar == 'left-sidebar') {
        $classes[] = 'left-sidebar';
    // } elseif ($sidebar == 'middle-column') {
    //     $classes[] = 'middle-column';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}

/**
 * Add layout class in body
 *
 * @since Pritam 1.0.0
 *
 */

add_filter('body_class', 'pritam_layout_body_class');
function pritam_layout_body_class($classes)
{
    global $pritam_theme_options;
    $layout = $pritam_theme_options['pritam-column-blog-page'];
    if ($layout == 'masonry-post') {
        $classes[] = 'masonry-post';
    } else {
        $classes[] = 'one-column';
    }    
    return $classes;
}


/**
 * Filter to hide text Category from category page
 *
 * @since Pritam 1.0.9
 *
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});