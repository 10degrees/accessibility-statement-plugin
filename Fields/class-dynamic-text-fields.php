<?php
/**
 * Field to display a user chosen amount of Text Fields
 */
class DynamicTextFields extends AbstractField {

	/**
	 * Text to show in the button to add a new text field
	 *
	 * @var string
	 */
	private $button_label = 'Add Option';

	/**
	 * Constructor
	 *
	 * @param array $args  Field arguments.
	 */
	public function __construct( $args ) {
		if ( $args['button_label'] ) {
			$this->button_label = $args['button_label'];
		}

		if ( ! $args['other'] ) {
			$args['other'] = array();
		}

		$args['other']['class'] .= 'dynamicTextField';

		parent::__construct( $args );
	}

	/**
	 * Render the text fields
	 *
	 * @param   array $value  Array of current field values.
	 *
	 * @return void
	 */
	public function render_input( $value = null ) {
		$existing_values = get_option( $this->id );
		if ( ! $existing_values ) {
			$existing_values = array();
		} ?>

		<div class="inputs">

		<?php
		$i = 0;
		foreach ( $existing_values as $value ) :
			?>
			<input type="text" name="<?php echo $this->id; ?>[<?php echo $i; ?>]" value="<?php echo $value; ?>" class="regular-text"/>
			<?php
			$i++;
		endforeach;

		if ( count( $existing_values ) === 0 ) :
			?>
			<input type="text" name="<?php echo $this->id; ?>[0]" class="regular-text"/>
		<?php endif; ?>
		</div>
		<button class="button addTextField" data-name="<?php echo $this->id; ?>"><?php echo $this->button_label; ?></button>
		<?php
	}

	/**
	 * Sanitise the text fields
	 *
	 * @param   array $input  Current values.
	 *
	 * @return  array          Sanitised values
	 */
	public function sanitize( $input ) {
		// Remove all empty strings.
		$new_array = array();
		foreach ( $input as $value ) {
			if ( $value ) {
				$new_array[] = sanitize_text_field( $value );
			}
		}

		return $new_array;
	}
}
