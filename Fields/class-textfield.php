<?php

/**
 * Create a text field
 */
class TextField extends AbstractField {
	/**
	 * Render the textfield
	 *
	 * @param  string $value  Current value.
	 *
	 * @return void
	 */
	public function render_input( $value = null ) {
		$rendered_value = get_option( $this->id );
		if ( $value ) {
			$rendered_value = $value;
		}

		?>
			<input type="text" name="<?php echo esc_attr( $this->id ); ?>" id="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $rendered_value ); ?>" class="regular-text">
		<?php
	}

	/**
	 * Sanitize the text field input
	 *
	 * @param   string  $input  Text field input
	 *
	 * @return  string          Sanitized input
	 */
	public function sanitize( $input ) {
		return sanitize_text_field( $input );
	}
}
