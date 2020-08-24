<?php

/**
 * Create a text field
 */
class TextField extends AbstractField
{
    public function render()
    {
        ?>
            <input type="text" name="<?php echo $this->id; ?>" id="<?php echo $this->id ?>" value="<?php echo get_option($this->id); ?>" class="regular-text">
        <?php
    }
}
