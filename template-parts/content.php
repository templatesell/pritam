<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pritam
 */
global $pritam_theme_options;
$show_content_from = esc_attr($pritam_theme_options['pritam-content-show-from']);

?>
<div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
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
                <ul class="meta">
                    <li><?php pritam_posted_on()?></li>
                    <li><i class="la la-eye"></i><?php echo Pritam_GetPostViews(get_the_ID()); ?></li>
                    <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                </ul>
                <?php
                    if (is_singular()) :
                        the_title('<h3 class="post-title entry-title">', '</h3>');
                    else :
                        the_title('<h3 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                        ?>
                <?php endif; ?>
                <?php
                if (is_singular()) {
                    the_content();
                } else {
                    if ($show_content_from == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                }
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'pritam'),
                    'after' => '</div>',
                ));
                ?>
                
            </div><!--blog-info end-->
        </div><!--blog-item end-->
    </article><!-- #post- -->
 </div>



