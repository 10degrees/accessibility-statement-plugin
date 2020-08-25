<?php

/**
 * Plugin Name: Accessibility Statement Generator
 * Description: Generates an accessibility statement.
 * Version: 0.1
 * Author: 10 Degrees
 * Author URI: https://www.10degrees.uk/
 */

require_once 'helpers.php';
require_once 'Fields/AbstractField.php';
require_once 'Fields/TextField.php';
require_once 'Fields/RadioButtons.php';
require_once 'Fields/Checkboxes.php';
require_once 'Fields/TextArea.php';
require_once 'Fields/DynamicTextFields.php';
require_once 'Fields/Repeater.php';

require_once 'AccessibilityStatementPlugin.php';
require_once 'Sections/AbstractSettingsSection.php';
require_once 'Sections/BasicInformation.php';
require_once 'Sections/YourEfforts.php';
require_once 'Sections/ApprovalAndComplaints.php';
require_once 'Sections/TechnicalInformation.php';
require_once 'Sections/AccessibilityLimitations.php';

new AccessibilityStatementPlugin();

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'addSettingsLink');

function addSettingsLink($links)
{
    $links[] = '<a href="' .
        admin_url('options-general.php?page=accessibility-statement') .
        '">' . __('Settings') . '</a>';
    return $links;
}

add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

function add_type_attribute($tag, $handle, $src)
{
    // if not your script, do nothing and return original $tag
    if ('accessibility-statement-generator' !== $handle) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}
