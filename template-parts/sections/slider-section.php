<?php
/**
 * Pritam Slider Function
 * @since Pritam 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $pritam_theme_options;
$slide_id = absint($pritam_theme_options['pritam-select-category']);
$args = array(
 'posts_per_page' => 3,
 'paged' => 1,
 'cat' => $slide_id,
 'post_type' => 'post'
);
?>

<section class="blog-section pb-5">
  <div class="container">
    <div class="blog-items main">
      <?php 
        $slider_query = new WP_Query($args);
        $count = $slider_query->post_count;
        if ($slider_query->have_posts()): 
      ?>
      <div class="layout-grid">
          <?php
            $i = 1;
            while ($slider_query->have_posts()) :
              $slider_query->the_post();
              if ($i == 1) {
            ?>
        
          <div class="blog-item main-style blog-left">
            <?php if(has_post_thumbnail()) { ?>
              <div class="blog-img">
                  <?php the_post_thumbnail('pritam-thumbnail-size'); ?>
                  <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                      echo '<a class="post-category" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                    }
                  ?>
              </div>
            <?php } else{ ?>
              <div class="no-image"></div>
            <?php } ?>
            
            <div class="blog-info">
              <h3 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <div class="met-soc">
                <ul class="meta">
                  <li><?php pritam_posted_on()?></li>
                  <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                </ul>
                  <?php 
                  //if( 1 == $social_share ){
                      do_action( 'pritam_social_sharing' ,get_the_ID() );
                  //}
                  ?>
              </div><!--met-soc end-->
            </div><!--blog-info end-->
          </div><!--blog-items end-->
        
        <?php
          } else {
              if ($i == 2) {
        ?>
        
          <?php
          }
          ?>
          <div class="blog-item blog-right">
            <?php if(has_post_thumbnail()) { ?>
              <div class="blog-img">
                  <?php the_post_thumbnail('pritam-thumbnail-size'); ?>
                  <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                      echo '<a class="post-category" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                    }
                  ?>
              </div>
            <?php } else{ ?>
              <div class="no-image"></div>
            <?php } ?>
            <div class="blog-info">
              <h3 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <div class="met-soc">
                <ul class="meta">
                  <li><?php pritam_posted_on()?></li>
                  <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                </ul>
              </div>
            </div><!--blog-info end-->
          </div><!--blog-items end-->
          <?php
          if ($i == $count) {
          ?>
        
        <?php
        }
        }
        $i++;
        endwhile;
        ?>
      </div>
      <?php endif;
        wp_reset_postdata(); ?>
    </div>
  </div>
</section>