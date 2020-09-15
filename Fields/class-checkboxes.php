<?php

/**
 * Create a set of checkboxes
 */
class Checkboxes extends AbstractField {
	/**
	 * Checkbox options
	 *
	 * @var array
	 */
	private $options;

	/**
	 * Constructor
	 *
	 * @param array $args  Field arguments.
	 */
	public function __construct( $args ) {
		if ( isset( $args['options'] ) ) {
			$this->options = $args['options'];
		}
		parent::__construct( $args );
	}

	/**
	 * Render the checkboxes
	 *
	 * @param   array $value  Selected checkboxes.
	 *
	 * @return  void
	 */
	public function render_input( $value = null ) {

		$current_values = get_option( $this->id );
		if ( ! is_array( $current_values ) ) {
			$current_values = array();
		}

		foreach ( $this->options as $option ) { ?>
			<label>
				<input type="checkbox" name="<?php echo $this->id; ?>[]" value="<?php echo $option['value']; ?>" <?php checked( in_array( $option['value'], $current_values ), true ); ?>>
				<?php echo $option['label']; ?>
			</label>
			<br>
			<?php
		}
	}

	/**
	 * Sanitize the checkbox input
	 *
	 * @param   array  $input  Chosen values
	 *
	 * @return  array          Sanitizes values
	 */
	public function sanitize( $input ) {
		$sanitized_input = array();

		foreach ($input as $checkbox_value) {
			$sanitized_input[] = sanitize_text_field( $checkbox_value );
		}

		return $sanitized_input;
	}
}
