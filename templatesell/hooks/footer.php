<?php
/**
 * Goto Top functions
 *
 * @since Pritam 1.0.0
 *
 */

if (!function_exists('pritam_go_to_top')) :
    function pritam_go_to_top()
    {
    ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'pritam'); ?>">
                <i class="la la-arrow-up"></i>
            </a>
<?php
    } endif;
add_action('pritam_go_to_top_hook', 'pritam_go_to_top', 10, 1);