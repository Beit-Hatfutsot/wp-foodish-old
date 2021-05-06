<?php
/**
 * Function for Pojo Theme
 *
 * @author		HTMLine
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Remove WordPress defaults
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );


 
 /**
 * Improve Admin footer update notice
 */
if (!function_exists('smarter_update_footer')){
    function smarter_update_footer( $msg = '' ) {
        if ( !current_user_can('update_core') )
            return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );
 
        $cur = get_preferred_from_update_core();
        if ( ! is_object( $cur ) )
            $cur = new stdClass;
 
        if ( ! isset( $cur->current ) )
            $cur->current = '';
 
        if ( ! isset( $cur->url ) )
            $cur->url = '';
 
        if ( ! isset( $cur->response ) )
            $cur->response = '';
 
        switch ( $cur->response ) {
        case 'development' :
            return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) );
 
        case 'upgrade' :
            return '<strong>'.sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) ).' - <a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>';
 
        case 'latest' :
        default :
            return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );
        }
    }
    add_filter( 'update_footer', 'smarter_update_footer', 9999);
}



/**
 * Disable the emoji's
 */
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}