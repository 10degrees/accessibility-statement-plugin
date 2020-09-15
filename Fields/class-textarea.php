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

	/**
	 * Sanitize the textarea input
	 *
	 * @param   string  $input  Input
	 *
	 * @return  string          Sanitized input
	 */
	public function sanitize( $input ) {
		return sanitize_textarea_field( $input );
	}
}
