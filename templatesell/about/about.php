<?php
/**
 * Added pritam Page.
*/

/**
 * Add a new page under Appearance
 */
function pritam_menu() {
	add_theme_page( __( 'Pritam Options', 'pritam' ), __( 'Pritam Options', 'pritam' ), 'edit_theme_options', 'pritam-theme', 'pritam_page' );
}
add_action( 'admin_menu', 'pritam_menu' );

/**
 * Enqueue styles for the help page.
 */
function pritam_admin_scripts( $hook ) {
	if ( 'appearance_page_pritam-theme' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'pritam-admin-style', get_template_directory_uri() . '/templatesell/about/about.css', array(), '' );
}
add_action( 'admin_enqueue_scripts', 'pritam_admin_scripts' );

/**
 * Add the theme page
 */
function pritam_page() {
	?>
	<div class="das-wrap">
		<div class="pritam-panel">
			<div class="pritam-logo">
				<img class="ts-logo" src="<?php echo esc_url( get_template_directory_uri() . '/templatesell/about/images/pritam-logo.png' ); ?>" alt="Logo">
			</div>
			<a href="https://www.templatesell.com/item/pritam-plus-masonry-wordpress-theme/" target="_blank" class="btn btn-success pull-right"><?php esc_html_e( 'Upgrade Pro $49', 'pritam' ); ?></a>
			<p>
			<?php esc_html_e( 'A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.', 'pritam' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url (admin_url( '/customize.php?' ));
				?>"><?php esc_html_e( 'Theme Options - Click Here', 'pritam' ); ?></a>
		</div>

		<div class="pritam-panel">
			<div class="pritam-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Looking for theme Documentation?', 'pritam' ); ?></h3>
				</div>
				<a href="http://docs.templatesell.net/pritam" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Documentation - Click Here', 'pritam' ); ?></a>
			</div>
		</div>
		<div class="pritam-panel">
			<div class="pritam-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'If you like the theme, please leave a review', 'pritam' ); ?></h3>
				</div>
				<a href="https://wordpress.org/support/theme/pritam/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Rate this theme', 'pritam' ); ?></a>
			</div>
		</div>
		<div class="pritam-panel">
			<div class="pritam-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Recommended plugin for SEO. Rank Math is the best plugin and we would like to recommend it.', 'pritam' ); ?></h3>
				</div>
				<a href="https://rankmath.com/?ref=templatesell" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Download Rank Math Plugin', 'pritam' ); ?></a>
				<span>
			<?php esc_html_e( 'Here we included an affiliate link to Rank Math Plugin. If you click on the link and buy the product, we’ll receive a small fee. No worries though, you’ll still pay the standard amount without any extra cost to you.', 'pritam' ); ?></span><a href="https://www.templatesell.com/blog/template-sell-uses-rank-math/" target="_blank" class="about-link"><?php esc_html_e( 'Read why Template Sell recommend Rank Math', 'pritam' ); ?></a>
			</div>
		</div>
	</div>
	<?php
}
