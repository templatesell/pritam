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
$read_more = esc_html($pritam_theme_options['pritam-read-more-text']);
$masonry = esc_attr($pritam_theme_options['pritam-column-blog-page']);
$image_location = esc_attr($pritam_theme_options['pritam-blog-image-layout']);
$social_share = absint($pritam_theme_options['pritam-show-hide-share']);
$date = absint($pritam_theme_options['pritam-show-hide-date']);
$category = absint($pritam_theme_options['pritam-show-hide-category']);
$author = absint($pritam_theme_options['pritam-show-hide-author']);

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
                <?php
                    if (is_singular()) :
                        the_title('<h3 class="post-title entry-title">', '</h3>');
                    else :
                        the_title('<h3 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                        ?>
                <?php endif; ?>
                <ul class="meta">
                    <li><?php pritam_posted_on()?></li>
                    <li><i class="la la-eye"></i><?php echo getPritamPostViews(get_the_ID()); ?></li>
                    <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                </ul>
            </div><!--blog-info end-->
        </div><!--blog-item end-->
    </article><!-- #post- -->
 </div>



