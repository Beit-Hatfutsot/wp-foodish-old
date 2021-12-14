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

	foreach ( $gallery as $image ) : ?>

		<div class="image-container">
			<div class="image-container-wrap">
				<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php echo $image['alt']; ?>" />
			</div>

			<div class="image-caption-wrap">
				<div class="image-title"><?php echo $image['title']; ?></div>
				<div class="image-caption"><?php echo $image['caption']; ?></div>
			</div>

			<div class="image-counter-wrap">
				<div class="image-counter"><?php echo ++$index . '/' . $total; ?></div>
			</div>
		</div>

	<?php endforeach;

else: 
	// no posts found
endif;