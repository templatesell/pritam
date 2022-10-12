<?php
/**
 * Enqueue scripts and styles.
 */
function pritam_scripts() {

	/*google font  */
	global $pritam_theme_options;
    /*body  */
    wp_enqueue_style('pritam-body', '//fonts.googleapis.com/css?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap', array(), null);
    /*heading  */
    // wp_enqueue_style('pritam-heading', '//fonts.googleapis.com/css?family=Prata&display=swap', array(), null);
    /*Author signature google font  */
    wp_enqueue_style('pritam-sign', '//fonts.googleapis.com/css?family=Monsieur+La+Doulaise&display=swap', array(), null);
    
	//*Font-Awesome-master*/
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '4.5.0' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.5.0' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/line-awesome.min.css', array(), '4.5.0' );
    wp_enqueue_style( 'all-font-icon', get_template_directory_uri() . '/assets/css/all.min.css', array(), '4.5.0' );

    /*Slick CSS*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/js/lib/slick/slick.css', array(), '4.5.0' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/js/lib/slick/slick-theme.css', array(), '4.5.0' );

   /*Main CSS*/
    wp_enqueue_style( 'pritam-style', get_stylesheet_uri() );
    wp_enqueue_style( 'pritam-custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '4.5.0' );
    wp_enqueue_style( 'pritam-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), '4.5.0' );
    wp_enqueue_style( 'pritam-color-style', get_template_directory_uri() . '/assets/css/color.css', array(), '4.5.0' );
	
    /*RTL CSS*/
	wp_style_add_data( 'pritam-style', 'rtl', 'replace' );

    $pritam_pagination_option =  esc_attr($pritam_theme_options['pritam-pagination-options']);
    
    if( 'ajax' == $pritam_pagination_option )  {
    	wp_enqueue_script( 'pritam-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array('jquery'), '4.6.0', true );
    }
    
    $masonry =  esc_attr($pritam_theme_options['pritam-column-blog-page']);
    if( 'masonry-post' == $masonry || 'one-column' == $masonry)  {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'pritam-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array('jquery'), '4.6.0', true );
   }

	wp_enqueue_script( 'pritam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200412', true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/lib/slick/slick.js', array('jquery'), '4.6.0', true  );

        
    /*Custom Script JS*/
	wp_enqueue_script( 'pritam-script', get_template_directory_uri() . '/assets/js/script.js', array(), '202', true );
    
	/*Custom Scripts*/
	wp_enqueue_script( 'pritam-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20200412', true );
    
	global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'pritam-custom', 'pritam_ajax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'paged'     => absint($paged),
        'max_num_pages'      => absint($max_num_pages),
        'next_posts'      => next_posts( absint($max_num_pages), false ),
        'show_more'      => __( 'View More', 'pritam' ),
        'no_more_posts'        => __( 'No More', 'pritam' ),
    ));
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.js', array(), '20200412', true );


	wp_enqueue_script( 'pritam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200412', true );

	/*Sticky Sidebar*/
	global $pritam_theme_options;
	if( 1 == absint($pritam_theme_options['pritam-enable-sticky-sidebar'])) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'pritam-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array(), '20200412', true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'pritam_scripts' );

/**
 * Enqueue fonts for the editor style
 */
function pritam_block_styles() {
    wp_enqueue_style( 'pritam-editor-styles', get_theme_file_uri( 'css/editor-styles.css' ) );

    wp_enqueue_style('pritam-editor-body', '//fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap', array(), null);
    /*heading  */
    wp_enqueue_style('pritam-editor-heading', '//fonts.googleapis.com/css?family=Prata&display=swap', array(), null);

    $pritam_custom_css = '
    .edit-post-visual-editor.editor-styles-wrapper{ font-family: Muli;}

    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{font-family:Prata;} 
    ';

    wp_add_inline_style( 'pritam-editor-styles', $pritam_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'pritam_block_styles' );

