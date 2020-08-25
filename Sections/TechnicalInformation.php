<?php

class TechnicalInformation extends AbstractSettingsSection
{
    protected $id = 'technical_information';
    protected $title = 'Technical Information';

    public function __construct()
    {
        $this->fields = [
            new DynamicTextFields([
                'id' => 'compatible_environments',
                'label' => 'Compatibility with user environment',
                'button_label' => 'Add another compatible environment',
                'description' => '(Example: “browser X with assistive technology Y on operating system Z”)',
            ]),
            new DynamicTextFields([
                'id' => 'incompatible_environments',
                'label' => 'Known incompatibility',
                'button_label' => 'Add another incompatible environment',
                'description' => '(Example: “browsers older than 3 major versions” or “Mobile operating systems older than 5 years”)',
            ]),
            new Checkboxes([
                'id' => 'technologies',
                'label' => 'Technologies used',
                'options' => [
                    [
                        'label' => 'HTML',
                        'value' => 'HTML',
                    ],
                    [
                        'label' => 'WAI-ARIA',
                        'value' => 'WAI-ARIA',
                    ],
                    [
                        'label' => 'CSS',
                        'value' => 'CSS',
                    ],
                    [
                        'label' => 'JavaScript',
                        'value' => 'JavaScript',
                    ],
                    [
                        'label' => 'SMIL',
                        'value' => 'SMIL',
                    ],
                ],
            ]),
            new DynamicTextFields([
                'id' => 'additional_technologies',
                'label' => 'Additional Technologies',
                'button_label' => 'Add another technology',
            ]),
            new Checkboxes([
                'id' => 'assessment_approach',
                'label' => 'Assessment approach',
                'options' => [
                    [
                        'label' => 'Self-evaluation: the content was evaluated by your own organization or the developer of the content',
                        'value' => 'self_evaluation',
                    ],
                    [
                        'label' => 'External evaluation: the content was evaluated by an external entity not involved in the design and development process',
                        'value' => 'external_evaluation',
                    ],
                ],
            ]),
            new DynamicTextFields([
                'id' => 'additional_approaches',
                'label' => 'Other Approaches',
                'button_label' => 'Add another approach',
                'description' => '(Example: a formal quality assurance process throughout the design and development process)',
            ]),
            new TextField([
                'id' => 'recent_evaluation_report_link',
                'label' => 'Link to recent evaluation report',
                'description' => '(Example: “https://example.org/accessibility-evaulation-report”)',
            ]),
            new TextField([
                'id' => 'evaluation_statement_link',
                'label' => 'Link to evaluation statement',
                'description' => '(Example: “https://example.org/accessibility-evaulation-statement”)',
            ]),
            new DynamicTextFields([
                'id' => 'other_evidence',
                'label' => 'Other evidence',
                'button_label' => 'Add another related evidence',
                'description' => '(Example: “https://example.org/accessibility-evaulation-certificate”)',
            ]),
            new DynamicFields([
                'id' => 'accessibility_limitation',
                'title' => 'Accessibility Limitations',
                'button_label' => 'Add another limitation',
                'fields' => [
                    new TextField([
                        'id' => 'content_part',
                        'label' => 'Content part',
                        'description' => '(Example: “Comments from users”)',
                    ]),
                    new TextField([
                        'id' => 'description',
                        'label' => 'Description of the issue',
                        'description' => '(Example: “Uploaded images may not have text alternatives”)',
                    ]),
                ],
            ]),
        ];

        parent::__construct();
    }
}
