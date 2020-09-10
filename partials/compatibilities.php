<?php
$have_compatible_environments = isset( $compatible_environments ) && count( $compatible_environments );
$have_incompatibilities       = isset( $known_incompatibilities ) && count( $known_incompatibilities );

if ( $have_compatible_environments || $have_incompatibilities ) : ?>

	<h2><?php esc_html_e( 'Compatibility with browsers and assistive technology', 'a11y-statement' ); ?></h2>

	<?php if ( $have_compatible_environments ) : ?>
		<p><?php echo esc_html( $website_name ); ?> <?php esc_html_e( 'is designed to be compatible with the following assistive technologies:', 'a11y-statement' ); ?></p>
		<ul>
			<?php foreach ( $compatible_environments as $environment ) : ?>
				<li><?php echo esc_html( $environment ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if ( $have_incompatibilities ) : ?>
		<p><?php echo esc_html( $website_name ); ?> <?php esc_html_e( 'is not compatible with:', 'a11y-statement' ); ?></p>
		<ul>
			<?php foreach ( $known_incompatibilities as $incompatibility ) : ?>
				<li><?php echo esc_html( $incompatibility ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<?php endif; ?>
