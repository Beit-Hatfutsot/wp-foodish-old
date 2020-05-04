<?php
/**
 * Default Single
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( have_posts() ) :

	while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-post">
				<header class="entry-header">

					<?php if ( pojo_is_show_page_title() ) : ?>
						<div class="page-title">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</div>
					<?php endif; ?>
                    
                    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<div id="breadcrumbs">','</div>' ); } ?>
                                    
					<div class="entry-meta">
						<?php if ( po_single_metadata_show( 'date' ) ) : ?>
							<span><time datetime="<?php the_time('o-m-d'); ?>" class="entry-date date published updated"><?php echo get_the_date(); ?></time></span>
						<?php endif; ?>
						<?php if ( po_single_metadata_show( 'time' ) ) : ?>
							<span class="entry-time"><?php echo get_the_time(); ?></span>
						<?php endif; ?>
						<?php if ( po_single_metadata_show( 'author' ) ) : ?>
							<span class="entry-user vcard author"><a class="fn" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></span>
						<?php endif; ?>
					</div>
				</header>
				<div class="entry-content">
					<?php if ( ! Pojo_Core::instance()->builder->display_builder() ) : ?>
						<?php the_content(); ?>
						<?php pojo_link_pages(); ?>
					<?php endif; ?>
                    
                	<div class="entry-format">
    					<?php if ( has_post_thumbnail() ) :
    						$image_args = array( 'width' => '1170', 'height' => '660' );
    						$image_url = Pojo_Thumbnails::get_post_thumbnail_url( $image_args );
    						if ( $image_url ) : ?>
    							<img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="media-object" />
    						<?php endif; ?>
    					<?php endif; ?>
                    </div>
                    
					<?php $tags = get_the_tags(); if ( $tags ) : ?><div class="entry-tags"><?php the_tags( '', ' ' ); ?></div><?php endif; ?>

					<?php
					// Previous/next post navigation.
					echo pojo_get_post_navigation(
						array(
							'prev_text' => __( '&laquo; Previous', 'pojo' ),
							'next_text' => __( 'Next &raquo;', 'pojo' ),
						)
					);
					?>

				</div>
			</div>
		</article>
	<?php endwhile;
else :
	pojo_get_content_template_part( 'content', 'none' );
endif;