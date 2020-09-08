<?php

class AccessibilityLimitations extends AbstractSettingsSection
{
    protected $id = 'accessibility_limitations';
    protected $title = 'Accessibility Limitations';

    public function __construct()
    {
        $this->fields = [
            new Repeater([
                'id' => 'accessibility_limitation',
                'label' => 'Accessibility Limitations',
                'button_label' => 'Add another limitation',
                'fields' => [
                    new TextField([
                        'id' => 'content_part',
                        'top_label' => 'Content part',
                        'description' => '(Example: “Comments from users”)',
                    ]),
                    new TextField([
                        'id' => 'description',
                        'top_label' => 'Description of the issue',
                        'description' => '(Example: “Uploaded images may not have text alternatives”)',
                    ]),
                    new TextField([
                        'id' => 'why_the_issue_occurs',
                        'top_label' => 'Why the issue occurs',
                        'description' => '(Example: “We cannot ensure the quality of contributions”)',
                    ]),
                    new TextField([
                        'id' => 'what_we_are_doing',
                        'top_label' => 'What we are doing about it',
                        'description' => '(Example: “We monitor user comments and typically repair issues within 2 business days”)',
                    ]),
                    new TextField([
                        'id' => 'what_to_do_in_the_meantime',
                        'top_label' => 'What to do in the meantime',
                        'description' => '(Example: “Please use the ‘report issue’ button if you encounter an issue”)',
                    ]),
                ],
            ]),
        ];

        parent::__construct();
    }
}
