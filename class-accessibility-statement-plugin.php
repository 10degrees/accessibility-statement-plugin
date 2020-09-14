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
		$this->sections = array(
			new BasicInformation(),
			new YourEfforts(),
			new TechnicalInformation(),
			new AccessibilityLimitations(),
			new ApprovalAndComplaints(),
		);

		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_filter( 'display_post_states', array( $this, 'add_post_state' ), 10, 2 );
	}

	/**
	 * Add the Accessibility Statement post state
	 *
	 * @param   array  $post_states  Post States for the current post
	 * @param   WP_Post  $post         Current Post
	 *
	 * @return  array                Post States for the current post
	 */
	public function add_post_state( $post_states, $post ) {
		$statement_id = get_option( 'accessibility_statement_page' );

		if ( $statement_id == $post->ID ) {
			$post_states[] = __( 'Accessibility Statement', 'a11y-statement' );
		}
	
		return $post_states;
	}

	/**
	 * Enqueue JavaScript and CSS
	 *
	 * @return  void
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'accessibility-statement-generator', plugin_dir_url( __FILE__ ) . 'src/js/main.js', array(), false, true );
		wp_enqueue_style( 'accessibility-statement-generator', plugin_dir_url( __FILE__ ) . 'src/css/main.css' );
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
			array(
				'sections' => $this->sections,
			)
		);
	}
}