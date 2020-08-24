<?php

class TextArea extends AbstractField
{
    public function render()
    {
        ?>
            <textarea name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>" cols="50" rows="5"><?php echo get_option($this->id); ?></textarea>
        <?php
    }
}
