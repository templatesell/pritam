<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pritam
 */
global $pritam_theme_options;
$sidebar = $pritam_theme_options['pritam-sidebar-blog-page'];

get_header();
?>
<section id="content" class="main-content pb-5">
    <div class="container">
        <div class="row <?php echo esc_attr($sidebar); ?>">
			<div id="primary" class="col-lg-8">
				<main id="main" class="site-main">
				<?php

				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Masonry Start Section */
					do_action('pritam_masonry_start_hook');
					?>
					<div class="row">
						<?php
						/* Start the Loop */
						$i = 1;
						while ( have_posts() ) :
							the_post();
							
							if($i == 1){
								get_template_part( 'template-parts/content', 'full' );
							}else{

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/

							get_template_part( 'template-parts/content', 'grid' );
							}

							$i++; endwhile; ?>
					</div>
					<?php 

					/* Masonry end Section */
					do_action('pritam_masonry_end_hook'); 

					/**
		             * pritam_action_navigation hook
		             * @since Pritam 1.0.0
		             *
		             * @hooked pritam_action_navigation -  10
		             */

		            do_action( 'pritam_action_navigation');

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>

<?php get_footer();

