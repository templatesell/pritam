<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pritam
 */

get_header();
?>
<div class="ts-breadcrumbs">
    <div class="ts-breadcrumbs-inner">
        <div class="container">
            <div class="breadcrumbs-inner">
            	<div class="page-title">
            		<?php
						the_archive_title( '<h1 class="archive-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
        		</div>
            	<?php 
					// breadcrumb hook
					do_action('pritam_breadcrumb_options_hook'); 
				?>
        	</div>
    	</div>
	</div>
</div>

<section id="content" class="main-content pb-0">
    <div class="container">
        <div class="row">
			<div id="primary" class="col-lg-8 mgr-50">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) : 
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

						$i++; endwhile; 

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
