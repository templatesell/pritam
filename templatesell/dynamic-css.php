<?php
/**
 * Dynamic css
 *
 * @since Pritam 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('pritam_dynamic_css')) :

    function pritam_dynamic_css()
    {
        global $pritam_theme_options;

        /* Color Options Options */
        $pritam_primary_color              = esc_attr($pritam_theme_options['pritam_primary_color']);
        $pritam_logo_width              = absint($pritam_theme_options['pritam_logo_width_option']);
        
        $pritam_header_overlay  = esc_attr($pritam_theme_options['pritam_slider_overlay_color']);
        $pritam_header_transparent  = esc_attr($pritam_theme_options['pritam_slider_overlay_transparent']);
        $pritam_header_min_height              = absint($pritam_theme_options['pritam_header_image_height']);

        $custom_css = '';

        //Primary  Background 
        if (!empty($pritam_primary_color)) {
            $custom_css .= "
            .social-links li a:before,
            .social-links li a:after,
            .page-numbers.current,
            .page-numbers:hover,
            .cont-form-sec form input[type='submit'],
            .children li a:before,
            .sub-menu li a:before,
            .blobs .blob-center,
            .show-more,
            .post-control ul li:hover,
            .comment-respond .form-submit input[type='submit'],
            .blob{ 
                background-color: ". $pritam_primary_color."; 
            }";

        }
        //Primary Color
        if (!empty($pritam_primary_color)) {
            $custom_css .= "
            #author:active, 
            #email:active, 
            #url:active, 
            #comment:active, 
            #author:focus, 
            #email:focus, 
            #url:focus, 
            #comment:focus,
            #author:hover, 
            #email:hover, 
            #url:hover, 
            #comment:hover{
                border-color:".$pritam_primary_color.";
            }";
         }
        //Primary Color
        if (!empty($pritam_primary_color)) {
            $custom_css .= "
            a, 
            nav ul li a:hover, 
            a.subscribe-btn,
            nav ul li.current-menu-item a,
            .subscribe-btn:hover,
            .blog-info .post-category,
            .children li a:hover,
            .sub-menu li a:hover{ 
                color : ". $pritam_primary_color."; 
            }";
        }

        //Logo Width
        if (!empty($pritam_logo_width)) {
            $custom_css .= "
            .header-1 .head_one .logo{ 
                max-width : ". $pritam_logo_width."px; 
            }";
        }

        //Header Overlay
        if (!empty($pritam_header_overlay)) {
            $custom_css .= "
            .header-image:before { 
                background-color : ". $pritam_header_overlay."; 
            }";
        }

        //Header Tranparent
        if (!empty($pritam_header_transparent)) {
            $custom_css .= "
            .header-image:before { 
                opacity : ". $pritam_header_transparent."; 
            }";
        }

        //Header Min Height
        if (!empty($pritam_header_min_height)) {
            $custom_css .= "
            .header-image{ 
                min-height : ". $pritam_header_min_height."px; 
            }";
        }

        wp_add_inline_style('pritam-responsive-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'pritam_dynamic_css', 99);