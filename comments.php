<?php
if ( post_password_required() ) {
	return;
}
$fields =  array(
    'author' => '<div class="row"><div class="col-sm-6"><div class="form-field"><input type="text" name="author" id="name" class="input-form" placeholder="Name*" /></div></div>',
    'email'  => '<div class="col-sm-6"><div class="form-field"><input type="text" name="email" id="email" class="input-form" placeholder="Email*"/></div></div>',
    'website'=>'<div class="col-sm-12"><div class="form-field"><input type="text" name="url" id="url" class="input-form" placeholder="Website"/></div></div></div>'

);
$custom_comment_form = array( 
    'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field'         => '
    <textarea name="comment" id="message" class="textarea-form" placeholder="Your Message" rows="3"></textarea>',
    'logged_in_as'          => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s">Log out?</a>','pritam' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
    'cancel_reply_link'     => esc_html__( 'Cancel' , 'pritam' ),
    'comment_notes_before'  => '<p class="comment-notes">Your email address will not be published. Required fields are marked *</p>',
    'comment_notes_after'   => '',
    'title_reply'           => esc_html__( 'Leave a Reply' , 'pritam' ),
    'title_reply_before'  => '<div class="sec-title"><h3>',
	'title_reply_after'   => '</h3></div>',
    'label_submit'          => esc_html__( 'Submit' , 'pritam' ),
    'id_submit'             => 'comment_submit'
);

?>
<?php if ( have_comments() ) : ?>
    <div id="comments" class="comment-section"> 
    	<div class="comment-list-sec">   
            <?php if ( comments_open() ) : ?>
            	<div class="sec-title">
                	<h3 class="comments-title">
                		<?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'pritam' ), number_format_i18n( get_comments_number() ) ); ?>
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