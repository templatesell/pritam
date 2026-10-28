<?php
/**
 * Pritam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pritam
 */

/**
 * The theme version, used to bust the cache on every stylesheet and script
 * the theme enqueues. They were versioned "4.5.0", "20200412" or "202"
 * regardless of what had changed in them.
 */
if ( ! defined( 'PRITAM_VERSION' ) ) {
	define( 'PRITAM_VERSION', '1.0.5' );
}

if ( ! function_exists( 'pritam_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pritam_setup() {
		//customizer setting default value set
		$GLOBALS['pritam_theme_options'] = pritam_get_options_value();
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Pritam, use a find and replace
		 * to change 'pritam' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pritam', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pritam' ),
			'footer' => esc_html__( 'Footer Menu', 'pritam' ),
			'social' => esc_html__( 'Social Icons', 'pritam' ),
		) );

		/*
		 * Pritam default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		// Let a wide or full-width block use the room the layout has for it.
		add_theme_support( 'align-wide' );

		/*
		 * The theme has advertised custom-background in its tags since it shipped
		 * without ever declaring support for it, so the option never appeared in
		 * the customizer.
		 */
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		);

		/*
		 * Editor styles. css/editor-styles.css shipped empty, and was enqueued on
		 * enqueue_block_editor_assets, which no longer reaches the content now that
		 * the post editor is an iframe.
		 */
		add_editor_style( array( 'assets/fonts/fonts.css', 'css/editor-styles.css' ) );

		// Add support for Yoast SEO Breadcrumbs.
        add_theme_support( 'yoast-seo-breadcrumbs' );

        /**
		 * Register theme support for Rank Math breadcrumbs
		 */
		add_theme_support( 'rank-math-breadcrumbs' );

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'pritam' ),
					'shortName' => __( 'S', 'pritam' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Medium', 'pritam' ),
					'shortName' => __( 'M', 'pritam' ),
					'size'      => 20,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'pritam' ),
					'shortName' => __( 'L', 'pritam' ),
					'size'      => 25,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Larger', 'pritam' ),
					'shortName' => __( 'XL', 'pritam' ),
					'size'      => 35,
					'slug'      => 'larger',
				),
			)
		);

		/**
         * Add theme support for New Image
         *
         * @link https://developer.wordpress.org/reference/functions/add_image_size/
         */

        add_image_size('pritam-thumbnail-size', 960, 468, true);
        add_image_size('pritam-related-size', 680, 494, true);
        add_image_size('pritam-promo-post', 800, 500, true);
        add_image_size('pritam-related-post-thumbnails', 850, 550, true );
	}
endif;
add_action( 'after_setup_theme', 'pritam_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pritam_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pritam_content_width', 640 );
}
add_action( 'after_setup_theme', 'pritam_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pritam_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pritam' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pritam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pritam_widgets_init' );

/**
 * Load TS Core Files
 */
/**
 * Register the theme's own block styles.
 *
 * Hooked to init, because a style label is a translated string.
 */
function pritam_register_block_styles() {

	if ( ! function_exists( 'register_block_style' ) ) {
		return;
	}

	register_block_style( 'core/paragraph', array( 'name' => 'pritam-lead', 'label' => __( 'Lead paragraph', 'pritam' ) ) );
	register_block_style( 'core/group', array( 'name' => 'pritam-boxed', 'label' => __( 'Boxed', 'pritam' ) ) );
	register_block_style( 'core/list', array( 'name' => 'pritam-plain-list', 'label' => __( 'Plain', 'pritam' ) ) );
}
add_action( 'init', 'pritam_register_block_styles' );

/**
 * Register the theme's block patterns.
 */
function pritam_register_block_patterns() {

	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category( 'pritam', array( 'label' => __( 'Pritam', 'pritam' ) ) );
	}

	register_block_pattern(
		'pritam/standfirst',
		array(
			'title'       => __( 'Standfirst', 'pritam' ),
			'categories'  => array( 'pritam' ),
			'description' => __( 'An opening paragraph set larger than the body text.', 'pritam' ),
			'content'     => '<!-- wp:paragraph {"className":"is-style-pritam-lead"} --><p class="is-style-pritam-lead">'
				. esc_html__( 'Open with the sentence a reader needs before any of the rest of it makes sense.', 'pritam' )
				. '</p><!-- /wp:paragraph -->',
		)
	);

	register_block_pattern(
		'pritam/two-up',
		array(
			'title'       => __( 'Two columns of text', 'pritam' ),
			'categories'  => array( 'pritam' ),
			'description' => __( 'Two equal columns of running text.', 'pritam' ),
			'content'     => '<!-- wp:columns --><div class="wp-block-columns">'
				. '<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p></p><!-- /wp:paragraph --></div><!-- /wp:column -->'
				. '<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p></p><!-- /wp:paragraph --></div><!-- /wp:column -->'
				. '</div><!-- /wp:columns -->',
		)
	);

	register_block_pattern(
		'pritam/quote-break',
		array(
			'title'       => __( 'Pull quote break', 'pritam' ),
			'categories'  => array( 'pritam' ),
			'description' => __( 'A quotation set between two passages of text.', 'pritam' ),
			'content'     => '<!-- wp:separator --><hr class="wp-block-separator"/><!-- /wp:separator -->'
				. '<!-- wp:quote --><blockquote class="wp-block-quote"><p></p></blockquote><!-- /wp:quote -->'
				. '<!-- wp:separator --><hr class="wp-block-separator"/><!-- /wp:separator -->',
		)
	);
}
add_action( 'init', 'pritam_register_block_patterns' );

require get_template_directory() . '/templatesell/ts-core-files.php';