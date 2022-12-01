<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Pritam
 */
global $pritam_theme_options;
$social_share = absint($pritam_theme_options['pritam-single-social-share']);
$image = absint($pritam_theme_options['pritam-single-page-featured-image']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single-page-content">
        <div class="standard-post">
            <div class="blog-item">
                <div class="blog-info">
                    <?php
                        if ('post' === get_post_type()) :
                    ?>
                        <ul class="meta">
                            <li>
                                <?php pritam_entry_meta(); ?>
                            </li>
                            <li><?php pritam_posted_on(); ?></li>
                            <li><i class="la la-eye"></i><?php echo Pritam_GetPostViews(get_the_ID()); ?></li>
                            <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                        </ul>
                    <?php endif; ?>
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                </div><!--blog-info end-->
                <?php if($image == 1 ){ ?>
                    <div class="blog-img">
                        <?php pritam_post_thumbnail(); ?>
                    </div>
                <?php } ?>
                <div class="post-content">
                    <?php
                    the_content(sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pritam'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ));
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'pritam'),
                        'after' => '</div>',
                    
                    ));
                    ?>
                </div>
                <div class="post-catgs-links">
                    <div class="post-catgs-list">
                        <?php the_tags();  ?>
                    </div><!--post-catgs-list end-->
                    <?php 
                          do_action( 'pritam_social_sharing' ,get_the_ID() );
                      ?><!--social-links end-->
                    <div class="clearfix"></div>
                </div><!--post-catgs-links end-->
                <div class="post-author-info">
                    <div class="author-img">
                        <?php
                            global $post;
                            // Get the author ID    
                            $author_id = get_post_field('post_author' , $post->ID);  
                            $output = get_avatar_url($author_id);   
                            echo '<img src="'.esc_url($output).'"/>';
                        ?>
                    </div><!--author-img end-->
                    <div class="author-info">
                        <h3>
                            <a href="#" title=""><?php the_author(); ?></a>
                        </h3>
                        <p><?php the_author_meta('description'); ?></p>
                        <?php do_action('pritam_author_links'); ?>
                        
                    </div><!--author-info end-->
                </div><!--post-author-info end-->
                <div class="post-control">
                    <ul>
                        <?php $prevPost = get_previous_post(true);
                        if($prevPost) { ?>
                        <li class="prev-p">
                            <?php previous_post_link('%link',"<i class='fa fa-angle-left'></i>%title", TRUE); ?>  
                        </li>
                        <?php } ?>
                        <?php $nextPost = get_next_post(true);
                        if($nextPost) { ?>
                            <li class="next-p">
                                <?php next_post_link('%link',"<i class='fa fa-angle-right'></i>%title", TRUE); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div><!--post-control end-->
            </div>
        </div><!--standard-post end-->
        <?php 
            /**
             * pritam_related_posts hook
             * @since Pritam 1.0.0
             *
             * @hooked pritam_related_posts -  10
             */
            do_action( 'pritam_related_posts' ,get_the_ID() );
        ?>
        <?php comments_template( '', true );  ?>
    </div><!--single-page-content end-->
</article><!-- #post-<?php the_ID(); ?> -->