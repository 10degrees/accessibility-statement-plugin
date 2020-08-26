<?php

class ApprovalAndComplaints extends AbstractSettingsSection
{
    protected $id = 'approval_and_complaints';
    protected $fields = [];

    public function __construct()
    {
        $this->title = __('Approval and complaints process', 'a11y-statement');

        $this->fields = [
            new TextField([
                'id' => 'approval_person_or_department',
                'label' => __('Approval person or department', 'a11y-statement'),
                'description' => __('(Example: “Communication Department”)', 'a11y-statement')
            ]),
            new TextField([
                'id' => 'approval_function',
                'label' => __('Approval Function', 'a11y-statement'),
                'description' => __('(Example: “Director of Communication”)', 'a11y-statement')
            ]),
            new TextArea([
                'id' => 'formal_complaints_procedure',
                'label' => __('Formal Complaints Procedure', 'a11y-statement'),
                'description' => __('Describe any formal complaints procedures', 'a11y-statement'),
            ]),
        ];

        parent::__construct();
    }

    public function render()
    {
        echo '<p>';
        _e('In this section you can add information about the formal approval of this accessibility statement and, if applicable, any complaints escalation procedure.', 'a11y-statement');
        echo '</p>';
    }
}
