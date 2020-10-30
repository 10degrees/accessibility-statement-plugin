<?php

/**
 * Generates the Accessibility Statement HTML based upon user inputs
 */
class StatementGenerator {

	/**
	 * Get the default Accessibility Statement content
	 *
	 * @param   boolean  $use_blocks  Whether to format the content for the block editor. Default true.
	 *
	 * @return  string              Default Accessibility Statement content
	 */
	public static function get_default_content($use_blocks = true) {
		$strings = [];

		$strings[] = '<h1>' . sprintf( __('Accessibility Statement for %s'), get_bloginfo( 'name', 'display' )) . '</h1>';

		$strings[] .= '<p>' . __( 'We are committed to ensuring digital accessibility for people with disabilities. We are continually improving the user experience for everyone, and applying the relvent accessibility standards.' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Measures to support accessibility' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should list the measures you\'ve taken to support the accessibility of your site.' ) . '</p>';
		$strings[] .= '<p>' . sprintf( __( 'We take the following measures to ensure accessibility of %s:' ), get_bloginfo( 'name', 'display' ) ) . '</p>';

		$strings[] .= '<h2>' . __( 'Conformance status' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should explain what level (if any) of the WCAG this site conforms to. You should also explain whether the site is fully or partially conformant, and what this means.' ) . '</p>';

		$strings[] .= '<h3>' . __( 'Additional accessibility considerations' ) . '</h3>';
		$strings[] .= '<p>' . __( 'In this section you should explain any additional considerations, like areas where you have met the success criteria of higher WCAG levels.' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Feedback' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should provide the user with contact details should they find any accessibility barriers on the site. You should also provide a time window in which you aim to reply.' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Compatibility with browsers and assisstive technology' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should provide the user with a list of browsers, assistive technologies and operating systems the site is compatible with e.g. browser X with assistive technology Y on operating system Z.' ) . '</p>';
		$strings[] .= '<p>' . __( 'You should also provide a list of browsers, assistive technologies and operating systems the site isn\'t compatible with, e.g. browsers older than 3 major versions.' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Technical specifications' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should list the technologies that the site relies on to work, e.g. HTML, JavaScript and CSS.' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Limitations and alternatives' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should list the known limitations the site has, why they occur, any potential solutions and a method of contact should the user require support.' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Assessment approach' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should list the ways the accessibility of the site has been assessed, e.g. External evaluation.' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Evaluation report' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should provide the user with a link to your evaluation report (if you have one).' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Evaluation statement' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should provide the user with a link to your evaluation statement (if you have one).' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Other evidence' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should provide any additional evidence.' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Formal approval of this accessibility statement' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should provide the details of who approved the accessibility statement, e.g. the Communication Department of your company.' ) . '</p>';

		$strings[] .= '<h2>' . __( 'Formal complaints' ) . '</h2>';
		$strings[] .= '<p>' . __( 'In this section you should provide a description of your complaints procedure, including a time frame for a response and a time frame for a proposed solution.' ) . '</p>';

		$strings[] .= '<p>' . sprintf( __( 'This statement was created on the %s.' ), date( 'dS F Y' ) ) . '</p>';

		if ( $use_blocks ) {
			foreach ( $strings as $key => $string ) {
				if ( 0 === strpos( $string, '<p>' ) ) {
					$strings[ $key ] = '<!-- wp:paragraph -->' . $string . '<!-- /wp:paragraph -->';
				}

				if ( 0 === strpos( $string, '<h1>' ) ) {
					$strings[ $key ] = '<!-- wp:heading {"level":1} -->' . $string . '<!-- /wp:heading -->';
				}

				if ( 0 === strpos( $string, '<h2>' ) ) {
					$strings[ $key ] = '<!-- wp:heading -->' . $string . '<!-- /wp:heading -->';
				}

				if ( 0 === strpos( $string, '<h3>' ) ) {
					$strings[ $key ] = '<!-- wp:heading {"level":3} -->' . $string . '<!-- /wp:heading -->';
				}
			}
		}

		$content = implode( '', $strings );

		/**
		 * Filters the default content for the Accessibility Statement
		 *
		 * @param string $content The default Accessibility Statement content
		 * @param bool $use_blocks Whether the content should be formatted for the block editor
		 */
		return apply_filters( 'wp_get_default_accessibility_statement_content', $content, $use_blocks );
	}

}
