<?php

$have_technologies            = isset( $technologies ) && count( $technologies );
$have_additional_technologies = isset( $additional_technologies ) && count( $additional_technologies );

if ( $have_technologies || $have_additional_technologies ) : ?>

	<h2><?php esc_html_e( 'Technical specifications', 'a11y-statement' ); ?></h2>

	<p><?php esc_html_e( 'Accessibility of', 'a11y-statement' ); ?> <?php echo esc_html( $website_name ); ?> <?php esc_html_e( 'relies on the following technologies to work with the particular combination of web browser and any assistive technologies or plugins installed on your computer:', 'a11y-statement' ); ?></p>

	<ul>
		<?php foreach ( $technologies as $tech ) : ?>
			<li><?php echo esc_html( $tech ); ?></li>
		<?php endforeach; ?>
		<?php foreach ( $additional_technologies as $tech ) : ?>
			<li><?php echo esc_html( $tech ); ?></li>
		<?php endforeach; ?>
	</ul>
	<p><?php esc_html_e( 'These technologies are relied upon for conformance with the accessibility standards used.', 'a11y-statement' ); ?></p>
<?php endif; ?>
