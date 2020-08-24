<?php

class AccessibilityStatementGenerator
{
    public function createPage()
    {
        $title = get_option('page_title');

        $page = get_page_by_title($title);

        $statement_page = [
            'post_title' => $title,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_content' => $this->generate(),
        ];

        if ($page) {
            $statement_page['ID'] = $page->ID;
        }
        wp_insert_post($statement_page);

        wp_redirect(admin_url('options-general.php?page=accessibility-statement'));
    }

    public function generate()
    {
        $website_name = get_option('website_name');
        $organisation = get_option('organisation_name');
        $standard = get_option('standard_followed');

        if ($standard == 'other') {
            $standard = get_option('other_standard');
        }

        $conformance_status = get_option('conformance_status');

        $conformance_details = [];
        if ($conformance_status != 'none') {
            $conformance_details = $this->getConformanceDetails(get_option('conformance_status'));
        }

        $additional_considerations = get_option('additional_considerations');

        return td_view('statement', [
            'website_name' => $website_name,
            'organisation' => $organisation,
            'standard' => $standard,
            'measures' => get_option('measures'),
            'status' => $conformance_status,
            'details' => $conformance_details,
            'additional_considerations' => $additional_considerations,
        ]);
    }

    public function getConformanceDetails($status)
    {
        switch ($status) {
            case 'fully':
                return [
                    'name' => 'fully conformant',
                    'description' => 'Fully conformant means that the content fully conforms to the accessibility standard without any exceptions.',
                ];
                break;
            case 'partially':
                return [
                    'name' => 'partially conformant',
                    'description' => 'Partially conformant means that some parts of the content do not fully conform to the accessibility standard.',
                ];
                break;
            case 'non_conformant':
                return [
                    'name' => 'non conformant',
                    'description' => 'Non conformant means that the content does not conform the accessibility standard.',
                ];
                break;
            case 'not_assessed':
                return [
                    'name' => 'not assessed',
                    'description' => 'Not assessed means that the content has not been evaluated or the evaluation results are not available.',
                ];
                break;

            default:
                return [
                    'name' => '',
                    'description' => '',
                ];
        }
    }
}
