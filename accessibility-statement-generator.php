<?php
/**
 * Plugin Name: Accessibility Statement Generator
 * Description: Generates an accessibility statement.
 * Version: 0.1
 * Author: 10 Degrees
 * Author URI: https://www.10degrees.uk/
 */

require_once 'helpers.php';
require_once 'class-accessibility-statement-plugin.php';

new AccessibilityStatementPlugin();

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'add_settings_link' );

/**
 * Add a Settings link on the plugins page
 *
 * @param   array $links  Array of links.
 *
 * @return  array          Array of links
 */
function add_settings_link( $links ) {
	$links[] = '<a href="' . admin_url( 'options-general.php?page=accessibility-statement' ) . '">' . __( 'Settings', 'a11y-statement' ) . '</a>';
	return $links;
}