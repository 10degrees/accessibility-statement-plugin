<?php
$have_compatible_environments = isset( $compatible_environments ) && count( $compatible_environments );
$have_incompatibilities       = isset( $known_incompatibilities ) && count( $known_incompatibilities );

if ( $have_compatible_environments || $have_incompatibilities ) : ?>

	<h2><?php _e( 'Compatibility with browsers and assistive technology', 'a11y-statement' ); ?></h2>

	<?php if ( $have_compatible_environments ) : ?>
		<p><?php echo $website_name; ?> <?php _e( 'is designed to be compatible with the following assistive technologies:', 'a11y-statement' ); ?></p>
		<ul>
			<?php foreach ( $compatible_environments as $environment ) : ?>
				<li><?php echo $environment; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if ( $have_incompatibilities ) : ?>
		<p><?php echo $website_name; ?> <?php _e( 'is not compatible with:', 'a11y-statement' ); ?></p>
		<ul>
			<?php foreach ( $known_incompatibilities as $incompatibility ) : ?>
				<li><?php echo $incompatibility; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<?php endif; ?>
