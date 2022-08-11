<?php
/**
 * Pritam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pritam
 */

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
		load_theme_textdomain( 'pritam' );

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
			'top' => esc_html__( 'Top Menu', 'pritam' ),
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
        
        add_image_size('pritam-thumbnail-size', 820, 505, true); 
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

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'pritam' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'pritam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'pritam' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'pritam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'pritam' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'pritam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'pritam' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'pritam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Offcanvas', 'pritam' ),
		'id'            => 'offcanvas',
		'description'   => esc_html__( 'Add widgets here.', 'pritam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pritam_widgets_init' );



function pritam_comments_number ($output, $number) {
  if ($number == 0) $output = '0';
  elseif ($number == 1) $output = '1';
  else $output = $number . '';
  return $output;
}
add_filter ('comments_number', 'pritam_comments_number', 10, 2);



function getPritamPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}
 
function setPritamPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
 
//remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


if (!function_exists('pritam_show_author_links')) :
    
    function pritam_show_author_links()
    {
        $user_url = get_the_author_meta('user_url');
        $facebook = get_the_author_meta('facebook');
        $twitter = get_the_author_meta('twitter');
        $linkedin = get_the_author_meta('linkedin');
        $youtube = get_the_author_meta('youtube');
        $instagram = get_the_author_meta('instagram');
        $pinterest = get_the_author_meta('pinterest');
        $flickr = get_the_author_meta('flickr');
        $tumblr = get_the_author_meta('tumblr');
        $vk = get_the_author_meta('vk');
        $wordpress = get_the_author_meta('wordpress');
        ?>
        <ul class="social-links">
            <?php
            if (!empty($user_url)) {
                ?>
                <li>
                <a href="<?php echo esc_url($user_url); ?>" class="website" data-title="Website" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                </li>
                <?php
            }
            if (!empty($facebook)) {
                ?>
                <li>
                <a href="<?php echo esc_url($facebook); ?>" class="facebook" data-title="Facebook" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                </li>
                <?php
            }
            if (!empty($twitter)) {
                ?>
                <li>
                <a href="<?php echo esc_url($twitter); ?>" class="twitter" data-title="Twitter" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                </li>
                <?php
            }
            if (!empty($linkedin)) {
                ?>
                <li>
                <a href="<?php echo esc_url($linkedin); ?>" class="linkedin" data-title="Linkedin" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
                </li>
                <?php
            }
            if (!empty($instagram)) {
                ?>
                <li>
                <a href="<?php echo esc_url($instagram); ?>" class="instagram" data-title="Instagram" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                </li>
                <?php
            }
            if (!empty($youtube)) { ?>
                <li>
                <a href="<?php echo esc_url($youtube); ?>" class="youtube" data-title="Youtube" target="_blank">
                    <i class="fab fa-youtube"></i>
                </li>
                <?php
            }
            if (!empty($pinterest)) {
                ?>
                <li>
                <a href="<?php echo esc_url($pinterest); ?>" class="pinterest" data-title="Pinterest" target="_blank">
                    <i class="fab fa-pinterest"></i>
                </a>
                </li>
                <?php
            }
            if (!empty($flickr)) {
                ?>
                <li>
                <a href="<?php echo esc_url($flickr); ?>" class="flickr" data-title="Flickr" target="_blank">
                    <i class="fab fa-flickr"></i>
                </a>
                </li>
                <?php
            }
            if (!empty($tumblr)) {
                ?>
                </li>
                <a href="<?php echo esc_url($tumblr); ?>" class="tumblr" data-title="Tumblr" target="_blank">
                    <i class="fab fa-tumblr"></i>
                </a>
                </li>
                <?php
            }
            if (!empty($vk)) {
                ?>
                </li>
                <a href="<?php echo esc_url($vk); ?>" class="vk" data-title="VK" target="_blank">
                   <i class="fab fa-vk"></i>
                </a>
                </li>
                <?php
            }
            if (!empty($wordpress)) {
                ?>
                <li>
                <a href="<?php echo esc_url($wordpress); ?>" class="wordpress" data-title="WordPress" target="_blank">
                    <i class="fab fa-wordpress"></i>
                </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
endif;
add_action('pritam_author_links', 'pritam_show_author_links', 10);

/**
 * Comment Layout
 */
function pritam_custom_comment($comment, $args, $depth) {
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	} ?>
	<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
		<div class="comment-author cm-img">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<div class="comment-content cm-info">
			<div class="author-wrap">
                <div class="cm-hed">
                    <?php printf( __( '<h3 class="author-name">%s</h3>', 'pritam' ), get_comment_author_link() ); ?>
                    <div class="cm-right">
	        			<span>
	        				<a class="date-comment" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"></a>
	        				<?php printf( __('%1$s at %2$s', 'pritam'), get_comment_date(),  get_comment_time() ); ?>
	        			</span>
        				<div class="reply">
		    				<?php edit_comment_link( esc_html__( '(Edit)', 'pritam' ), '  ', '' );?>
		    				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		    			</div>
		    		</div>
                </div>
            </div>
            <div class="clearfix"></div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'pritam' ); ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-text"><?php comment_text(); ?></div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/**
 * Load TS Core Files
 */
require get_template_directory() . '/templatesell/ts-core-files.php';