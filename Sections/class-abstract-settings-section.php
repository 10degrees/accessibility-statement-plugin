<?php

/**
 * Setting Section
 */
abstract class AbstractSettingsSection {
	/**
	 * ID of the section
	 *
	 * @var string
	 */
	protected $id = '';

	/**
	 * Section title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * Fields in the section
	 *
	 * @var array
	 */
	protected $fields = array();

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'add_section' ) );
		add_action( 'admin_init', array( $this, 'register_fields' ) );
	}

	/**
	 * Register the fields for the section
	 *
	 * @return  void
	 */
	public function register_fields() {
		foreach ( $this->fields as $field ) {
			$field->set_page( $this->id );
			$field->register();
		}
	}

	/**
	 * Register the section
	 *
	 * @return  void
	 */
	public function add_section() {
		add_settings_section(
			$this->id,
			$this->title,
			array( $this, 'render' ),
			$this->id,
		);
	}

	/**
	 * Render the section
	 *
	 * @return  string The section's HTML
	 */
	public function render() {
		return '';
	}

	/**
	 * Get the section's id
	 *
	 * @return  string  ID
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Get the section's title
	 *
	 * @return  string  Title
	 */
	public function getTitle()
	{
		return $this->title;
	}
}
