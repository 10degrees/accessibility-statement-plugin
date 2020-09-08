<?php if ( isset( $approved_by ) && $approved_by ) : ?>
	<h2><?php esc_html_e( 'Formal approval of this accessibility statement', 'a11y-statement' ); ?></h2>

	<p><?php esc_html_e( 'This Accessibility Statement is approved by:', 'a11y-statement' ); ?></p>
	<p><?php esc_html_e( $approved_by ); ?></p>
	<p><?php esc_html_e( $approval_function ); ?></p>
<?php endif; ?>
