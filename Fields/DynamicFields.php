<?php

class DynamicFields extends AbstractField
{
    /**
     * Field that can be repeated
     *
     * @var array
     */
    private $fields;
    
    /**
     * Label used on a button to add a new row
     *
     * @var string
     */
    private $button_label = 'Add Section';
    
    /**
     * The currently saved rows
     *
     * @var array
     */
    private $saved_rows = [];

    /**
     * Original number of fields
     *
     * @var int
     */
    private $original_number_of_inputs;

    public function __construct($args)
    {
        [
            'fields' => $fields,
            'button_label' => $button_label,
        ] = $args;

        if ($button_label) {
            $this->button_label = $button_label;
        }
        
        parent::__construct($args);

        $this->saved_rows = get_option($this->id);
        $this->fields = $this->getAllInputs($fields);
        $this->original_number_of_inputs = count($fields);
    }

    private function getAllInputs($template)
    {
        $all_fields = [];

        $i = 0;

        foreach ($this->saved_rows as $row) {
            foreach ($template as $field) {
                $clone = clone $field;

                $clone->addClass($this->id);
                $clone->setId($this->buildFieldID($field, $i));

                $all_fields[] = $clone;
            }
            $i++;
        }
        
        if (!count($this->saved_rows)) {
            foreach ($template as $field) {
                $clone = clone $field;

                $clone->addClass($this->id);
                $clone->setId($this->buildFieldID($field, count($this->saved_rows)));

                $all_fields[] = $clone;
            }
        }

        return $all_fields;
    }

    /**
     * Render this field
     *
     * @param   string  $value  Current Value
     *
     * @return  void          
     */
    public function renderInput($value = "")
    {
        $this->renderFields();
        
        ?>
        <input type="hidden" class="hidden <?php echo $this->id?>_fields" value="<?php echo $this->original_number_of_inputs; ?>">
        <button class="button secondary add-dynamic" data-name="<?php echo $this->id; ?>"><?php echo $this->button_label; ?></button>
        <?php
    }

    /**
     * Render inputs containing saved values
     *
     * @return  void
     */
    private function renderFields()
    {
        $i = 0;
        $row_index = 0;
        foreach ($this->fields as $field) {
            $value = "";
            if (count($this->saved_rows)) {
                $key_index = $i % $this->original_number_of_inputs;
                $value = array_values($this->saved_rows[$row_index])[$key_index];
            }
            ?>
            <div class="<?php echo $this->id; ?>">
                <?php $field->renderField($value); ?>
            </div>
            <?php
            $i++;

            if (($i % $this->original_number_of_inputs) == 0) {
                $row_index++;
            }
        }

    }

    /**
     * Build the ID for a field
     *
     * @param   AbstractField  $field       Field
     * @param   int  $row_number  Row Number
     *
     * @return  string               ID for the field
     */
    private function buildFieldID($field, $row_number)
    {
        return $this->id . '['. $row_number .'][' . $field->getId() . ']';
    }

    /**
     * Remove any rows that contain fully empty values
     *
     * @param   array  $input  Input values
     *
     * @return  array          Sanitized input
     */
    public function sanitize($input)
    {
        $sanitized_input = [];

        foreach ($input as $row) {
            if (array_filter($row)) {
                $sanitized_input[] = $row;
            }
        }

        return $sanitized_input;
    }
}
