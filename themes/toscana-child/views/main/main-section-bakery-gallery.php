<?php
/**
 * Main template section - Bakery Gallery
 *
 * @author		Nir Goldberg
 * @package		views/main
 * @version		1.2.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
$title		= get_field( 'acf-main__section_bakery_gallery_title' );
$gallery	= get_field( 'acf-main__section_lost_pastries_gallery' );

?>

<section id="section-bakery-gallery" class="elementor-menu-anchor">

	<div class="section-bakery-gallery__text-container">

		<?php if ( $title ) : ?>
			<h2 class="section-bakery-gallery__title"><?php echo $title; ?></h2>
		<?php endif; ?>

	</div>

	<div class="section-bakery-gallery__gallery-container">
		<div class="section-bakery-gallery__gallery-container-wrap">

			<?php
				/**
				 * Display the gallery
				 */
				include( locate_template( 'views/gallery/grid.php' ) );
			?>

		</div>
	</div>

</section>