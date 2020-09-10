<?php
/**
 * Displays a dropdown of all pages on the site.
 */
class PageDropdown extends AbstractField {
	/**
	 * Render a list of pages
	 *
	 * @param   int $value  Selected Page Id
	 */
	public function render_input( $value = null ) {
		$has_pages = (bool) get_posts(
			array(
				'post_type'      => 'page',
				'posts_per_page' => 1,
				'post_status'    => array(
					'publish',
					'draft',
				),
			)
		);

		if( $has_pages ) {
			$selected_value = 0;
			if ( get_option( $this->id ) ) {
				$selected_value = get_option($this->id);
			}

			wp_dropdown_pages(
				array(
					'name'              => $this->id,
					'show_option_none'  => __( '&mdash; Select &mdash;' ),
					'option_none_value' => '0',
					'selected' => $selected_value,
					'post_status'       => array( 'draft', 'publish' ),
				)
			);
		} else {
			?>
			<p><?php esc_html_e( 'There are no pages.', 'a11y-statement'); ?></p>
			<?php
		}
	}
}