<?php

class TechnicalInformation extends AbstractSettingsSection
{
    protected $id = 'technical_information';
    protected $title = __('Technical Information', 'a11y-statement');

    public function __construct()
    {
        $this->fields = [
        ];

        parent::__construct();
    }
}
