<?php

if ( ! function_exists( 'pritam_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function pritam_load_widgets() {

        // Highlight Post.
        register_widget( 'Pritam_Featured_Post' );

        // Author Widget.
        register_widget( 'Pritam_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Pritam_Social_Widget' );
    }
endif;
add_action( 'widgets_init', 'pritam_load_widgets' );


