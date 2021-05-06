<?php
/**
 * Custom Post Types
 *
 * @author 		HTMLine
 * @package 	/functions
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


define( "EVENT__POST_TYPE" , "event" );



/**
 * Register all the post types in the system.
 */
function HTMLine_register_posttypes() { 
   
    /* Post types */
    HTMLine_register_post_type__event();
}
add_action( 'init', 'HTMLine_register_posttypes' );



/* Post Types */



/**
 * Register the event post type
 */
function HTMLine_register_post_type__event() {


    $labels = array(
        "name"                => __( "אירועים", 'pojochild' ) ,
        "singular_name"       => __( "אירוע", 'pojochild' )  ,
        "menu_name"           => __( "אירועים", 'pojochild' )  ,
        "add_new"             => __( "הוסף אירוע", 'pojochild' ) ,
        "add_new_item"        => __( "הוסף אירוע חדש", 'pojochild' ) ,
        "edit"                => __( "ערוך", 'pojochild' ) ,
        "edit_item"           => __( "ערוך אירוע", 'BH ') ,
        "new_item"            => __( "אירוע חדש", 'pojochild' )  ,
        "view"                => __( "הצג אירוע", 'pojochild' )  ,
        "view_item"           => __( "הצג אירוע", 'pojochild' )  ,
        "search_items"        => __( "חיפוש אירועים", 'pojochild' ) ,
        "not_found"           => __( "לא נמצתאו אירועים", 'pojochild' ) ,
        "not_found_in_trash"  => __( "לא נמצאו אירועים בסל המיחזור", 'pojochild' ) ,
        "parent"              => __( "אירוע אב", 'pojochild' ),
    );


    $args = array (
                    "labels"       => $labels,
                    "description"  => "",
                    "public"       => true,
                    'publicly_queryable'  => true,
                    "show_ui"      => true,
                    "has_archive"  => true,
                    "show_in_menu" => true,
                    "menu_icon"    => "dashicons-calendar-alt",
                    'taxonomies'   => array(),
                    "exclude_from_search" => false,
                    "capability_type"     => "post",
                    "map_meta_cap"        => true,
                    "hierarchical"        => false,
                    "rewrite"             => array(
                                                    "slug"       => "event" ,
                                                    "with_front" => false
                                                  ),
                    "query_var" => true ,
                    "supports"  => array(
                                        'title' , 
                                        'editor', 
                                        'revisions' , 
                                        'pojo-page-format' ,
                                        'thumbnail',
                                        'excerpt',
                                       ),
    );

    register_post_type( EVENT__POST_TYPE , $args );

} // HTMLine_register_post_type__event
