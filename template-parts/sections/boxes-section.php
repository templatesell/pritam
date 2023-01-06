<?php
/**
 * Pritam Promo Unique
 * @since Pritam 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $pritam_theme_options;
$promo_cat = absint($pritam_theme_options['pritam-promo-select-category']);
$featured_stories = esc_html($pritam_theme_options['pritam_featured_stories_text']);

if( $promo_cat > 0 )
{ ?>
    <section class="blog-section feat-stors pb-5">
            <div class="container">
                <div class="sec-title">
                    <h3><?php echo esc_html($featured_stories); ?> </h3>
                </div><!--sec-title end-->
                <div class="blog-items">
                    <div class="row">
                        <?php
                    $args = array(
                        'cat' => $promo_cat,
                        'posts_per_page' => 4,
                        'order'=> 'DESC'
                    );
                    
                    $query = new WP_Query($args);
                    
                    if($query->have_posts()):                        
                        while($query->have_posts()):
                            $query->the_post();
                            ?>                
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="blog-item">
                                <?php if(has_post_thumbnail()) { ?>
                                  <div class="blog-img">
                                      <?php the_post_thumbnail('pritam-thumbnail-size'); ?>
                                  </div>
                                <?php } ?><!--blog-img end-->
                                <div class="blog-info">
                                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <ul class="meta">
                                        <li><?php pritam_posted_on(); ?></li>
                                        <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                                    </ul>
                                </div><!--blog-info end-->
                            </div><!--blog-item end-->
                        </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                </div><!--blog-items end-->
            </div>
        </section><!--blog-section end-->

<?php   }