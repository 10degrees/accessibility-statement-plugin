<?php

/**
 * Load a view and pass variables into it
 *
 * To ouput a view you would want to echo it
 *
 * @param  string $file_name excluding file extension.
 * @param  array  $vars Variables to make available in the file.
 *
 * @return string The view HTML.
 */
function psg_view( $file_name, $vars = array() ) {
	foreach ( $vars as $key => $value ) {
		${$key} = $value;
	}

	ob_start();

	include plugin_dir_path( __FILE__ ) . '/' . $file_name . '.php';

	return ob_get_clean();
}
