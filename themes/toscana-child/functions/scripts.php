<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define ('HTMLINE_VERSION', '1.1.1');


function register_scripts() {

   if ( is_front_page() ):
        wp_register_script ( 'Slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), true );
        wp_enqueue_script  ( 'Slick' ); 
   endif;
    
   wp_register_script ( 'Global', get_bloginfo('stylesheet_directory') . '/assets/js/global.js', array('jquery'), true );
   wp_enqueue_script  ( 'Global' );
 
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );




function htmline_requeue_pojo_styles_woth_custom_ver() {
        
        $suffix_css = ! is_child_theme() ? '.min' : '';
        
        wp_dequeue_style    ( 'pojo-style' );     
        wp_deregister_style ( 'pojo-style' );   
        wp_enqueue_style    ( 'pojo-style', get_stylesheet_directory_uri() . '/assets/css/style' . $suffix_css . '.css', array( 'pojo-css-framework' ), HTMLINE_VERSION );
        
      	if ( is_rtl() ) {
            wp_dequeue_style   ( 'pojo-style-rtl' );
            wp_deregister_style( 'pojo-style-rtl' ); 
		    wp_enqueue_style   ( 'pojo-style-rtl', get_stylesheet_directory_uri() . '/assets/css/rtl' . $suffix_css . '.css', array( 'pojo-css-framework', 'pojo-style' ), HTMLINE_VERSION );
	    }
        
        if ( is_front_page() ):
            wp_enqueue_style ( 'Slick-default-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',       null , HTMLINE_VERSION );
            wp_enqueue_style ( 'Slick-theme-css',   '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', null , HTMLINE_VERSION );
        endif;

}
add_action( 'wp_enqueue_scripts', 'htmline_requeue_pojo_styles_woth_custom_ver', 601 );


