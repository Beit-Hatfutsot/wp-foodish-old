<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



function register_scripts() {

   wp_register_script ( 'Global', get_bloginfo('stylesheet_directory') . '/assets/js/global.js', array('jquery'), true );
   wp_enqueue_script  ( 'Global' );
 
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );



