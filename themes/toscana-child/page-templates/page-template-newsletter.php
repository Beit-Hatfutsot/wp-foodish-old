<?php
/**
 * Template Name: Newsletter
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<div class="language-switcher"><?php echo do_shortcode('[polylang_langswitcher]'); ?></div>

<?php
	/**
	 * main content
	 */
	get_template_part( 'views/newsletter' );
?>
<?php get_footer();