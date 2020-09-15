<?php

/**
 * Generates the Accessibility Statement HTML based upon user inputs
 */
class StatementGenerator {
	
	/**
	 * Create statement page
	 *
	 * @return  void
	 */
	public static function create_page() {
		$page_id = get_option( 'accessibility_statement_page' );
		$page_exists = is_string( get_post_status( $page_id ) );
		
		$statement_page = array(
			'post_content' => self::generate_html(),
		);

		if ( $page_id && $page_exists ) {
			$statement_page['ID'] = $page_id;
		} else {
			return false;
		}

		$inserted_post = wp_update_post( $statement_page );

		if ( ! $inserted_post ) {
			return false;
		}

		return true;
	}

	/**
	 * Generate the statement
	 *
	 * @return  string  Statement HTML
	 */
	public static function generate_html() {
		ob_start();

		self::get_introduction();

		self::get_status_description();

		self::get_feedback_section();

		self::get_measures();

		self::get_compatibility_information();

		self::get_technologies();

		self::get_limitations();

		self::get_assessment_approaches();

		self::get_evidence();

		self::get_additional_considerations();

		self::get_approval_statement();

		self::get_complaints_procedure();

		self::get_footer();

		return ob_get_clean();
	}

	/**
	 * Output the complaints procedure
	 */
	private static function get_complaints_procedure() {
		echo psg_view(
			'partials/complaints-procedure',
			array(
				'complaints_procedure' => get_option( 'formal_complaints_procedure' ),
			)
		);
	}

	/**
	 * Output the approval statement
	 */
	private static function get_approval_statement() {
		echo psg_view(
			'partials/approval-statement',
			array(
				'approval_function' => get_option( 'approval_function' ),
				'approved_by'       => get_option( 'approval_person_or_department' ),
			)
		);
	}

	/**
	 * Output any additional considerations
	 */
	private static function get_additional_considerations() {
		echo psg_view(
			'partials/additional-considerations',
			array(
				'additional_considerations' => get_option( 'additional_considerations' ),
			)
		);
	}

	/**
	 * Output measures
	 */
	private static function get_measures() {
		echo psg_view(
			'partials/measures',
			array(
				'website_name'        => get_option( 'website_name' ),
				'organisation'        => get_option( 'organisation_name' ),
				'measures'            => get_option( 'measures' ),
				'additional_measures' => get_option( 'additional_measures' ),
			)
		);
	}

	/**
	 * Output limitations
	 */
	private static function get_limitations() {
		echo psg_view(
			'partials/limitations',
			array(
				'website_name' => get_option( 'website_name' ),
				'limitations'  => get_option( 'accessibility_limitation' ),
			)
		);
	}

	/**
	 * Output compatible and incompatible environments
	 */
	private static function get_compatibility_information() {   
		echo psg_view(
			'partials/compatibilities',
			array(
				'website_name'            => get_option( 'website_name' ),
				'compatible_environments' => get_option( 'compatible_environments' ),
				'known_incompatibilities' => get_option( 'incompatible_environments' ),
			)
		);
	}

	/**
	 * Output used technologies
	 */
	private static function get_technologies() {
		echo psg_view(
			'partials/technologies',
			array(
				'website_name'            => get_option( 'website_name' ),
				'technologies'            => get_option( 'technologies' ),
				'additional_technologies' => get_option( 'additional_technologies' ),
			)
		);
	}

	/**
	 * Output accessibility evidence
	 */
	private static function get_evidence() {
		echo psg_view(
			'partials/evidence',
			array(
				'website_name'   => get_option( 'website_name' ),
				'statement'      => get_option( 'evaluation_statement_link' ),
				'report'         => get_option( 'recent_evaluation_report_link' ),
				'other_evidence' => get_option( 'other_evidence' ),
			)
		);
	}

	/**
	 * Output approaches to assessment
	 */
	private static function get_assessment_approaches() {
		echo psg_view(
			'partials/approaches',
			array(
				'website_name'          => get_option( 'website_name' ),
				'organisation'          => get_option( 'organisation_name' ),
				'approaches'            => get_option( 'assessment_approach' ),
				'additional_approaches' => get_option( 'additional_approaches' ),
			),
		);
	}

	/**
	 * Output feedback and contact information
	 */
	private static function get_feedback_section() {
		echo psg_view(
			'partials/feedback',
			array(
				'website_name' => get_option( 'website_name' ),
				'contact_details' => array(
					'phone' => get_option( 'contact_phone' ),
					'email' => get_option( 'contact_email' ),
					'visitor_address' => get_option( 'contact_visitor_address' ),
					'postal_address' => get_option( 'contact_postal_address' ),
					'other' => get_option( 'other_contact_options' )
				),
				'feedback_time' => get_option( 'duration_for_response' ),
			)
		);
	}

	/**
	 * Output the accessibility status description
	 */
	private static function get_status_description() {
		$conformance_status = get_option( 'conformance_status' );

		$conformance_details = [];
		if ( 'none' != $conformance_status ) {
			$conformance_details = self::get_conformance_details( get_option( 'conformance_status' ) );
		}
	
		$standard = get_option( 'standard_followed' );

		if ( 'other' == $standard ) {
			$standard = get_option( 'other_standard' );
		}

		echo psg_view(
			'partials/status',
			array(
				'status'       => $conformance_status,
				'details'      => $conformance_details,
				'standard'     => $standard,
				'website_name' => get_option( 'website_name' ),
			),
		);
	}

	/**
	 * Output the footer
	 */
	private static function get_footer() {
		echo psg_view(
			'partials/footer',
			array(
				'date_of_publication' => get_option( 'date_of_publication' ),
			)
		);
	}

	/**
	 * Output the statement introduction
	 */
	private static function get_introduction() {
		$website_name = get_option( 'website_name' );
		$organisation = get_option( 'organisation_name' );

		echo psg_view(
			'partials/introduction',
			array(
				'website_name' => $website_name,
				'organisation' => $organisation,
			)
		);
	}

	/**
	 * Get the details of conformance from a given status
	 *
	 * @param   string  $status  Status
	 *
	 * @return  array           The name of the conformance type and its description.
	 */
	public static function get_conformance_details( $status ) {
		$conformance_details = array(
			'fully' => array(
				'name'        => 'fully conformant',
				'description' => __( 'Fully conformant means that the content fully conforms to the accessibility standard without any exceptions.', 'a11y-statement' ),
			),
			'partially' => array(
				'name'        => 'partially conformant',
				'description' => __( 'Partially conformant means that some parts of the content do not fully conform to the accessibility standard.', 'a11y-statement' ),
			),
			'non_conformant' => array(
				'name'        => 'non conformant',
				'description' => __( 'Non conformant means that the content does not conform the accessibility standard.', 'a11y-statement' ),
			),
			'not_assessed' => array(
				'name'        => 'not assessed',
				'description' => __( 'Not assessed means that the content has not been evaluated or the evaluation results are not available.', 'a11y-statement' ),
			),
		);

		$default = array(
			'name'        => '',
			'description' => '',
		);

		if ( !$status || ( !array_key_exists( $status, $conformance_details ) ) ) {
			return $default;
		}

		return $conformance_details[ $status ];
	}
}
