<?php

require_once 'AccessibilityStatementGenerator.php';

class AccessibilityStatementPlugin
{
    private $pages = [];

    public function __construct()
    {
        $this->pages = [
            new BasicInformation(),
            new YourEfforts(),
            new TechnicalInformation(),
            new AccessibilityLimitations(),
            new ApprovalAndComplaints(),
        ];

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
        add_submenu_page('options-general.php', __('Accessibility Statement', 'a11y-statement'), __('Accessibility', 'a11y-statement'), 'manage_options', 'accessibility-statement', [$this, 'pageContents']);
    }

    public function pageContents()
    {
        echo psg_view('settings-page', [
            'pages' => $this->pages,
        ]);
    }

    public function createPage()
    {
        $generator = new AccessibilityStatementGenerator();
        $generator->createPage();
    }
}
