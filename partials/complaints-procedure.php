<?php if ( isset( $complaints_procedure ) && $complaints_procedure ) : ?>
	<h2><?php esc_html_e( 'Formal complaints', 'a11y-statement' ); ?></h2>
	<p><?php echo esc_html( $complaints_procedure ); ?></p>
<?php endif; ?>
