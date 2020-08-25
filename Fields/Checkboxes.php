<?php

/**
 * Create a set of checkboxes
 */
class Checkboxes extends AbstractField
{
    private $options;

    public function __construct($args)
    {
        if (isset($args['options'])) {
            $this->options = $args['options'];
        }
        parent::__construct($args);
    }

    public function render($value = "")
    {
        $current_values = get_option($this->id);
        if (!is_array($current_values)) {
            $current_values = [];
        }

        foreach ($this->options as $option) { ?>
            <label>
                <input type="checkbox" name="<?php echo $this->id; ?>[]" value="<?php echo $option['value']; ?>" <?php checked(in_array($option['value'], $current_values), true); ?>>
                <?php echo $option['label']; ?>
            </label>
            <br>
            <?php
        }
    }
}
