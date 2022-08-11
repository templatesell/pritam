<?php
/**
 * Social Sharing Hook *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('pritam_social_sharing')) :
    function pritam_social_sharing($post_id)
    {
        $pritam_url = get_the_permalink($post_id);
        $pritam_title = get_the_title($post_id);
        $pritam_image = get_the_post_thumbnail_url($post_id);
        
        //sharing url
        $pritam_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $pritam_title . '&url=' . $pritam_url);
        $pritam_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $pritam_url);
        $pritam_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $pritam_url . '&media=' . $pritam_image . '&description=' . $pritam_title);
        $pritam_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $pritam_title . '&url=' . $pritam_url);
        
        ?>
        
            <ul class="social-links">
                <li><a target="_blank" href="<?php echo $pritam_facebook_sharing_url; ?>"><i class="fab fa-facebook-f"></i></a></li>
                <li><a target="_blank" href="<?php echo $pritam_twitter_sharing_url; ?>"><i class="fab fa-twitter"></i></a></li>
                <li><a target="_blank" href="<?php echo $pritam_pinterest_sharing_url; ?>"><i class="fab fa-pinterest-p"></i></a></li>
                <li><a target="_blank" href="<?php echo $pritam_linkedin_sharing_url; ?>"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        
        <?php
    }
endif;
add_action('pritam_social_sharing', 'pritam_social_sharing', 10);