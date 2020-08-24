<?php

require_once 'AccessibilityStatementGenerator.php';

class AccessibilityStatementPlugin
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addSettingsPage']);
        add_action('admin_post_generate_statement', [$this, 'createPage']);

        add_action('admin_enqueue_scripts', [$this, 'enqueueScripts']);
    }

    public function enqueueScripts()
    {
        wp_enqueue_script('accessibility-statement-generator', plugin_dir_url(__FILE__) . 'src/js/main.js');
        wp_enqueue_style('accessibility-statement-generator', plugin_dir_url(__FILE__) . 'src/css/main.css');
    }

    public function addSettingsPage()
    {
        add_submenu_page('options-general.php', 'Accessibility Statement', 'Accessibility', 'manage_options', 'accessibility-statement', [$this, 'pageContents']);
    }

    public function pageContents()
    {
        include 'settings-page.php';
    }

    public function createPage()
    {
        $generator = new AccessibilityStatementGenerator();
        $generator->createPage();
    }
}
