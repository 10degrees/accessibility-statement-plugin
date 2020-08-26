<?php

class TechnicalInformation extends AbstractSettingsSection
{
    protected $id = 'technical_information';

    public function __construct()
    {
        $this->title = __('Technical Information', 'a11y-statement');

        $this->fields = [
        ];

        parent::__construct();
    }
}
