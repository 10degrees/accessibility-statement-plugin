<h2><?php esc_html_e( 'Limitations and alternatives', 'a11y-statement' ); ?></h2>

<p><?php esc_html_e( 'Despite our best efforts to ensure accessibility of', 'a11y-statement' ); ?> <?php echo esc_html( $website_name ); ?><?php esc_html_e( ', there may be some limitations. Below is a description of known limitations, and potential solutions. Please contact us if you observe an issue not listed below.', 'a11y-statement' ); ?></p>

<p><?php esc_html_e( 'Known limitations for', 'a11y-statement' ); ?> <?php echo esc_html( $website_name ); ?><?php esc_html_e( ':', 'a11y-statement' ); ?></p>

<ol>
	<?php foreach ( $limitations as $limitation ) : ?>
		<li><strong><?php echo esc_html( $limitation['content_part'] ); ?><?php esc_html_e( ':', 'a11y-statement' ); ?></strong> <?php echo esc_html( $limitation['description'] ); ?> <?php esc_html_e( 'because', 'a11y-statement' ); ?> <?php echo esc_html( $limitation['why_the_issue_occurs'] ); ?><?php esc_html_e( '.', 'a11y-statement' ); ?> <?php echo esc_html( $limitation['what_we_are_doing'] ); ?><?php esc_html_e( '.', 'a11y-statement' ); ?> <?php echo esc_html( $limitation['what_to_do_in_the_meantime'] ); ?><?php esc_html_e( '.', 'a11y-statement' ); ?></li>
	<?php endforeach; ?>
</ol>

