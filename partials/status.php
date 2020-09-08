<?php if ( 'none' !== $status ) : ?>
	<h2><?php _e( 'Conformance status', 'a11y-statement' ); ?> </h2>

	<p><?php _e( 'The Web Content Accessibility Guidelines (WCAG) defines requirements for designers and developers to improve accessibility for people with disabilities. It defines three levels of conformance: Level A, Level AA, and Level AAA.', 'a11y-statement' ); ?> <?php echo $website_name; ?> <?php _e( 'is', 'a11y-statement' ); ?> <?php echo $details['name']; ?> <?php _e( 'with', 'a11y-statement' ); ?> <?php echo $standard; ?>. <?php echo $details['description']; ?></p>
<?php endif; ?>
