<?php if ( 'none' !== $status ) : ?>
	<h2><?php esc_html_e( 'Conformance status', 'a11y-statement' ); ?> </h2>

	<p><?php esc_html_e( 'The Web Content Accessibility Guidelines (WCAG) defines requirements for designers and developers to improve accessibility for people with disabilities. It defines three levels of conformance: Level A, Level AA, and Level AAA.', 'a11y-statement' ); ?> <?php echo esc_html( $website_name ); ?> <?php esc_html_e( 'is', 'a11y-statement' ); ?> <?php echo esc_html( $details['name'] ); ?> <?php esc_html_e( 'with', 'a11y-statement' ); ?> <?php echo esc_html( $standard ); ?>. <?php echo esc_html( $details['description'] ); ?></p>
<?php endif; ?>
