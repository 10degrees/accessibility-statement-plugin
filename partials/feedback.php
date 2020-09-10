<?php
if ( array_filter( $contact_details ) ) : ?>

	<h2><?php esc_html_e( 'Feedback', 'a11y-statement' ); ?></h2>

	<p><?php esc_html_e( 'We welcome your feedback on the accessibility of', 'a11y-statement' ); ?> <?php echo esc_html( $website_name ); ?><?php esc_html_e( '.', 'a11y-statement' ); ?> <?php esc_html_e( 'Please let us know if you encounter accessibility barriers on', 'a11y-statement' ); ?> <?php echo esc_html( $website_name ); ?>:</p>

	<ul>
		<?php if ( $contact_details['phone'] ) : ?>
			<li><?php esc_html_e( 'Phone:', 'a11y-statement' ); ?> <?php echo esc_html( $contact_details['phone'] ); ?></li>
		<?php endif; ?>
		<?php if ( $contact_details['email'] ) : ?>
			<li><?php esc_html_e( 'Email:', 'a11y-statement' ); ?> <?php echo esc_html( $contact_details['email'] ); ?></li>
		<?php endif; ?>
		<?php if ( $contact_details['visitor_address'] ) : ?>
			<li><?php esc_html_e( 'Visitor address:', 'a11y-statement' ); ?> <?php echo esc_html( $contact_details['visitor_address'] ); ?></li>
		<?php endif; ?>
		<?php if ( $contact_details['postal_address'] ) : ?>
			<li><?php esc_html_e( 'Postal address:', 'a11y-statement' ); ?> <?php echo esc_html( $contact_details['postal_address'] ); ?></li>
		<?php endif; ?>
		<?php if ( $contact_details['other'] ) : ?>
			<li><?php echo esc_html( $contact_details['other'] ); ?></li>
		<?php endif; ?>
	</ul>

	<?php if ( $feedback_time ) : ?>
		<p><?php esc_html_e( 'We try to respond to feedback within', 'a11y-statement' ); ?> <?php echo esc_html( $feedback_time ); ?><?php esc_html_e( '.', 'a11y-statement' ); ?></p>
	<?php endif; ?>
<?php endif; ?>
