<?php
/**
 * Admin Page
 */

if ( isset( $_GET[ 'success' ] ) ) {
	?>
	<div class="notice updated">
		<p><?php _e( 'Accessibility statement has been updated.', 'a11y-statement' ); ?></p>
	</div>
	<?php
}

if ( isset( $_GET[ 'error' ] ) ) {
	?>
	<div class="notice error">
		<p><?php _e( 'Error while updating accessibility statement.', 'a11y-statement' ); ?></p>
	</div>
	<?php
}

$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $sections[0]->get_id();  ?>  

<div class="wrap">
	<h1><?php _e( 'Accessibility Statement', 'a11y-statement' ); ?></h1>

	<h2 class="nav-tab-wrapper">
		<?php foreach ( $sections as $section ) : ?>
			<a href="<?php echo admin_url( 'options-general.php?page=accessibility-statement&tab=' . $section->get_id() ); ?>" class="nav-tab<?php echo $active_tab === $section->get_id() ? ' nav-tab-active' : ''; ?>"><?php echo $section->get_title(); ?></a>
		<?php endforeach; ?>
	</h2>

	<form action="options.php" method="POST" class="main-settings">
		<?php
		settings_fields( $active_tab );
		do_settings_sections( $active_tab );

		submit_button();
		?>
	</form>

	<form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="POST">
		<input type="hidden" name="action" value="generate_statement">
		<?php submit_button( __( 'Generate Statement', 'a11y-statement' ), 'secondary' ); ?>
	</form>
</div>
