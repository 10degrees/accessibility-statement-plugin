<?php

/**
 * Repeater
 *
 * Repeat a given number of fields
 */
class Repeater extends AbstractField {
	/**
	 * Field that can be repeated
	 *
	 * @var array
	 */
	private $fields;

	/**
	 * Label used on a button to add a new row
	 *
	 * @var string
	 */
	private $button_label = 'Add Section';

	/**
	 * The currently saved rows
	 *
	 * @var array
	 */
	private $saved_rows = array();

	/**
	 * Original number of fields
	 *
	 * @var int
	 */
	private $original_number_of_inputs;

	/**
	 * Constructor
	 *
	 * @param   array $args  Field arguments.
	 */
	public function __construct( $args ) {
		[
			'fields' => $fields,
			'button_label' => $button_label,
		] = $args;

		if ( $button_label ) {
			$this->button_label = $button_label;
		}

		parent::__construct( $args );

		$this->saved_rows                = get_option( $this->id );
		$this->fields                    = $this->get_fields( $fields );
		$this->original_number_of_inputs = count( $fields );
	}

	/**
	 * Get the fields to display
	 *
	 * @param  array $template  Array of AbstractFields to use as a template.
	 *
	 * @return  array             Array of AbstractFields built from saved values
	 */
	private function get_fields( $template ) {
		$saved_fields = $this->get_rows_from_saved_values( $template );

		$blank_fields = array();
		if ( ! count( $this->saved_rows ) ) {
			$blank_fields = $this->get_blank_row( $template );
		}

		return array_merge( $saved_fields, $blank_fields );
	}

	/**
	 * Get a blank row
	 *
	 * @param   array $template  Array of AbstractFields to use as a template.
	 *
	 * @return  array             Blank row using the provided template
	 */
	private function get_blank_row( $template ) {
		$blank_fields = array();
		foreach ( $template as $field ) {
			$clone = clone $field;

			$clone->add_class( $this->id );
			$clone->set_id( $this->build_field_id( $field, count( $this->saved_rows ) ) );

			$blank_fields[] = $clone;
		}
		return $blank_fields;
	}

	/**
	 * Get rows to use for saved values
	 *
	 * @param   array $template  Array of AbstractFields to use as a template.
	 *
	 * @return  array             Array of AbstractFields used to display saved values
	 */
	private function get_rows_from_saved_values( $template ) {
		$saved_fields = array();

		$i = 0;
		foreach ( $this->saved_rows as $row ) {
			foreach ( $template as $field ) {
				$clone = clone $field;

				$clone->add_class( $this->id );
				$clone->set_id( $this->build_field_id( $field, $i ) );

				$saved_fields[] = $clone;
			}
			$i++;
		}

		return $saved_fields;
	}

	/**
	 * Render this field
	 *
	 * @param   string $value  Current Value.
	 *
	 * @return  void
	 */
	public function render_input( $value = '' ) {
		$this->render_fields();
		?>
		<input type="hidden" class="hidden <?php echo $this->id; ?>_fields" value="<?php echo $this->original_number_of_inputs; ?>">
		<button class="button secondary add-dynamic" data-name="<?php echo $this->id; ?>"><?php echo $this->button_label; ?></button>
		<?php
	}

	/**
	 * Render all fields
	 *
	 * @return  void
	 */
	private function render_fields() {
		$i         = 0;
		$row_index = 0;
		foreach ( $this->fields as $field ) {
			$value = '';
			if ( count( $this->saved_rows ) ) {
				// Get the value for this field.
				$key_index = $i % $this->original_number_of_inputs;
				$value     = array_values( $this->saved_rows[ $row_index ] )[ $key_index ];
			}
			?>
			<div>
				<?php $field->render_field( $value ); ?>
			</div>
			<?php
			$i++;

			if ( ( $i % $this->original_number_of_inputs ) === 0 ) {
				$row_index++;
			}
		}
	}

	/**
	 * Build the ID for a field
	 *
	 * @param   AbstractField $field       Field.
	 * @param   int           $row_number  Row Number.
	 *
	 * @return  string               ID for the field
	 */
	private function build_field_id( $field, $row_number ) {
		return $this->id . '[' . $row_number . '][' . $field->get_id() . ']';
	}

	/**
	 * Remove any rows that contain fully empty values
	 *
	 * @param   array $input  Input values.
	 *
	 * @return  array          Sanitized input
	 */
	public function sanitize( $input ) {
		$sanitized_input = array();

		foreach ( $input as $row ) {
			$row_have_value = array_filter( $row );

			if ( $row_have_value ) {
				$sanitized_row = array();

				$i = 0;
				foreach ($row as $key => $value) {
					$field = $this->fields[$i];
					$field_class = get_class( $field );
					
					if ($field_class === "TextField") {
						$sanitized_row[$key] = sanitize_text_field( $row[$key] );
					} else {
						$sanitized_row[$key] = $row[$key];
					}

					$i++;
				}

				$sanitized_input[] = $sanitized_row;
			}
		}

		return $sanitized_input;
	}
}
