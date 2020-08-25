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

    public function __construct($args)
    {
        [
            'fields' => $fields,
            'button_label' => $button_label,
        ] = $args;

        $this->fields = $fields;

        if ($button_label) {
            $this->button_label = $button_label;
        }
        
        parent::__construct($args);

        $this->saved_rows = get_option($this->id);
    }

    /**
     * Register this field and setup the inner fields
     *
     * @return  void
     */
    public function register()
    {
        foreach ($this->fields as $field) {
            $field->addClass($this->id);

            $field->setFieldName($field->getId());
        }

        parent::register();
    }

    /**
     * Render this field
     *
     * @param   string  $value  Current Value
     *
     * @return  void          
     */
    public function render($value = "")
    {
        $this->renderSavedValues();
        
        if (!count($this->saved_rows)) {
            $this->renderBlankInputs();
        }
        ?>
        <input type="hidden" class="hidden <?php echo $this->id?>_fields" value="<?php echo count($this->fields); ?>">
        <button class="button secondary add-dynamic" data-name="<?php echo $this->id; ?>"><?php echo $this->button_label; ?></button>
        <?php
    }

    /**
     * Render inputs containing saved values
     *
     * @return  void
     */
    private function renderSavedValues()
    {
        $i = 0;
        foreach ($this->saved_rows as $row) {
            foreach ($this->fields as $field) { ?>
                <div class="<?php echo $this->id; ?>">
                    <?php $field->setID($this->buildFieldID($field, $i)); ?>
                    <?php $field->renderField($this->saved_rows[$i][$field->getFieldName()]);?>
                </div>
            <?php 
            }
            $i++;
        }
    }

    /**
     * Render blank inputs to enter data into
     *
     * @return  void  
     */
    private function renderBlankInputs()
    {
        foreach ($this->fields as $field) { ?>
            <div class="<?php echo $this->id; ?>">
                <?php $field->setID($this->buildFieldID($field, count($this->saved_rows)));?>
                <?php $field->renderField();?>
            </div>
        <?php }
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
        return $this->id . '['. $row_number .'][' . $field->getFieldName() . ']';
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
