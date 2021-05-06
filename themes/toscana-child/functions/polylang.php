<?php
/**
 * Polylang
 *
 * @author		HTMLine
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function your_prefix_after_setup_theme() {

   // register our translatable strings - again first check if function exists.

    if ( function_exists( 'pll_register_string' ) ) {

        pll_register_string( 'htmline-custom-strings', 'at'     , 'pojo' );
        pll_register_string( 'htmline-custom-strings', 'When'   , 'pojo' );
        pll_register_string( 'htmline-custom-strings', 'Where'  , 'pojo' );

    }
}
 add_action( 'after_setup_theme', 'your_prefix_after_setup_theme' );
 
 


/**
 * Polylang Shortcode - https://wordpress.org/plugins/polylang/
 * Add this code in your functions.php
 * Put shortcode [polylang_langswitcher] to post/page for display flags
 *
 * @return string
 */
function custom_polylang_langswitcher() {
	$output = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$args   = [
			'show_flags' => 0,
			'show_names' => 1,
			'echo'       => 0,
            'hide_current' => 1,
		];
		$output = '<ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul>';
	}

	return $output;
}

add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );



/*
Plugin Name: Polylang Body Class
Plugin URI: https://github.com/diggy/polylang-body-class
Version: 1.0.0
Author: Peter J. Herrel
Author uri: https://github.com/diggy
Description: Adds prefixed and sanitized locale to body classes. Background: https://git.io/vyIh7
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.txt
*/



/**
 * Adds prefixed and sanitized locale to body classes
 *
 * @param  array $classes An array of body classes.
 * @return array
 */
function pll_plugin_body_class( $classes )
{
    if ( function_exists( 'PLL' ) && $language = PLL()->model->get_language( get_locale() ) )
    {
        $classes[] = 'pll-' . str_replace( '_', '-', sanitize_title_with_dashes( $language->get_locale( 'raw' ) ) );
    }

    return $classes;
}
add_filter( 'body_class', 'pll_plugin_body_class' );