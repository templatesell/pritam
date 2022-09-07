<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pritam
 */
global $pritam_theme_options;
$sidebar = $pritam_theme_options['pritam-sidebar-blog-page'];
get_header();
?>
<div class="ts-breadcrumbs">
    <div class="ts-breadcrumbs-inner">
        <div class="container">
            <div class="breadcrumbs-inner">
				<?php do_action('pritam_breadcrumb_options_hook'); ?> <!-- Breadcrumb hook -->
			</div>
    	</div>
	</div>
</div>
<section id="content" class="main-content pb-0">
    <div class="container">
        <div class="row <?php echo esc_attr($sidebar); ?>">
			<div id="primary" class="col-lg-8">
				<main id="main" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer();
