<?php

class YourEfforts extends AbstractSettingsSection
{
    protected $id = 'your_efforts';
    protected $title = __('Your Efforts', 'a11y-statement');

    public function __construct()
    {
        $this->fields = [
            new Checkboxes([
                'id' => 'measures',
                'label' => __('Organizational measures', 'a11y-statement'),
                'options' => [
                    [
                        'label' => __('Include accessibility as part of our mission statement.', 'a11y-statement'),
                        'value' => __('Include accessibility as part of our mission statement.', 'a11y-statement'),
                    ],
                    [
                        'label' => __('Include accessibility throughout our internal policies.', 'a11y-statement'),
                        'value' => __('Include accessibility throughout our internal policies.', 'a11y-statement'),
                    ],
                    [
                        'label' => __('Integrate accessibility into our procurement practices.', 'a11y-statement'),
                        'value' => __('Integrate accessibility into our procurement practices.', 'a11y-statement'),
                    ],
                    [
                        'label' => __('Appoint an accessibility officer and/or ombudsperson.', 'a11y-statement'),
                        'value' => __('Appoint an accessibility officer and/or ombudsperson.', 'a11y-statement'),
                    ],
                    [
                        'label' => __('Provide continual accessibility training for our staff.', 'a11y-statement'),
                        'value' => __('Provide continual accessibility training for our staff.', 'a11y-statement'),
                    ],
                    [
                        'label' => __('Assign clear accessibility targets and responsibilities.', 'a11y-statement'),
                        'value' => __('Assign clear accessibility targets and responsibilities.', 'a11y-statement'),
                    ],
                    [
                        'label' => __('Employ formal accessibility quality assurance methods.', 'a11y-statement'),
                        'value' => __('Employ formal accessibility quality assurance methods.', 'a11y-statement'),
                    ],
                ],
            ]),
            new DynamicTextFields([
                'id' => 'additional_measures',
                'label' => __('Additional Measures', 'a11y-statement'),
                'button_label' => __('Add Measure', 'a11y-statement'),
                'description' => __('(Example: “Include people with disabilities in our design personas”)', 'a11y-statement')
            ]),
        ];

        parent::__construct();
    }
}
