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
        global $pritam_theme_options;
        $pritam_pagination_option = $pritam_theme_options['pritam-pagination-options'];
        if ('numeric' == $pritam_pagination_option) {
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
        } elseif ('ajax' == $pritam_pagination_option) {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            if(paginate_links()) {
            echo "<div class='ajax-pagination text-center'><div class='show-more' data-number='$output_page'><i class='fa fa-refresh'></i>" . __('View More', 'pritam') . "</div><div id='free-temp-post'></div></div>";
            }
        } else {
            return false;
        }
    }
endif;
add_action('pritam_action_navigation', 'pritam_posts_navigation', 10);