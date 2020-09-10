<?php

/**
 * Basic Information Tab
 */
class BasicInformation extends AbstractSettingsSection {

	/**
	 * Section ID
	 *
	 * @var string
	 */
	protected $id = 'basic_information';

	/**
	 * Section fields
	 *
	 * @var array
	 */
	protected $fields = array();

	/**
	 * Constuctor
	 */
	public function __construct()
	{
		$this->title = __( 'Basic Information', 'a11y-statement' );
		
		$this->fields = array(
			new PageDropdown(array(
				'id' => 'accessibility_statement_page',
				'label' => __('Page', 'a11y-statement'),
			)),
			new TextField(array(
				'id' => 'organisation_name',
				'label' => __('Organisation Name', 'a11y-statement'),
				'description' => __('(Example: “Example Inc.”)', 'a11y-statement'),
			)),
			new TextField(array(
				'id' => 'website_name',
				'label' => __('Website Name', 'a11y-statement'),
				'description' => __('(Example: “https://example.org”)', 'a11y-statement')
			)),
			new TextField(array(
				'id' => 'website_address',
				'label' => __('Website Address', 'a11y-statement'),
				'description' => __('(Example: “Example Store” or “Example App 1.2.3”)', 'a11y-statement')
			)),
			new RadioButtons(array(
				'id' => 'standard_followed',
				'label' => __('Standard Followed', 'a11y-statement'),
				'options' => [
					[
						'label' => __('WCAG 2.1 level AA', 'a11y-statement'),
						'value' => 'WCAG 2.1 level AA'
					],
					[
						'label' => __('WCAG 2.0 level AA', 'a11y-statement'),
						'value' => 'WCAG 2.0 level AA'
					],
					[
						'label' => __('Other', 'a11y-statement'),
						'value' => 'other'
					],
				],
			)),
			new TextField(array(
				'id' => 'other_standard',
				'label' => __('Enter Standard', 'a11y-statement'),
				'other' => [
					'class' => 'hidden',
				],
			)),
			new RadioButtons(array(
				'id' => 'conformance_status',
				'label' => __('Conformance Status', 'a11y-statement'),
				'options' => [
					[
						'label' => __('Fully conformant: the content fully conforms to the accessibility standard without any exceptions ', 'a11y-statement'),
						'value' => 'fully',
					],
					[
						'label' => __('Partially conformant: some parts of the content do not fully conform to the accessibility standard (you can indicate these parts in later sections of this form)', 'a11y-statement'),
						'value' => 'partially',
					],
					[
						'label' => __('Non conformant: the content does not conform the accessibility standard ', 'a11y-statement'),
						'value' => 'non_conformant',
					],
					[
						'label' => __('Not assessed: the content has not been evaluated or the evaluation results are not available', 'a11y-statement'),
						'value' => 'not_assessed',
					],
					[
						'label' => __('None', 'a11y-statement'),
						'value' => 'none',
					],
				],
			)),
			new TextArea(array(
				'id' => 'additional_considerations',
				'label' => __('Additional Accessibility Considerations', 'a11y-statement'),
				'description' => __('Additional accessibility requirements applied', 'a11y-statement')
			)),
			new TextField(array(
				'id' => 'contact_phone',
				'label' => __('Feedback Phone Number', 'a11y-statement'),
				'description' => __('(Example: “+12 34 567 89 00”)', 'a11y-statement')
			)),
			new TextField(array(
				'id' => 'contact_email',
				'label' => __('Feedback Email Address', 'a11y-statement'),
				'description' => __('(Example: “accessibility@example.org”)', 'a11y-statement')
			)),
			new TextField(array(
				'id' => 'contact_visitor_address',
				'label' => __('Feedback Visitor Address', 'a11y-statement'),
				'description' => __('(Example: “Main Street 1, 234 Example Ville”)', 'a11y-statement')
			)),
			new TextField(array(
				'id' => 'contact_postal_address',
				'label' => __('Feedback Postal Address', 'a11y-statement'),
				'description' => __('(Example: “PO Box 1, 234 Example Ville”)', 'a11y-statement')
			)),
			new TextArea(array(
				'id' => 'other_contact_options',
				'label' => __('Other contact options', 'a11y-statement'),
				'description' => __('(Example: on social media; Twitter: @ExampleUser)', 'a11y-statement')
			)),
			new TextField(array(
				'id' => 'duration_for_response',
				'label' => __('Typical duration for response', 'a11y-statement'),
				'description' => __('(Example: “2 business days”)', 'a11y-statement')
			)),
			new TextField(array(
				'id' => 'date_of_publication',
				'label' => __('Date of Publication', 'a11y-statement'),
				'default_value' => date('dS F Y'),
				'description' => __('Publication date of this accessibility statement', 'a11y-statement')
			)),
		);

		parent::__construct();
	}

	public function render() {
		echo '<p>';
		_e('In this section you can provide the minimal set of information recommended for your accessibility statement. This includes information about your organization, the accessibility standards you applied, and your contact information for feedback.', 'a11y-statement');
		echo '</p>';
	}
}
