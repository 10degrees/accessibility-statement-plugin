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
		add_action( 'display_post_states', array( $this, 'add_post_state' ), 10, 2);
		add_action( 'admin_notices', array( $this, 'add_admin_notices' ) );

		add_action( 'admin_post_set_accessibility_statement', array( $this, 'set_accessibility_statement' ) );
		add_action( 'admin_post_create_accessibility_statement', array($this, 'create_accessibility_statement') );
	}

	public function create_accessibility_statement() {
		$default_accessibility_statement_content = StatementGenerator::get_default_content();

		$accessibility_statement_id = wp_insert_post(
			array(
				'post_title' => __( 'Accessibility Statement' ),
				'post_status' => 'draft',
				'post_type' => 'page',
				'post_content' => $default_accessibility_statement_content,
			),
			true,
		);

		if( is_wp_error( $accessibility_statement_id ) ) {
			wp_redirect( admin_url( 'options-general.php?page=accessibility-statement&page-created-error=1' ) );
			exit;
		} else {
			update_option( 'wp_page_for_accessibility_statement' , $accessibility_statement_id);

			wp_redirect( admin_url( 'post.php?post=' . $accessibility_statement_id . '&action=edit' ) );
			exit;
		}
	}

	public function set_accessibility_statement() {
		$accessibility_page_id = isset($_POST['page_for_accessibility_statement']) ? (int) $_POST['page_for_accessibility_statement'] : 0;

		update_option( 'wp_page_for_accessibility_statement', $accessibility_page_id );

		wp_redirect( admin_url( 'options-general.php?page=accessibility-statement&page-updated=1' ) );
		exit;
	}

	/**
	 * Display notices on settings page
	 *
	 * @return void
	 */
	public function add_admin_notices() {
		$screen = get_current_screen();

		if ( 'settings_page_accessibility-statement' === $screen->id ) {
			if ($_GET['page-updated']) {
				$accessibility_statement_updated_message = __( 'Accessibility Statement page updated successfully.' );

				$accessibility_page_id = get_option('wp_page_for_accessibility_statement');

				if ($accessibility_page_id) {
					if (
						'publish' === get_post_status( $accessibility_page_id )
						&& current_user_can( 'edit_theme_options' )
						&& current_theme_supports( 'menus' )
					) {
						$accessibility_statement_updated_message = sprintf(
							/* translators: %s: URL to Customizer -> Menus. */
							__( 'Accessibility Statement page setting updated successfully. Remember to <a href="%s">update your menus</a>!' ),
							esc_url( add_query_arg( 'autofocus[panel]', 'nav_menus', admin_url( 'customize.php' ) ) )
						);
					}
				}

				add_settings_error( 'page_for_accessibility_statement', 'page_for_accessibility_statement', $accessibility_statement_updated_message, 'success' );
			}

			if($_GET['page-created-error']) {
				add_settings_error(
					'page_for_accessibility_statement',
					'page_for_accessibility_statement',
					__( 'Unable to create an Accessibility Statement.' ),
					'error',
				);
			}
		}
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