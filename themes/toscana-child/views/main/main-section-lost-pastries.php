<?php
/**
 * Main template section - Lost Pastries
 *
 * @author		Nir Goldberg
 * @package		views/main
 * @version		1.2.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
$grid			= 'lost-pastries';
$categories		= get_field( 'acf-main__section_lost_pastries_categories' );
$logo			= get_field( 'acf-main__section_lost_pastries_logo' );
$title			= get_field( 'acf-main__section_lost_pastries_title' );
$description	= get_field( 'acf-main__section_lost_pastries_description' );

?>

<section id="section-lost-pastries" class="elementor-menu-anchor">

	<div class="section-lost-pastries__text-container">

		<?php if ( $logo ) : ?>
			<div class="section-lost-pastries__logo">
				<img src="<?php echo $logo['url']; ?>" width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" alt="<?php echo $logo['alt']; ?>" />
			</div>
		<?php endif; ?>

		<?php if ( $description ) : ?>
			<div class="section-lost-pastries__description"><?php echo $description; ?></div>
		<?php endif; ?>

		<?php if ( $title ) : ?>
			<h2 class="section-lost-pastries__title"><?php echo $title; ?></h2>
		<?php endif; ?>

	</div>

	<div class="section-lost-pastries__posts-container">
		<div class="section-lost-pastries__posts-container-wrap">

			<?php
				/**
				 * Display the posts grid
				 */
				include( locate_template( 'views/posts/grid.php' ) );
			?>

		</div>
	</div>

</section>