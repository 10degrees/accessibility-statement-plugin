<?php

/**
 * Load a view and pass variables into it
 *
 * To ouput a view you would want to echo it
 *
 * @param  string $file_name excluding file extension.
 * @param  array  $vars Variables to make available in the file.
 *
 * @return string The view HTML.
 */
function psg_view( $file_name, $vars = array() ) {
	foreach ( $vars as $key => $value ) {
		${$key} = $value;
	}

	ob_start();

	include plugin_dir_path( __FILE__ ) . '/' . $file_name . '.php';

	return ob_get_clean();
}


/**
 * Determine if we have a selected accessibility statement, and that it isn't in the trash
 *
 * @return  boolean  True if we have a accessibility statement that isn't in the trash, else false.
 */
function wp_accessibility_statement_exists() {
	$accessibility_statement_id = (int) get_option( 'wp_page_for_accessibility_statement' );

	// Have Accessibility Statement ID?
	if ( empty( $accessibility_statement_id ) ) {
		return false;
	}
	
	$accessibility_statement = get_post( $accessibility_statement_id );

	// Accessibility Statement is a Post?
	if ( ! $accessibility_statement instanceof WP_Post ){
		return false;
	}

	// Accessibility Statement is in the trash?
	if ( 'trash' === $accessibility_statement->post_status ) {
		return false;
	}

	return true;
}