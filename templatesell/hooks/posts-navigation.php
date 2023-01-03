<?php
/**
 * Post Navigation Function
 *
 * @since Pritam 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('pritam_posts_navigation')) :
    function pritam_posts_navigation()
    {
            echo "<div class='n-pagination text-center'><nav aria-label='Page navigation example'><div class='pagination justify-content-center'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('<i class="fa fa-angle-left"></i>', 'pritam'),
                'next_text' => __('<i class="fa fa-angle-right"></i>', 'pritam'),
            ));
            echo "<div>";    
    }
endif;
add_action('pritam_action_navigation', 'pritam_posts_navigation', 10);