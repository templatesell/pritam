<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pritam
 */
global $pritam_theme_options;
$masonry = esc_attr($pritam_theme_options['pritam-column-blog-page']);
$image_location = esc_attr($pritam_theme_options['pritam-blog-image-layout']);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($masonry); ?>>    
    <div class="blog-section mb-5">  
        <div class="blog-items style2">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="blog-item">
                        <?php if(has_post_thumbnail()) { ?>
                          <div class="blog-img">
                              <?php the_post_thumbnail('pritam-thumbnail-size'); ?>
                          </div><!--blog-img end-->
                        <?php } ?>
                        <div class="blog-info">
                            <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                  echo '<a class="post-category" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                                }
                            ?>
                            <?php the_title(sprintf('<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                            <ul class="meta">
                                <li><?php pritam_posted_on()?></li>
                                <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                            </ul>
                        </div><!--blog-info end-->
                    </div><!--blog-item end-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="blog-item">
                        <?php if(has_post_thumbnail()) { ?>
                          <div class="blog-img">
                              <?php the_post_thumbnail('pritam-thumbnail-size'); ?>
                          </div><!--blog-img end-->
                        <?php } ?>
                        <div class="blog-info">
                            <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                  echo '<a class="post-category" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                                }
                            ?>
                            <?php the_title(sprintf('<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

                            <ul class="meta">
                                <li><?php pritam_posted_on()?></li>
                                <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                            </ul>
                        </div><!--blog-info end-->
                    </div><!--blog-item end-->
                </div>
            </div>
        </div><!--blog-items end-->
    </div><!--blog-section end-->
</article><!-- #post- -->

