<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Pritam
 */

/**
 * Enqueue the front-end styles and scripts.
 */
function pritam_scripts() {

	global $pritam_theme_options;

	// Locally hosted webfonts.
	wp_enqueue_style( 'pritam-fonts', get_template_directory_uri() . '/assets/fonts/fonts.css', array(), PRITAM_VERSION );

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), PRITAM_VERSION );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0' );

	// Line Awesome icons.
	wp_enqueue_style( 'line-awesome', get_template_directory_uri() . '/css/line-awesome.min.css', array(), '1.1.0' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), '5.6.1' );

	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/js/lib/slick/slick.css', array(), '1.8.0' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/js/lib/slick/slick-theme.css', array( 'slick' ), '1.8.0' );

	wp_enqueue_style( 'pritam-style', get_stylesheet_uri(), array( 'pritam-fonts', 'bootstrap' ), PRITAM_VERSION );
	wp_style_add_data( 'pritam-style', 'rtl', 'replace' );

	wp_enqueue_style( 'pritam-custom-style', get_template_directory_uri() . '/assets/css/style.css', array( 'pritam-style' ), PRITAM_VERSION );
	wp_enqueue_style( 'pritam-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array( 'pritam-custom-style' ), PRITAM_VERSION );

	$pritam_pagination = isset( $pritam_theme_options['pritam-pagination-options'] )
		? $pritam_theme_options['pritam-pagination-options']
		: '';

	if ( 'ajax' === $pritam_pagination ) {
		wp_enqueue_script( 'pritam-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array( 'jquery' ), PRITAM_VERSION, true );
	}

	$pritam_layout = isset( $pritam_theme_options['pritam-column-blog-page'] )
		? $pritam_theme_options['pritam-column-blog-page']
		: '';

	if ( 'masonry-post' === $pritam_layout || 'one-column' === $pritam_layout ) {
		// masonry and imagesloaded come from WordPress core.
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'pritam-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array( 'jquery', 'masonry', 'imagesloaded' ), PRITAM_VERSION, true );
	}

	wp_enqueue_script( 'pritam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), PRITAM_VERSION, true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/lib/slick/slick.js', array( 'jquery' ), '1.8.0', true );

	// Both scripts depend on jQuery.
	wp_enqueue_script( 'pritam-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), PRITAM_VERSION, true );

	// Labels for the submenu toggles.
	wp_localize_script(
		'pritam-script',
		'pritam_menu',
		array(
			'expand'   => __( 'Expand child menu', 'pritam' ),
			'collapse' => __( 'Collapse child menu', 'pritam' ),
		)
	);

	wp_enqueue_script( 'pritam-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), PRITAM_VERSION, true );

	global $wp_query;

	$pritam_paged     = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
	$pritam_max_pages = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;

	wp_localize_script(
		'pritam-custom',
		'pritam_ajax',
		array(
			'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php' ) ),
			'paged'         => absint( $pritam_paged ),
			'max_num_pages' => absint( $pritam_max_pages ),
			'next_posts'    => next_posts( absint( $pritam_max_pages ), false ),
			'show_more'     => __( 'View More', 'pritam' ),
			'no_more_posts' => __( 'No More', 'pritam' ),
		)
	);

	wp_enqueue_script( 'pritam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), PRITAM_VERSION, true );

	$pritam_sticky_sidebar = isset( $pritam_theme_options['pritam-enable-sticky-sidebar'] )
		? absint( $pritam_theme_options['pritam-enable-sticky-sidebar'] )
		: 0;

	if ( 1 === $pritam_sticky_sidebar ) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), '1.4.0', true );
		wp_enqueue_script( 'pritam-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array( 'jquery', 'theia-sticky-sidebar' ), PRITAM_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pritam_scripts' );
