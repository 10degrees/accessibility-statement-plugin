<?php
/**
 * Admin Page
 */

$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $pages[0]->getId();  ?>  

<div class="wrap">
	<h1><?php _e( 'Accessibility Statement', 'a11y-statement' ); ?></h1>

	<h2 class="nav-tab-wrapper">
		<?php foreach ( $sections as $section ) : ?>
			<a href="<?php echo admin_url( 'options-general.php?page=accessibility-statement&tab=' . $section->getId() ); ?>" class="nav-tab<?php echo $active_tab === $section->getId() ? ' nav-tab-active' : ''; ?>"><?php echo $section->getTitle(); ?></a>
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
