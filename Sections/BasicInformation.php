<?php

class BasicInformation extends AbstractSettingsSection
{
    protected $id = 'basic_information';
    protected $title = 'Basic Information';
    protected $fields = [];

    public function __construct()
    {
        $this->fields = [
            new TextField([
                'id' => 'page_title',
                'label' => 'Page Title',
            ]),
            new TextField([
                'id' => 'organisation_name',
                'label' => 'Organisation Name',
            ]),
            new TextField([
                'id' => 'website_name',
                'label' => 'Website Name',
            ]),
            new TextField([
                'id' => 'website_address',
                'label' => 'Website Address',
            ]),
            new RadioButtons([
                'id' => 'standard_followed',
                'label' => 'Standard Followed',
                'options' => [
                    [
                        'label' => 'WCAG 2.1 level AA',
                        'value' => 'WCAG 2.1 level AA',
                    ],
                    [
                        'label' => 'WCAG 2.0 level AA',
                        'value' => 'WCAG 2.0 level AA',
                    ],
                    [
                        'label' => 'Other',
                        'value' => 'other',
                    ],
                ],
            ]),
            new TextField([
                'id' => 'other_standard',
                'label' => 'Enter Standard',
                'other' => [
                    'class' => 'hidden',
                ],
            ]),
            new RadioButtons([
                'id' => 'conformance_status',
                'label' => 'Conformance Status',
                'options' => [
                    [
                        'label' => 'Fully conformant: the content fully conforms to the accessibility standard without any exceptions ',
                        'value' => 'fully',
                    ],
                    [
                        'label' => 'Partially conformant: some parts of the content do not fully conform to the accessibility standard (you can indicate these parts in later sections of this form)',
                        'value' => 'partially',
                    ],
                    [
                        'label' => 'Non conformant: the content does not conform the accessibility standard ',
                        'value' => 'non_conformant',
                    ],
                    [
                        'label' => 'Not assessed: the content has not been evaluated or the evaluation results are not available',
                        'value' => 'not_assessed',
                    ],
                    [
                        'label' => 'None',
                        'value' => 'none',
                    ],
                ],
            ]),
            new TextArea([
                'id' => 'additional_considerations',
                'label' => 'Additional Accessibility Considerations',
            ]),
            new TextField([
                'id' => 'date_of_publication',
                'label' => 'Date of Publication',
                'default_value' => date('dS F Y'),
            ]),
        ];

        parent::__construct();
    }

    public function render()
    {
        echo '<p>In this section you can provide the minimal set of information recommended for your accessibility statement. This includes information about your organization, the accessibility standards you applied, and your contact information for feedback.</p>';
    }
}
