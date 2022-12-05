<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pritam
 */
global $pritam_theme_options;
$sidebar = $pritam_theme_options['pritam-sidebar-blog-page'];
get_header();
?>

<section id="content" class="main-content pb-0">
    <div class="container">
        <div class="row">
        	<div class="col-lg-12">
        		<div class="ts-breadcrumbs">
	            	<?php 
					// Breadcrumb hook
					do_action('pritam_breadcrumb_options_hook'); ?>
				</div>
        	</div>
        </div>
        <div class="row <?php echo esc_attr($sidebar); ?>">
			<div id="primary" class="col-lg-8 mr-50">
				<main id="main" class="site-main">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'single' );												   
			            endwhile; // End of the loop.
			        ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer();

