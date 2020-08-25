<?php

/**
 * Create a text field
 */
class TextField extends AbstractField
{
    public function renderInput($value = null)
    {
        $rendered_value = get_option($this->id);
        if ($value) {
            $rendered_value = $value;
        }

        ?>
            <input type="text" name="<?php echo $this->id; ?>" id="<?php echo $this->id ?>" value="<?php echo $rendered_value; ?>" class="regular-text">
        <?php
    }
}
