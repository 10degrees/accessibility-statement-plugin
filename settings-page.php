<?php
/**
 * Admin Page
 */

if ( ! current_user_can( 'manage_privacy_options' ) ) {
	wp_die( __( 'Sorry, you are not allowed to manage the accessibility statement on this site.' ) );
}

$accessibility_statement_id = (int) get_option( 'wp_page_for_accessibility_statement' );
?>

<div class="wrap">
	<h1><?php _e( 'Accessibility Settings', 'a11y-statement' ); ?></h1>
	<h2><?php _e( 'Accessibility Statement Page', 'a11y-statement' ); ?></h2>

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

				if ( $has_pages ) :
					?>
					<form action="admin-post.php" method="POST" class="main-settings">
						<input type="hidden" name="action" value="set_accessibility_statement">
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

						wp_nonce_field( 'set_accessibility_statement' );

						submit_button( __( 'Use This Page' ), 'primary', 'submit', false, array( 'id' => 'set-page' ) );
						?>
					</form>
				<?php endif; ?>

				<form action="admin-post.php" method="POST">
					<input type="hidden" name="action" value="create_accessibility_statement">
					<span>
						<?php
						if ( $has_pages ) {
							_e( 'Or:' );
						} else {
							_e( 'There are no pages.' );
						}
						?>
					</span>

					<?php
					wp_nonce_field( 'create_accessibility_statement' );

					submit_button( __( 'Create New Page' ), 'primary', 'submit', false, array( 'id' => 'create-page' ) );
					?>
				</form>
			</td>
		</tr>
	</table>
</div>
