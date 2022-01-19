<?php
/**
 * Main template section - Podcast
 *
 * @author		Nir Goldberg
 * @package		views/main
 * @version		1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
$grid			= 'podcast';
$categories		= get_field( 'acf-main__section_podcast_categories' );
$title			= get_field( 'acf-main__section_podcast_title' );
$subtitle		= get_field( 'acf-main__section_podcast_subtitle' );
$description	= get_field( 'acf-main__section_podcast_description' );

if ( ! $categories )
	return;

?>

<section id="section-podcast" class="elementor-menu-anchor">

	<div class="section-podcast__text-container">

		<div class="section-podcast__header">

			<?php if ( $title ) : ?>
				<h2 class="section-podcast__title"><?php echo $title; ?></h2>
			<?php endif; ?>

			<?php if ( $subtitle ) : ?>
				<h2 class="section-podcast__subtitle"><?php echo $subtitle; ?></h2>
			<?php endif; ?>

		</div>

		<?php if ( $description ) : ?>
			<div class="section-podcast__description"><?php echo $description; ?></div>
		<?php endif; ?>

	</div>

	<div class="section-podcast__posts-container">
		<div class="section-podcast__posts-container-wrap">

			<?php
				/**
				 * Display the posts grid
				 */
				include( locate_template( 'views/posts/grid.php' ) );
			?>

		</div>
	</div>

</section>