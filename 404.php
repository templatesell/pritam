<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pritam
 */

get_header();
?>
<section id="content" class="main-content pb-0">
    <div class="container">
        <div class="row">
			<div id="primary" class="col-lg-12 page-404-container">
				<main id="main" class="site-main">
					<div class="page-404-content text-center">
						<h1 class="error-code"><?php esc_html_e( '404', 'pritam' ); ?></h1>
						<h3 class="post-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'pritam' ); ?></h3>
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'pritam' ); ?></p>
						<div class="back_home">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Back to Home', 'pritam' ); ?></a>
						</div>
					</div><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</section>
<?php
get_footer();
