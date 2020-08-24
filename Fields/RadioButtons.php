<?php

/**
 * Create a set of radio buttons
 */
class RadioButtons extends AbstractField
{
    private $options;

    public function __construct($args)
    {
        if (isset($args['options'])) {
            $this->options = $args['options'];
        }
        parent::__construct($args);
    }

    public function render()
    {
        ?> 
        <fieldset>
            <?php foreach ($this->options as $option) { ?>
                <label>
                    <input type="radio" name="<?php echo $this->id ?>" value="<?php echo $option['value']; ?>" <?php checked($option['value'], get_option($this->id), true); ?>>
                    <?php echo $option['label']; ?>
                </label>
                <br>
                <?php
            } ?>
        </fieldset>
        <?php
    }
}
