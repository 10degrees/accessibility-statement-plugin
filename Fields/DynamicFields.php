<?php

class DynamicFields extends AbstractField
{
    private $fields;
    private $button_label = 'Add Section';

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
    }

    public function register()
    {

        foreach ($this->fields as $field) {
            $field->setPage($this->page_id);

            $field->addClass('dynamic');
            $field->addClass($this->id);

            $field->setFieldName($field->getId());
        }

        parent::register();
    }

    public function render($value = "")
    {
        $current_rows = get_option($this->id);
        $this->renderSavedValues(); 
        
        if(!count($current_rows)){
            $this->renderBlankInputs();
        }
        ?>
        <input type="hidden" class="hidden <?php echo $this->id?>_fields" value="<?php echo count($this->fields); ?>">
        <button class="button secondary add-dynamic" data-name="<?php echo $this->id; ?>"><?php echo $this->button_label; ?></button>
        <?php
    }

    private function renderSavedValues()
    {
        $current_rows = get_option($this->id);

        $i = 0;
        foreach ($current_rows as $row) {
            foreach ($this->fields as $field) { ?>
                <div class="<?php echo $this->id; ?>">
                    <?php $field->setID($this->id . '['. $i .'][' . $field->getFieldName() . ']'); ?>
                    <?php $field->renderField($current_rows[$i][$field->getFieldName()]);?>
                </div>
            <?php 
            }
            $i++;
        }
    }

    private function renderBlankInputs()
    {
        $current_rows = get_option($this->id);
        foreach ($this->fields as $field) { ?>
            <div class="<?php echo $this->id; ?>">
                <?php $field->setID($this->id . '['. count($current_rows) .'][' . $field->getFieldName() . ']');?>
                <?php $field->renderField();?>
            </div>
        <?php }
    }

    public function sanitize($input)
    {
        $sanitized_input = [];

        foreach($input as $row){
            if(array_filter($row)){
                $sanitized_input[] = $row;
            }
        }

        return $sanitized_input;
    }
}
