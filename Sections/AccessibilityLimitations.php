<?php

class AccessibilityLimitations extends AbstractSettingsSection
{
    protected $id = 'accessibility_limitations';
    protected $title = 'Accessibility Limitations';

    public function __construct()
    {
        $this->fields = [
            new DynamicFields([
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
                ],
            ]),
        ];

        parent::__construct();
    }
}
