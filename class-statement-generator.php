<?php

/**
 * Generates the Accessibility Statement HTML based upon user inputs
 */
class StatementGenerator {

	public static function get_default_content() {
		$page_content = '<h1>' . sprintf( __('Accessibility Statement for %s'), get_bloginfo( 'name', 'display' )) . '</h1>';

		$page_content .= '<p>' . __( 'We are committed to ensuring digital accessibility for people with disabilities. We are continually improving the user experience for everyone, and applying the relvent accessibility standards.' ) . '</p>';

		$page_content .= '<h2>' . __( 'Measures to support accessibility' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should list the measures you\'ve taken to support the accessibility of your site.' ) . '</p>';
		$page_content .= '<p>' . sprintf( __( 'We take the following measures to ensure accessibility of %s:' ), get_bloginfo( 'name', 'display' ) ) . '</p>';

		$page_content .= '<h2>' . __( 'Conformance status' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should explain what level (if any) of the WCAG this site conforms to. You should also explain whether the site is fully or partially conformant, and what this means.' ) . '</p>';

		$page_content .= '<h3>' . __( 'Additional accessibility considerations' ) . '</h3>';
		$page_content .= '<p>' . __( 'In this section you should explain any additional considerations, like areas where you have met the success criteria of higher WCAG levels.' ) . '</p>';

		$page_content .= '<h2>' . __( 'Feedback' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should provide the user with contact details should they find any accessibility barriers on the site. You should also provide a time window in which you aim to reply.' ) . '</p>';

		$page_content .= '<h2>' . __( 'Compatibility with browsers and assisstive technology' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should provide the user with a list of browsers, assistive technologies and operating systems the site is compatible with e.g. browser X with assistive technology Y on operating system Z.' ) . '</p>';
		$page_content .= '<p>' . __( 'You should also provide a list of browsers, assistive technologies and operating systems the site isn\'t compatible with, e.g. browsers older than 3 major versions.' ) . '</p>';

		$page_content .= '<h2>' . __( 'Technical specifications' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should list the technologies that the site relies on to work, e.g. HTML, JavaScript and CSS.' ) . '</p>';

		$page_content .= '<h2>' . __( 'Limitations and alternatives' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should list the known limitations the site has, why they occur, any potential solutions and a method of contact should the user require support.' ) . '</p>';

		$page_content .= '<h2>' . __( 'Assessment approach' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should list the ways the accessibility of the site has been assessed, e.g. External evaluation.' ) . '</p>';

		$page_content .= '<h2>' . __( 'Evaluation report' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should provide the user with a link to your evaluation report (if you have one).' ) . '</p>';

		$page_content .= '<h2>' . __( 'Evaluation statement' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should provide the user with a link to your evaluation statement (if you have one).' ) . '</p>';

		$page_content .= '<h2>' . __( 'Formal approval of this accessibility statement' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should provide the details of who approved the accessibility statement, e.g. the Communication Department of your company.' ) . '</p>';

		$page_content .= '<h2>' . __( 'Formal complaints' ) . '</h2>';
		$page_content .= '<p>' . __( 'In this section you should provide a description of your complaints procedure, including a time frame for a response and a time frame for a proposed solution.' ) . '</p>';

		$page_content .= '<hr>';
		$page_content .= '<p>' . sprintf( __( 'This statement was created on the %s.' ), date( 'dS F Y' ) ) . '</p>';

		return $page_content;
	} 

}
