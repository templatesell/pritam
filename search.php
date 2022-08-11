<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'pritam' ), '<span>' . get_search_query() . '</span>' );
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
					<?php if ( have_posts() ) : ?>
					<?php
						/* Masonry Start Section */
						do_action('pritam_masonry_start_hook'); 

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */

							get_template_part( 'template-parts/content', 'search' );

						endwhile;

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

