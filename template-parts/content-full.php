<div class="blog-section">
        <div class="blog-items main">
            <div class="blog-item main-style">
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
                    <div class="met-soc">
                        <ul class="meta">
                            <li><?php pritam_posted_on()?></li>
                            <li><i class="la la-eye"></i><?php echo getPritamPostViews(get_the_ID()); ?></li>
                            <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
                        </ul>
                          <?php 
                          //if( 1 == $social_share ){
                              do_action( 'pritam_social_sharing' ,get_the_ID() );
                          //}
                          ?>
                        </ul>
                    </div><!--met-soc end-->
                </div><!--blog-info end-->
            </div><!--blog-items end-->
        </div><!--blog-items end-->
    </div>