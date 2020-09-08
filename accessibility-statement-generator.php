<?php
/**
 * Plugin Name: Accessibility Statement Generator
 * Description: Generates an accessibility statement.
 * Version: 0.1
 * Author: 10 Degrees
 * Author URI: https://www.10degrees.uk/
 */

require_once 'helpers.php';
require_once 'Fields/class-abstract-field.php';
require_once 'Fields/class-textfield.php';
require_once 'Fields/RadioButtons.php';
require_once 'Fields/class-checkboxes.php';
require_once 'Fields/class-textarea.php';
require_once 'Fields/DynamicTextFields.php';
require_once 'Fields/Repeater.php';

require_once 'class-accessibility-statement-plugin.php';
require_once 'Sections/class-abstract-settings-section.php';
require_once 'Sections/class-basic-information.php';
require_once 'Sections/class-your-efforts.php';
require_once 'Sections/class-approval-and-complaints.php';
require_once 'Sections/class-technical-information.php';
require_once 'Sections/class-accessibility-limitations.php';

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

add_filter( 'script_loader_tag', 'add_type_attribute', 10, 3 );

/**
 * Add the module type to the JS as we use modules
 *
 * @param   string $tag     script tag.
 * @param   string $handle  script handle.
 * @param   string $src     script src.
 *
 * @return  string           The new script tag
 */
function add_type_attribute( $tag, $handle, $src ) {
	// if not your script, do nothing and return original $tag.
	if ( 'accessibility-statement-generator' !== $handle ) {
		return $tag;
	}
	// change the script tag by adding type="module" and return it.
	$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
	return $tag;
}
