<?php
/**
 * Show a gallery grid
 *
 * @author		Nir Goldberg
 * @package		views/gallery
 * @version		1.2.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// The Loop
if ( $gallery ) :

	// vars
	$total = count( $gallery );
	$index = 0;

	foreach ( $gallery as $image ) :

		// vars
		$image_url			= $image['url'];
		$image_width		= $image['width'];
		$image_height		= $image['height'];
		$image_alt			= $image['alt'];
		$image_title		= $image['title'];
		$image_caption		= $image['caption'];
		$image_description	= $image['description'];

		?>

		<div class="image-container">
			<div class="image-container-wrap">
				<img src="<?php echo $image_url; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" alt="<?php echo $image_alt; ?>" />
			</div>

			<div class="image-caption-wrap">
				<div class="image-title"><?php echo $image_title; ?></div>
				<div class="image-caption"><?php echo $image_description ? '<a href="' . $image_description . '" target="_blank">' : ''; ?><?php echo $image_caption; ?><?php echo $image_description ? '</a>' : ''; ?></div>
			</div>

			<div class="image-counter-wrap">
				<div class="image-counter"><?php echo ++$index . '/' . $total; ?></div>
			</div>
		</div>

	<?php endforeach;

else: 
	// no posts found
endif;