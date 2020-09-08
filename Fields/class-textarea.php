<?php

/**
 * <textarea> field
 */
class TextArea extends AbstractField {

	/**
	 * Render the TextArea
	 *
	 * @param   string $value  Current value.
	 *
	 * @return  void
	 */
	public function render_input( $value = null ) {
		$rendered_value = get_option( $this->id );
		if ( $value ) {
			$rendered_value = $value;
		}
		?>
			<textarea name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>" cols="50" rows="5"><?php echo $rendered_value; ?></textarea>
		<?php
	}
}
