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
        ob_start();

        $this->getIntroduction();

        $this->getStatusDescription();

        $this->getFeedbackSection();

        $this->getMeasures();

        $this->getCompatibilityInformation();

        $this->getAdditionalConsiderations();

        $this->getApprovalStatement();

        $this->getComplaintsProcedure();

        $this->getFooter();

        return ob_get_clean();
    }

    private function getComplaintsProcedure()
    {
        echo psg_view('partials/complaints-procedure', [
            'complaints_procedure' => get_option('formal_complaints_procedure'),
        ]);
    }
    
    private function getApprovalStatement()
    {
        echo psg_view('partials/approval-statement', [
            'approval_function' => get_option('approval_function'),
            'approved_by' => get_option('approval_person_or_department'),
        ]);
    }

    private function getAdditionalConsiderations()
    {
        echo psg_view('partials/additional-considerations', [
            'additional_considerations' => get_option('additional_considerations'),
        ]);
    }

    private function getMeasures()
    {
        echo psg_view('partials/measures', [
            'website_name' => get_option('website_name'),
            'organisation' => get_option('organisation_name'),
            'measures' => get_option('measures'),
            'additional_measures' => get_option('additional_measures'),
        ]);
    }

    private function getCompatibilityInformation()
    {   
        echo psg_view('partials/compatibilities', [
            'website_name' => get_option('website_name'),
            'compatible_environments' => get_option('compatible_environments'),
            'known_incompatibilities' => get_option('incompatible_environments')
        ]);
    }

    private function getFeedbackSection()
    {
        echo psg_view("partials/feedback", [
            'website_name' => get_option('website_name'),
            'contact_details' => [
                'phone' => get_option('contact_phone'),
                'email' => get_option('contact_email'),
                'visitor_address' => get_option('contact_visitor_address'),
                'postal_address' => get_option('contact_postal_address'),
                'other' => get_option('other_contact_options')
            ],
            'feedback_time' => get_option('duration_for_response'),
        ]);
    }

    private function getStatusDescription()
    {
        $conformance_status = get_option('conformance_status');

        $conformance_details = [];
        if ($conformance_status != 'none') {
            $conformance_details = $this->getConformanceDetails(get_option('conformance_status'));
        }
        
        $standard = get_option('standard_followed');

        if ($standard == 'other') {
            $standard = get_option('other_standard');
        }

        echo psg_view('partials/status', [
            'status' => $conformance_status,
            'details' => $conformance_details,
            'standard' => $standard,
            'website_name' => get_option('website_name')
        ]);
    }

    private function getFooter()
    {
        echo psg_view('partials/footer', [
            'date_of_publication' => get_option('date_of_publication'),
        ]);
    }

    private function getIntroduction()
    {
        $website_name = get_option('website_name');
        $organisation = get_option('organisation_name');

        echo psg_view('partials/introduction', [
            'website_name' => $website_name,
            'organisation' => $organisation,
        ]);
    }

    public function getConformanceDetails($status)
    {
        $conformance_details = [
            'fully' => [
                'name' => 'fully conformant',
                'description' => __('Fully conformant means that the content fully conforms to the accessibility standard without any exceptions.', 'a11y-statement'),
            ],
            'partially' => [
                'name' => 'partially conformant',
                'description' => __('Partially conformant means that some parts of the content do not fully conform to the accessibility standard.', 'a11y-statement'),
            ],
            'non_conformant' => [
                'name' => 'non conformant',
                'description' => __('Non conformant means that the content does not conform the accessibility standard.', 'a11y-statement'),
            ],
            'not_assessed' => [
                'name' => 'not assessed',
                'description' => __('Not assessed means that the content has not been evaluated or the evaluation results are not available.', 'a11y-statement'),
            ],
        ];

        $default = [
            'name' => '',
            'description' => ''
        ];

        if(!$status || (!array_key_exists($status, $conformance_details))) {
            return $default;
        }

        return $conformance_details[$status];
    }
}
