<?php   
/**
 * Masonry Start Class and Id functions
 *
 * @since Pritam 1.0.0
 *
 */
if (!function_exists('pritam_masonry_start')) :
    function pritam_masonry_start()
    {
        global $pritam_theme_options;
        $is_masonry =  esc_attr($pritam_theme_options['pritam-column-blog-page']);
            if($is_masonry == 'masonry-post'){
            ?>
                <div class="masonry-start"><div id="masonry-loop">
            
            <?php
        }
    }
endif;
add_action('pritam_masonry_start_hook', 'pritam_masonry_start', 10, 1);

/**
 * Masonry end Div
 *
 * @since Pritam 1.0.0
 *
 */
if (!function_exists('pritam_masonry_end')) :
    function pritam_masonry_end()
    { 
        global $pritam_theme_options;
            $is_masonry =  esc_attr($pritam_theme_options['pritam-column-blog-page']);
                if($is_masonry == 'masonry-post'){
            ?>
                </div>
                </div>
            
            <?php
        }
    }
endif;
add_action('pritam_masonry_end_hook', 'pritam_masonry_end', 10, 1);