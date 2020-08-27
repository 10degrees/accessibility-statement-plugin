<?php

class TextArea extends AbstractField
{
    public function renderInput($value = null)
    {
        $rendered_value = get_option($this->id);
        if($value){
            $rendered_value = $value;
        }
        ?>
            <textarea name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>" cols="50" rows="5"><?php echo $rendered_value; ?></textarea>
        <?php
    }
}
