<?php
if ( post_password_required() ) {
	return;
}
$pritam_commenter     = wp_get_current_commenter();
$pritam_name_required = (bool) get_option( 'require_name_email' );
$pritam_required_attr = $pritam_name_required ? ' required="required" aria-required="true"' : '';
$pritam_required_mark = $pritam_name_required ? ' <span class="required">*</span>' : '';
$pritam_current_user  = wp_get_current_user();

$fields = array(

	'author' => '<p class="comment-form-author form-field">'
		. '<label for="author">' . esc_html__( 'Name', 'pritam' ) . $pritam_required_mark . '</label>'
		. '<input id="author" name="author" type="text" autocomplete="name" maxlength="245"'
		. ' value="' . esc_attr( $pritam_commenter['comment_author'] ) . '"' . $pritam_required_attr . ' />'
		. '</p>',

	'email'  => '<p class="comment-form-email form-field">'
		. '<label for="email">' . esc_html__( 'Email', 'pritam' ) . $pritam_required_mark . '</label>'
		. '<input id="email" name="email" type="email" autocomplete="email" maxlength="100"'
		. ' value="' . esc_attr( $pritam_commenter['comment_author_email'] ) . '"' . $pritam_required_attr . ' />'
		. '</p>',

	'url'    => '<p class="comment-form-url form-field">'
		. '<label for="url">' . esc_html__( 'Website', 'pritam' ) . '</label>'
		. '<input id="url" name="url" type="url" autocomplete="url" maxlength="200"'
		. ' value="' . esc_attr( $pritam_commenter['comment_author_url'] ) . '" />'
		. '</p>',
);

$custom_comment_form = array(
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field'        => '<p class="comment-form-comment">'
		. '<label for="comment">' . esc_html__( 'Comment', 'pritam' ) . ' <span class="required">*</span></label>'
		. '<textarea id="comment" name="comment" rows="3" maxlength="65525" required="required" aria-required="true"></textarea>'
		. '</p>',
	'logged_in_as'         => '<p class="logged-in-as">'
		. esc_html__( 'Logged in as', 'pritam' ) . ' '
		. '<a href="' . esc_url( admin_url( 'profile.php' ) ) . '">' . esc_html( $pritam_current_user->display_name ) . '</a> '
		. '<a href="' . esc_url( wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '">' . esc_html__( 'Log out?', 'pritam' ) . '</a>'
		. '</p>',
	'cancel_reply_link'    => esc_html__( 'Cancel', 'pritam' ),
	'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Your email address will not be published. Required fields are marked *', 'pritam' ) . '</p>',
	'comment_notes_after'  => '',
	'title_reply'          => esc_html__( 'Leave a Reply', 'pritam' ),
	'title_reply_before'   => '<div class="sec-title"><h3>',
	'title_reply_after'    => '</h3></div>',
	'label_submit'         => esc_html__( 'Submit', 'pritam' ),
	'id_submit'            => 'comment_submit',
);

?>
<?php if ( have_comments() ) : ?>
    <div id="comments" class="comment-section"> 
    	<div class="comment-list-sec">   
            <?php if ( comments_open() ) : ?>
            	<div class="sec-title">
                	<h3 class="comments-title">
                		<?php
                		printf(
                			/* translators: %s: comment count number. */
                			esc_html( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'pritam' ) ),
                			esc_html( number_format_i18n( get_comments_number() ) )
                		);
                		?>
            		</h3>
            	</div>
           	<?php endif; ?>
        	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
        		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'pritam' ); ?></h1>
        		<div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
        		<div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
        	</nav><!-- #comment-nav-above -->
        	<?php endif; // Check for comment navigation. ?>    
        	<ol class="comment-list">
        		<?php
        			wp_list_comments( array(
        				'style'       => 'ol',
        				'short_ping'  => true,
        				'avatar_size' => 90,
                        'callback'	  => 'pritam_custom_comment'
        			) );
        		?>
        	</ol><!-- .comment-list -->    
        	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
            		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'pritam' ); ?></h1>
            		<div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
            		<div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
            	</nav><!-- #comment-nav-below -->
        	<?php endif; // Check for comment navigation. ?>    
        	<?php if ( ! comments_open() ) : ?>
        	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'pritam' ); ?></p>
        	<?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<!-- Leave reply -->
<?php comment_form($custom_comment_form); ?>

<!-- Leave reply -->