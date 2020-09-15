<?php

/**
 * Create a set of radio buttons
 */
class RadioButtons extends AbstractField {

	/**
	 * Radio button options
	 *
	 * @var array
	 */
	private $options;

	/**
	 * Constructor
	 *
	 * @param array $args Field arguments.
	 *
	 * @return void
	 */
	public function __construct( $args ) {
		if ( isset( $args['options'] ) ) {
			$this->options = $args['options'];
		}
		parent::__construct( $args );
	}

	/**
	 * Render the radio buttons
	 *
	 * @param   string $value  Selected value.
	 *
	 * @return  void
	 */
	public function render_input( $value = null ) {
		?> 
		<fieldset>
			<?php foreach ( $this->options as $option ) { ?>
				<label>
					<input type="radio" name="<?php echo $this->id; ?>" value="<?php echo $option['value']; ?>" <?php checked( $option['value'], get_option( $this->id ), true ); ?>>
					<?php echo $option['label']; ?>
				</label>
				<br>
			<?php } ?>
		</fieldset>
		<?php
	}

	/**
	 * Sanitize the radio button input
	 *
	 * @param   string  $input  Chosen radio button value
	 *
	 * @return  string          Sanitized value
	 */
	public function sanitize( $input ) {
		return sanitize_text_field( $input );
	}
}
