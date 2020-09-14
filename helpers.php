<?php
/**
 * Helper functions for the Accessibility Statement functionality
 *
 * @package Accessibility Statement Generator
 */

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
	if ( ! $accessibility_statement instanceof WP_Post ) {
		return false;
	}

	// Accessibility Statement is in the trash?
	if ( 'trash' === $accessibility_statement->post_status ) {
		return false;
	}

	return true;
}

/**
 * Get the URL of the Accessibility Statement
 *
 * @return  string  URL of the Accessibility Statement
 */
function wp_get_accessibility_statement_page_url() {
	$url                        = '';
	$accessibility_statement_id = (int) get_option( 'wp_page_for_accessibility_statement' );

	if ( ! empty( $accessibility_statement_id ) && get_post_status( $accessibility_statement_id ) === 'publish' ) {
		$url = (string) get_permalink( $accessibility_statement_id );
	}

	return apply_filters( 'accessibility_statement_url', $url, $accessibility_statement_id );
}
