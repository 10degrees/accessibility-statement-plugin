<?php

class DynamicFields extends AbstractField
{
    private $fields;
    private $button_label = 'Add Section';
    
    private $current_rows = [];


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

        $this->current_rows = get_option($this->id);
    }

    public function register()
    {
        foreach ($this->fields as $field) {
            $field->addClass($this->id);

            $field->setFieldName($field->getId());
        }

        parent::register();
    }

    public function render($value = "")
    {
        $this->renderSavedValues();
        
        if (!count($this->current_rows)) {
            $this->renderBlankInputs();
        }
        ?>
        <input type="hidden" class="hidden <?php echo $this->id?>_fields" value="<?php echo count($this->fields); ?>">
        <button class="button secondary add-dynamic" data-name="<?php echo $this->id; ?>"><?php echo $this->button_label; ?></button>
        <?php
    }

    private function renderSavedValues()
    {
        $i = 0;
        foreach ($this->current_rows as $row) {
            foreach ($this->fields as $field) { ?>
                <div class="<?php echo $this->id; ?>">
                    <?php $field->setID($this->buildFieldID($field, $i)); ?>
                    <?php $field->renderField($this->current_rows[$i][$field->getFieldName()]);?>
                </div>
            <?php 
            }
            $i++;
        }
    }

    private function renderBlankInputs()
    {
        foreach ($this->fields as $field) { ?>
            <div class="<?php echo $this->id; ?>">
                <?php $field->setID($this->buildFieldID($field, count($this->current_rows)));?>
                <?php $field->renderField();?>
            </div>
        <?php }
    }

    private function buildFieldID($field, $row_number)
    {
        return $this->id . '['. $row_number .'][' . $field->getFieldName() . ']';
    }

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
