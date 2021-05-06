<?php
/**
 * Template Name: Main
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>
<?php
	/**
	 * main content
	 */
	get_template_part( 'views/main/main' );
?>
<?php get_footer();