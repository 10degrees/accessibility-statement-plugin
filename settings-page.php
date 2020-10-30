<?php
/**
 * Admin Page
 */

$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $sections[0]->get_id();

if ( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) { 
	$page_generated = StatementGenerator::create_page();

	if ( $page_generated ) {
		?>
		<div class="notice updated">
			<p><strong><?php _e('Accessibility Statement updated.'); ?></strong></p>
		</div>
		<?php
	} else {
		?>
		<div class="notice error">
			<p><strong><?php _e('Failed to update Accessibility Statement.'); ?></strong></p>
		</div>
		<?php
	}
}
?>  

<div class="wrap">
	<h1><?php _e( 'Accessibility Statement', 'a11y-statement' ); ?></h1>

	<h2 class="nav-tab-wrapper">
		<?php
		foreach ( $sections as $section ) :
			$section_url   = admin_url( 'options-general.php?page=accessibility-statement&tab=' . $section->get_id() );
			$is_active_tab = $active_tab === $section->get_id();
			$active_class  = $is_active_tab ? 'nav-tab-active' : '';
			?>
			<a href="<?php echo esc_url( $section_url ); ?>" class="nav-tab <?php echo $active_class; ?>"><?php echo esc_html( $section->get_title() ); ?></a>
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
</div>
