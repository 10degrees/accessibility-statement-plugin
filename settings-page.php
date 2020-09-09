<?php
/**
 * Admin Page
 */

$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $sections[0]->get_id();  ?>  

<div class="wrap">
	<h1><?php _e( 'Accessibility Statement', 'a11y-statement' ); ?></h1>

	<h2 class="nav-tab-wrapper">
		<?php
		foreach ( $sections as $section ) :
			$section_url   = admin_url( 'options-general.php?page=accessibility-statement&tab=' . $section->get_id() );
			$is_active_tab = $active_tab === $section->get_id();
			$active_class  = $is_active_tab ? 'nav-tab-active' : '';
			?>
			<a href="<?php echo esc_url( $section_url ); ?>" class="nav-tab<?php echo $active_class; ?>"><?php echo esc_html( $section->get_title() ); ?></a>
		<?php 
		endforeach; 
		?>
	</h2>

	<form action="options.php" method="POST" class="main-settings">
		<?php
		settings_fields( $active_tab );
		do_settings_sections( $active_tab );

		submit_button();
		?>
	</form>

	<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST">
		<input type="hidden" name="action" value="generate_statement">
		<?php submit_button( __( 'Generate Statement', 'a11y-statement' ), 'secondary' ); ?>
	</form>
</div>
