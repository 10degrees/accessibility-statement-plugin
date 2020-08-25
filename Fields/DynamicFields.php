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

            $field->setID($this->id . '_' . $field->getId() . '[0]');

            $field->register();
        }

        parent::register();
    }

    public function render()
    {
        ?>
        <input type="hidden" class="hidden <?php echo $this->id?>_fields" value="<?php echo count($this->fields); ?>">
        <button class="button secondary add-dynamic" data-name="<?php echo $this->id; ?>"><?php echo $this->button_label; ?></button>
        <?php
    }
}
