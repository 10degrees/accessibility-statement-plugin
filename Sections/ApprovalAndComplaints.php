<?php

class ApprovalAndComplaints extends AbstractSettingsSection
{
    public $id = 'approval_and_complaints';
    public $title = 'Approval and complaints process';
    public $fields = [];

    public function __construct()
    {
        $this->fields = [
            new TextField([
                'id' => 'approval_person_or_department',
                'label' => 'Approval person or department',
            ]),
            new TextField([
                'id' => 'approval_function',
                'label' => 'Approval Function',
            ]),
            new TextArea([
                'id' => 'formal_complaints_procedure',
                'label' => 'Formal Complaints Procedure',
            ]),
        ];

        parent::__construct();
    }

    public function render()
    {
        echo '<p>In this section you can add information about the formal approval of this accessibility statement and, if applicable, any complaints escalation procedure.</p>';
    }
}
