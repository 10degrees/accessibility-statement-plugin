<?php
/**
 * Admin Page
 */

if ( ! current_user_can( 'manage_privacy_options' ) ) {
	wp_die( __( 'Sorry, you are not allowed to manage the accessibility statement on this site.' ) );
}

$action = isset( $_POST['action'] ) ? $_POST['action'] : '';

if( ! empty( $action ) ) {
	check_admin_referer( $action );

	if( 'set-accessibility-statement' === $action) {
		$accessibility_page_id = isset($_POST['page_for_accessibility_statement']) ? (int) $_POST['page_for_accessibility_statement'] : 0;

		update_option( 'wp_page_for_accessibility_statement', $accessibility_page_id );

		$accessibility_statement_updated_message = __( 'Accessibility Statement page updated successfully.' );

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

	} elseif( 'create-accessibility-statement' === $action ) {

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
			add_settings_error(
				'page_for_accessibility_statement',
				'page_for_accessibility_statement',
				__( 'Unable to create an Accessibility Statement.' ),
				'error',
			);
		} else {
			update_option( 'wp_page_for_accessibility_statement' , $accessibility_statement_id);

			// wp_redirect( admin_url( 'post.php?post=' . $accessibility_statement_id . '&action=edit' ) );
			// exit;
		}
	}
}

$accessibility_statement_exists = false;
$accessibility_statement_id = (int) get_option( 'wp_page_for_accessibility_statement' );

if ( ! empty( $accessibility_statement_id ) ) {
	$accessibility_statement = get_post( $accessibility_statement_id );
	if ( ! $accessibility_statement instanceof WP_Post ) {
		add_settings_error(
			'page_for_accessibility_statement',
			'page_for_accessibility_statement',
			__( 'The currently selected Accessibility Statement page does not exist. Please create or select a new page.' ),
			'error',
		);
	} else {
		if ( 'trash' === $accessibility_statement->post_status ) {
			add_settings_error(
				'page_for_accessibility_statement',
				'page_for_accessibility_statement',
				sprintf(
					/* translators: %s: URL to Pages Trash. */
					__( 'The currently selected Accessibility Statement page is in the Trash. Please create or select a new Accessibility Statement page or <a href="%s">restore the current page</a>.' ),
					'edit.php?post_status=trash&post_type=page'
				),
				'error'
			);
		} else {
			$privacy_policy_page_exists = true;
		}
	}
}
?>

<div class="wrap">
	<h1><?php _e( 'Accessibility Statement', 'a11y-statement' ); ?></h1>

	<table role="presentation">
		<tr>
			<th scope="row">
				<label for="page_for_accessibility_statement">
					<?php
					_e( 'Select an Accessibility Statement page' );
					?>
				</label>
			</th>
			<td>
				<?php
				$has_pages = (bool) get_posts(
					array(
						'post_type'      => 'page',
						'posts_per_page' => 1,
						'post_status'    => array(
							'publish',
							'draft',
						),
					)
				);

				if ( $has_pages ): 
					?>
					<form action="" method="POST" class="main-settings">
						<input type="hidden" name="action" value="set-accessibility-statement">
						<?php
						wp_dropdown_pages(
							array(
								'name'              => 'page_for_accessibility_statement',
								'show_option_none'  => __( '&mdash; Select &mdash;' ),
								'option_none_value' => '0',
								'selected'          => $accessibility_statement_id,
								'post_status'       => array( 'draft', 'publish' ),
							)
						);

						wp_nonce_field( 'set-accessibility-statement' );

						submit_button( __( 'Use This Page' ), 'primary', 'submit', false, array( 'id' => 'set-page' ) );
						?>
					</form>
				<?php endif; ?>

				<form action="" method="POST">
					<input type="hidden" name="action" value="create-accessibility-statement">
					<span>
						<?php
						if( $has_pages ) {
							_e( 'Or:' );
						} else {
							_e( 'There are no pages.' );
						}
						?>
					</span>

					<?php
					wp_nonce_field( 'create-accessibility-statement' );

					submit_button( __( 'Create New Page' ), 'primary', 'submit', false, array( 'id' => 'create-page' ) );
					?>
				</form>
			</td>
		</tr>
	</table>
</div>
