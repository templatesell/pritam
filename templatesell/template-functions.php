<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Pritam
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pritam_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'pritam_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function pritam_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'pritam_pingback_header' );

function pritam_comments_number ($output, $number) {
	if ($number == 0) $output = '0';
	elseif ($number == 1) $output = '1';
	else $output = $number . '';
	return $output;
  }
  add_filter ('comments_number', 'pritam_comments_number', 10, 2);
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