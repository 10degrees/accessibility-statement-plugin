<?php if ( isset( $report ) && $report ) : ?>
	<h2><?php _e( 'Evaluation report', 'a11y-statement' ); ?></h2>
	<p><?php _e( 'An evaluation report for', 'a11y-statement' ); ?> <?php echo $website_name; ?> <?php _e( 'is available at:', 'a11y-statement' ); ?> <a href="<?php echo esc_url( $report ); ?>"><?php esc_html_e( $report ); ?></a></p>
<?php endif; ?>

<?php if ( isset( $statement ) && $statement ) : ?>
	<h2><?php _e( 'Evaluation statement', 'a11y-statement' ); ?></h2>
	<p><?php _e( 'An evaluation statement for', 'a11y-statement' ); ?> <?php echo $website_name; ?> <?php _e( 'is available at:', 'a11y-statement' ); ?> <a href="<?php echo esc_url( $statement ); ?>"><?php esc_html_e( $statement ); ?></a></p>
<?php endif; ?>


<?php if ( isset( $other_evidence ) && count( $other_evidence ) ) : ?>
	<h2><?php _e( 'Other evidence', 'a11y-statement' ); ?></h2>
	<p><?php _e( 'Other related evidence for', 'a11y-statement' ); ?> <?php echo $website_name; ?> <?php _e( 'is available at:', 'a11y-statement' ); ?></p>
	<ul>
		<?php foreach ( $other_evidence as $evidence ) : ?>
			<li><?php esc_html_e( $evidence ); ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
