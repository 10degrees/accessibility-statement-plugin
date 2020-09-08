<?php

/**
 * Settings Field
 */
abstract class AbstractField {
	/**
	 * Field label
	 *
	 * @var string
	 */
	protected $label;

	/**
	 * Field ID
	 *
	 * @var string
	 */
	protected $id;

	/**
	 * Section the field belongs to
	 *
	 * @var string
	 */
	protected $section_id;

	/**
	 * Other arguements to pass to add_settings_field
	 *
	 * @var array
	 */
	protected $other_args;

	/**
	 * Default value of the option
	 *
	 * @var any
	 */
	protected $default_value;

	/**
	 * Constructor
	 *
	 * @param array $args  Arguments.
	 */
	public function __construct( $args ) {
		[
			'id' => $id,
			'label' => $label,
			'top_label' => $top_label,
			'description' => $description,
			'other' => $other,
			'default_value' => $default_value,
		] = $args;

		$this->id            = $id;
		$this->label         = $label;
		$this->default_value = $default_value;
		$this->description   = $description;
		$this->top_label     = $top_label;

		$this->set_other_args( $other );
	}

	/**
	 * Add a CSS class to the field
	 *
	 * @param string $class  CSS class.
	 *
	 * @return  void
	 */
	public function add_class( $class ) {
		$this->other_args['class'] .= $class . ' ';
	}

	/**
	 * Set the field ID
	 *
	 * @param string $new_id  Field ID.
	 *
	 * @return  void
	 */
	public function set_id( $new_id ) {
		$this->id = $new_id;
	}

	/**
	 * Get the Field's ID
	 *
	 * @return  string  Field ID
	 */
	public function get_id() {
		return $this->id;
	}

	/**
	 * Set the other_args parameter
	 *
	 * @param array $other_args  Other args.
	 *
	 * @return  void
	 */
	public function set_other_args( $other_args ) {
		if ( $other_args ) {
			$this->other_args = $other_args;
		} else {
			$this->other_args = array();
		}
	}

	/**
	 * Set the Section ID for this field
	 *
	 * @param string $section_id  Section ID.
	 *
	 * @return  void
	 */
	public function set_section( $section_id ) {
		$this->section_id = $section_id;
	}

	/**
	 * Register the field
	 *
	 * @return  void
	 */
	public function register() {
		add_settings_field(
			$this->id,
			$this->label,
			array( $this, 'render_field' ),
			$this->section_id,
			$this->section_id,
			$this->other_args,
		);

		register_setting(
			$this->section_id,
			$this->id,
			array(
				'sanitize_callback' => array( $this, 'sanitize' ),
				'default'           => $this->default_value,
			)
		);
	}

	/**
	 * Sanitize the input
	 *
	 * @param mixed $input  User input.
	 *
	 * @return  mixed          Sanitised user input
	 */
	public function sanitize( $input ) {
		return $input;
	}

	/**
	 * Render this field
	 *
	 * @param mixed $value  field value.
	 *
	 * @return  void
	 */
	public function render_field( $value = null ) {
		$this->render_top_label();

		$this->render_input( $value );

		$this->render_description();
	}

	/**
	 * Render the field's input
	 *
	 * @param   mixed $value  The field's value.
	 *
	 * @return  string The input HTML
	 */
	public function render_input( $value = null ) {
		return '';
	}

	/**
	 * Render a label above the input
	 *
	 * @return  void
	 */
	public function render_top_label() {
		if ( $this->top_label ) {
			?>
			<div>
				<strong><label for="<?php echo $this->id; ?>"><?php echo $this->top_label; ?></label></strong>
			</div>
			<?php
		}
	}

	/**
	 * Render the field's description
	 *
	 * @return  void
	 */
	public function render_description() {
		if ( $this->description ) {
			?>
			<p class='description'><?php echo $this->description; ?></p>
			<?php
		}
	}
}
