<?php if ( isset( $report ) && $report ) : ?>
	<h2><?php esc_html_e( 'Evaluation report', 'a11y-statement' ); ?></h2>
	<p><?php esc_html_e( 'An evaluation report for', 'a11y-statement' ); ?> <?php echo esc_html( $website_name ); ?> <?php esc_html_e( 'is available at:', 'a11y-statement' ); ?> <a href="<?php echo esc_url( $report ); ?>"><?php echo esc_html( $report ); ?></a></p>
<?php endif; ?>

<?php if ( isset( $statement ) && $statement ) : ?>
	<h2><?php esc_html_e( 'Evaluation statement', 'a11y-statement' ); ?></h2>
	<p><?php esc_html_e( 'An evaluation statement for', 'a11y-statement' ); ?> <?php echo esc_html( $website_name ); ?> <?php esc_html_e( 'is available at:', 'a11y-statement' ); ?> <a href="<?php echo esc_url( $statement ); ?>"><?php echo esc_html( $statement ); ?></a></p>
<?php endif; ?>


<?php if ( isset( $other_evidence ) && count( $other_evidence ) ) : ?>
	<h2><?php esc_html_e( 'Other evidence', 'a11y-statement' ); ?></h2>
	<p><?php esc_html_e( 'Other related evidence for', 'a11y-statement' ); ?> <?php echo esc_html( $website_name ); ?> <?php esc_html_e( 'is available at:', 'a11y-statement' ); ?></p>
	<ul>
		<?php foreach ( $other_evidence as $evidence ) : ?>
			<li><?php echo esc_html( $evidence ); ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
