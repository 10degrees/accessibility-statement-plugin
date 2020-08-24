<?php

class ApprovalAndComplaints extends AbstractSettingsSection
{
    protected $id = 'approval_and_complaints';
    protected $title = 'Approval and complaints process';
    protected $fields = [];

    public function __construct()
    {
        $this->fields = [
            new TextField([
                'id' => 'approval_person_or_department',
                'label' => 'Approval person or department',
                'description' => '(Example: “Communication Department”)'
            ]),
            new TextField([
                'id' => 'approval_function',
                'label' => 'Approval Function',
                'description' => '(Example: “Director of Communication”)'
            ]),
            new TextArea([
                'id' => 'formal_complaints_procedure',
                'label' => 'Formal Complaints Procedure',
                'description' => 'Describe any formal complaints procedures',
            ]),
        ];

        parent::__construct();
    }

    public function render()
    {
        echo '<p>In this section you can add information about the formal approval of this accessibility statement and, if applicable, any complaints escalation procedure.</p>';
    }
}
