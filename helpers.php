<?php

/**
 * Load a view and pass variables into it
 *
 * To ouput a view you would want to echo it
 *
 * @param  string $fileName excluding file extension
 * @param  array  $vars
 * @return string
 */
function td_view($fileName, $vars = [])
{
    foreach ($vars as $key => $value) {
        ${$key} = $value;
    }

    ob_start();

    include plugin_dir_path(__FILE__) . '/' . $fileName . '.php';

    return ob_get_clean();
}
