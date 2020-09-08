<h2><?php _e( 'Limitations and alternatives', 'a11y-statement' ); ?></h2>

<p><?php _e( 'Despite our best efforts to ensure accessibility of', 'a11y-statement' ); ?> <?php echo $website_name; ?><?php _e( ', there may be some limitations. Below is a description of known limitations, and potential solutions. Please contact us if you observe an issue not listed below.', 'a11y-statement' ); ?></p>

<p><?php _e( 'Known limitations for', 'a11y-statement' ); ?> <?php echo $website_name; ?><?php _e( ':', 'a11y-statement' ); ?></p>

<ol>
	<?php foreach ( $limitations as $limitation ) : ?>
		<li><strong><?php echo $limitation['content_part']; ?><?php _e( ':', 'a11y-statement' ); ?></strong> <?php echo $limitation['description']; ?> <?php _e( 'because', 'a11y-statement' ); ?> <?php echo $limitation['why_the_issue_occurs']; ?><?php _e( '.', 'a11y-statement' ); ?> <?php echo $limitation['what_we_are_doing']; ?><?php _e( '.', 'a11y-statement' ); ?> <?php echo $limitation['what_to_do_in_the_meantime']; ?><?php _e( '.', 'a11y-statement' ); ?></li>
	<?php endforeach; ?>
</ol>

