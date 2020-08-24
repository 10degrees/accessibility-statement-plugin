<?php

class YourEfforts extends AbstractSettingsSection
{
    protected $id = 'your_efforts';
    protected $title = 'Your Efforts';

    public function __construct()
    {
        $this->fields = [
            new Checkboxes([
                'id' => 'measures',
                'label' => 'Organizational measures',
                'options' => [
                    [
                        'label' => 'Include accessibility as part of our mission statement.',
                        'value' => 'Include accessibility as part of our mission statement.',
                    ],
                    [
                        'label' => 'Include accessibility throughout our internal policies.',
                        'value' => 'Include accessibility throughout our internal policies.',
                    ],
                    [
                        'label' => '
                        Integrate accessibility into our procurement practices.',
                        'value' => 'Integrate accessibility into our procurement practices.',
                    ],
                    [
                        'label' => 'Appoint an accessibility officer and/or ombudsperson.',
                        'value' => 'Appoint an accessibility officer and/or ombudsperson.',
                    ],
                    [
                        'label' => 'Provide continual accessibility training for our staff.',
                        'value' => 'Provide continual accessibility training for our staff.',
                    ],
                    [
                        'label' => 'Assign clear accessibility targets and responsibilities.',
                        'value' => 'Assign clear accessibility targets and responsibilities.',
                    ],
                    [
                        'label' => 'Employ formal accessibility quality assurance methods.',
                        'value' => 'Employ formal accessibility quality assurance methods.',
                    ],
                ],
            ]),
            new DynamicTextFields([
                'id' => 'additional_measures',
                'label' => 'Additional Measures',
                'button_label' => 'Add Measure',
            ]),
        ];

        parent::__construct();
    }
}
