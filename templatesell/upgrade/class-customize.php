<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.5
 * @access public
 */
final class Pritam_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.5
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self();
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.5
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.5
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.5
	 * @access public
	 * @param object $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'templatesell/upgrade/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Pritam_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Pritam_Customize_Section_Pro(
				$manager,
				'pritam_plus',
				array(
					'pro_text2' => esc_html__( 'Unlock More Features', 'pritam' ),
					'pro_url2'  => 'https://www.templatesell.com/item/pritam-premium-minimal-wordpress-blog-theme/',
					'pro_text'  => esc_html__( 'Get Support', 'pritam' ),
					'pro_url'   => 'https://www.templatesell.com/support/',
					'priority' => '1',
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.5
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'pritam-customize-controls', trailingslashit( get_template_directory_uri() ) . '/templatesell/upgrade/customize-controls.js', array( 'customize-controls' ) );
	}
}

// Doing this customizer thang!
Pritam_Customize::get_instance();
