<?php

require_once 'class-statement-generator.php';

/**
 * Main Plugin File
 */
class AccessibilityStatementPlugin {
	/**
	 * Plugin admin sections
	 *
	 * @var array
	 */
	private $sections = array();

	/**
	 * Contructor
	 *
	 * Add admin pages and actions
	 *
	 * @return  void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'display_post_states', array( $this, 'add_post_state' ), 10, 2)  ;
	}

	/**
	 * Add the post state for the Accessibility Statement
	 *
	 * @param   array  $post_states  Array of post states
	 * @param   WP_Post  $post         Current Post
	 *
	 * @return  array                Array of post states
	 */
	public function add_post_state($post_states, $post) {
		if ( intval( get_option( 'wp_page_for_accessibility_statement' ) ) === $post->ID ) {
			$post_states['page_for_accessibility_statement'] = _x( 'Accessibility Statement Page', 'page label' );
		}

		return $post_states;
	}

	/**
	 * Add Settings page to Admin dashboard
	 *
	 * @return  void
	 */
	public function add_settings_page() {
		add_options_page( __( 'Accessibility Statement', 'a11y-statement' ), __( 'Accessibility', 'a11y-statement' ), 'manage_options', 'accessibility-statement', array( $this, 'page_contents' ), 7);
	}

	/**
	 * Get the Settings page contents
	 *
	 * @return  void
	 */
	public function page_contents() {
		echo psg_view(
			'settings-page',
		);
	}
}