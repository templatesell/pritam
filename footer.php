<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pritam
 */
global $pritam_theme_options;
$enable_header = absint($pritam_theme_options['pritam_enable_top_header']);
$enable_menu   = absint($pritam_theme_options['pritam_enable_top_header_menu']);
$enable_social = absint($pritam_theme_options['pritam_enable_top_header_social']);

$copyright = wp_kses_post($pritam_theme_options['pritam-footer-copyright']);
if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) {
	$count = 0;
	for ( $i = 1; $i <= 4; $i++ )
	{
		if ( is_active_sidebar( 'footer-' . $i ) )
		{
			$count++;
		}
	}
	
	$footer_col= 4;
	if( $count == 4 )
	{
		$footer_col= 4;
	}
	elseif( $count == 3)
	{
		$footer_col= 3;
	}
	elseif( $count == 2)
	{
		$footer_col= 2;
	}
	elseif( $count == 1)
	{
		$footer_col= 1;
	}
}

$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
);
$query_args_footer = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
);
?>
<section class="recommend-posts pb-5">
    <div class="container">
        <div class="sec-title">
            <h3>Recommended</h3>
        </div>
        <!--sec-title end-->
        <div class="blog-items smaller-post">
        	<?php
        	$query = new WP_Query($query_args);
            $count = $query->post_count;
            if ($query->have_posts()) :
			?>
            <div class="row">
            	<?php 
				if ( have_posts() ) {
				while ($query->have_posts()) :
                $query->the_post(); 
				?>
                <div class="col-lg-6">
                    <div class="blog-item">
                    	<?php if(has_post_thumbnail()) { ?>
	                        <div class="blog-img">
	                            <?php the_post_thumbnail('pritam-thumbnail-size'); ?>
	                        </div>
	                    <?php }?>
                        <!--blog-img end-->
                        <div class="blog-info">
                            <?php
			                    $categories = get_the_category();
			                    if ( ! empty( $categories ) ) {
			                      echo '<a class="post-category" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
			                    }
			                  ?>
                            <h3 class="post-title">
				                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			              	</h3>
                            <ul class="meta">
			                  <li><?php pritam_posted_on()?></li>
			                  <li><i class="la la-eye"></i><?php echo getPritamPostViews(get_the_ID()); ?></li>
			                  <li><a href="#" title=""><i class="la la-comment-o"></i><?php comments_number(); ?></a></li>
			                </ul>
                        </div>
                        <!--blog-info end-->
                    </div>
                    <!--blog-item end-->
                </div>
                <?php
					endwhile;
				} // end if
				?>
            </div>
        <?php endif; ?>
        </div>
    </div>
</section>
<!--recommend-posts end-->

<footer>
	<div class="container">
		<div class="blog-items ft-style py-5">
			<?php
        	$query = new WP_Query($query_args_footer);
            $count = $query->post_count;
            if ($query->have_posts()) :
			?>
			<div class="row">
				<?php 
				if ( have_posts() ) {
				while ($query->have_posts()) :
                $query->the_post(); 
				?>
						<div class="col-lg-3 col-md-3 col-sm-6 col-12">
							<div class="blog-item">
								<div class="blog-img">
									<?php the_post_thumbnail('pritam-thumbnail-size'); ?>
								</div><!--blog-img end-->
								<div class="blog-info">
									<h3 class="post-title">
					                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				                  	</h3>
								</div><!--blog-info end-->
							</div><!--blog-item end-->
						</div>
				<?php
					endwhile;
				} // end if
				?>
			</div>
			<?php endif; ?>
		</div><!--blog-items end-->

		<div class="footer-content">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="ft-logo">
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?></a>
						</h1>
					</div><!--ft-logo end-->
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<?php if( $enable_social == 1 ){ ?>
						<div class="social-icon-links">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_id'        => 'social-menu',
									'menu_class'     => 'social-menu',
								) );
							?>
						</div>
					<?php } ?>
				</div>
				<div class="col-lg-4 col-md-12">
					<?php if( $enable_menu == 1 ) { ?>
						<?php
						if (has_nav_menu('footer')) {
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu_id'        => '',
								'container' => 'ul',
								'menu_class'      => 'ft-links'
							) );
						} ?>
					<?php } ?>
				</div>
			</div>
		</div><!--footer-content end-->

		<div class="bottom-strip">
			<p>
				<?php echo $copyright; ?>
				<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'pritam' ), 'Pritam', '<a href="https://www.templatesell.com/">Template Sell</a>' );
				?>
			</p>
		</div>
	</div>
</footer><!--footer end-->



<?php do_action('pritam_go_to_top_hook'); ?>
<?php wp_footer(); ?>
</body>
</html>