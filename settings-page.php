<?php
/**
 * Admin Page
 *
 * @package Accessibility Statement Generator
 */

if ( ! current_user_can( 'manage_privacy_options' ) ) {
	wp_die( __( 'Sorry, you are not allowed to manage the accessibility statement on this site.' ) );
}

$accessibility_statement_id = (int) get_option( 'wp_page_for_accessibility_statement' );

$accessibility_statement_exists = wp_accessibility_statement_exists();

?>

<div class="wrap">
	<h1><?php _e( 'Accessibility Settings', 'a11y-statement' ); ?></h1>
	<h2><?php _e( 'Accessibility Statement Page', 'a11y-statement' ); ?></h2>

	<?php
	if ( $accessibility_statement_exists ) {
		$edit_href = add_query_arg(
			array(
				'post'   => $accessibility_statement_id,
				'action' => 'edit',
			),
			admin_url( 'post.php' )
		);

		$view_href = get_permalink( $accessibility_statement_id );

		?>
		<p>
			<?php
			if ( 'publish' === get_post_status( $accessibility_statement_id ) ) {
				printf(
					/* translators: 1: URL to edit Accessibility Statement page, 2: URL to view Accessibility Statement page. */
					__( '<a href="%1$s">Edit</a> or <a href="%2$s">view</a> your Accessibility Statement page content.' ),
					esc_url( $edit_href ),
					esc_url( $view_href )
				);
			} else {
				printf(
					/* translators: 1: URL to edit Accessibility Statement page, 2: URL to preview Accessibility Statement page. */
					__( '<a href="%1$s">Edit</a> or <a href="%2$s">preview</a> your Accessibility Statement page content.' ),
					esc_url( $edit_href ),
					esc_url( $view_href )
				);
			}
			?>
		</p>
		<?php
	}
	?>

	<table role="presentation" class="form-table tools-privacy-policy-page">
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

						wp_nonce_field( 'set_accessibility_statement', 'set_accessibility_statement' );

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
					wp_nonce_field( 'create_accessibility_statement', 'create_accessibility_statement' );

					submit_button( __( 'Create New Page' ), 'primary', 'submit', false, array( 'id' => 'create-page' ) );
					?>
				</form>
			</td>
		</tr>
	</table>
</div>
