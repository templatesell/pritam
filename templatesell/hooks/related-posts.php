<?php
/**
 * Display related posts from same category
 *
 * @since Pritam 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('pritam_related_post')) :
    
    function pritam_related_post($post_id)
    {
        
        global $pritam_theme_options;
        $title = esc_html($pritam_theme_options['pritam-single-page-related-posts-title']);
        if (0 == $pritam_theme_options['pritam-single-page-related-posts']) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) {
                ?>
                <div class="blog-section tp-pst">
                    <div class="sec-title">
                        <h3><?php echo $title; ?></h3>
                    </div><!--sec-title end-->
                    <div class="blog-items">
                        <div class="row">
                            <?php
                            $pritam_cat_post_args = array(
                                'category__in' => $category_ids,
                                'post__not_in' => array($post_id),
                                'post_type' => 'post',
                                'posts_per_page' => 2,
                                'post_status' => 'publish',
                                'ignore_sticky_posts' => true
                            );
                            $pritam_featured_query = new WP_Query($pritam_cat_post_args);
                            
                            while ($pritam_featured_query->have_posts()) : $pritam_featured_query->the_post();
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="blog-item">
                                    <?php
                                    if (has_post_thumbnail() ):
                                        ?>
                                        <div class="blog-img">
                                            <?php the_post_thumbnail('pritam-related-post-thumbnails'); ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                    
                                    <div class="blog-info">
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <ul class="meta">
                                            <li><?php pritam_posted_on()?></li>
                                            <li><i class="la la-eye"></i><?php echo getPritamPostViews(get_the_ID()); ?></li>
                                            <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                                        </ul>
                                    </div><!--blog-info end-->
                                </div><!--blog-item end-->
                            </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div><!--blog-items end-->
                </div><!--blog-section top-post end-->
                <?php
            }
        }
    }
endif;
add_action('pritam_related_posts', 'pritam_related_post', 10, 1);