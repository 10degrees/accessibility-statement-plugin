<?php
/**
 * Admin Page
 */

$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $pages[0]->getId();  ?>  

<div class="wrap">
	<h1><?php _e( 'Accessibility Statement', 'a11y-statement' ); ?></h1>

	<h2 class="nav-tab-wrapper">
		<?php foreach ( $pages as $settings_page ) : ?>
			<a href="<?php echo admin_url( 'options-general.php?page=accessibility-statement&tab=' . $settings_page->getId() ); ?>" class="nav-tab<?php echo $active_tab === $settings_page->getId() ? ' nav-tab-active' : ''; ?>"><?php echo $settings_page->getTitle(); ?></a>
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
