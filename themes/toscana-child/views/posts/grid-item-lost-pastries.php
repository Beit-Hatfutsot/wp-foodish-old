<?php
/**
 * Content: Lost Pastries Grid Item
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $_pojo_parent_id;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'pojo_post_classes', array( 'grid-item grid-two col-md-4 col-sm-6' ), get_post_type() ) ); ?>>
	<div class="inbox">
		<?php if ( $image_url = Pojo_Thumbnails::get_post_thumbnail_url( array( 'width' => '250', 'height' => '170', 'crop' => true, 'placeholder' => true ) ) ) : ?>
			<a class="image-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
				<img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="media-object" />
				<div class="overlay-image"></div>
				<div class="overlay-title">
					<i class="fa fa-plus-square-o"></i>
				</div>
			</a>
		<?php endif; ?>
		<div class="caption">
			<h4 class="grid-heading entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

			<?php echo $subtitle ? '<h3 class="grid-subtitle">' . $subtitle . '</h3>' : ''; ?>

			<?php po_print_archive_excerpt( $_pojo_parent_id ); ?>
		</div>
	</div>
</article>