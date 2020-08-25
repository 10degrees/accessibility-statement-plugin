<?php
class DynamicTextFields extends AbstractField
{
    private $button_label = 'Add Option';

    public function __construct($args)
    {
        if ($args['button_label']) {
            $this->button_label = $args['button_label'];
        }

        if (!$args['other']) {
            $args['other'] = [];
        }

        $args['other']['class'] .= 'dynamicTextField';

        parent::__construct($args);
    }

    public function render($value = "")
    {
        $existing_values = get_option($this->id);
        if (!$existing_values) {
            $existing_values = [];
        } ?>

        <div class="inputs">

        <?php
        $i = 0;
        foreach ($existing_values as $value): ?>
            <input type="text" name="<?php echo $this->id; ?>[<?php echo $i; ?>]" value="<?php echo $value; ?>" class="regular-text"/>
        <?php
            $i++;
        endforeach;

        if (count($existing_values) == 0):?>
            <input type="text" name="<?php echo $this->id; ?>[0]" value="<?php echo $value; ?>" class="regular-text"/>
        <?php endif; ?>
        </div>
        <button class="button addTextField" data-name="<?php echo $this->id; ?>"><?php echo $this->button_label; ?></button>
        <?php
    }

    public function sanitize($input)
    {
        // Remove all empty strings
        $new_array = [];
        foreach ($input as $value) {
            if ($value) {
                $new_array[] = $value;
            }
        }

        return $new_array;
    }
}
