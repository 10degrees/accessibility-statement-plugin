<?php

class TechnicalInformation extends AbstractSettingsSection
{
    protected $id = 'technical_information';
    protected $title = 'Technical Information';

    public function __construct()
    {
        $this->fields = [
        ];

        parent::__construct();
    }
}
