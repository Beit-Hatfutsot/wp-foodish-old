<?php
/**
 * Newsletter page content
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists( 'get_field' ) )
	return;

/**
 * Variables
 */
$frontpage_id	= get_option( 'page_on_front' );
$text			= get_field( 'acf-main__section8_text', $frontpage_id );
$cf_shortcode	= get_field( 'acf-main__section8_form-code', $frontpage_id );
$email			= get_field( 'acf-main__section8_email', $frontpage_id );
$fb_image		= get_field( 'acf-main__section8_facebook_image', $frontpage_id );
$fb_link		= get_field( 'acf-main__section8_facebook_link', $frontpage_id );
$inst_image		= get_field( 'acf-main__section8_instegram_image', $frontpage_id );
$inst_link		= get_field( 'acf-main__section8_instegram_link', $frontpage_id );

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'pojo_post_classes', array( 'col-sm-12' ), get_post_type() ) ); ?>>
			<header class="entry-header">
				<div class="page-title">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</div>

				<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<div id="breadcrumbs">','</div>' ); } ?>
			</header>
			<div class="entry-content">
				<?php if ( ! Pojo_Core::instance()->builder->display_builder() ) : ?>

					<section id="section8" class="elementor-menu-anchor">
						<div class="section8__text-container">

							<?php if ( $text ): ?>
								<div class="section8__text"><?php echo $text; ?></div> 
							<?php endif; ?>

						</div>

						<?php if ( $cf_shortcode ): ?>
							<div class="contact-form-newsletter-section">
								<?php echo do_shortcode( $cf_shortcode );?>
							</div>
						<?php endif; ?>

						<?php if ( $email ): ?>
							<div class="section8__email"> 
								<a href="mailto:<?php echo sanitize_email( $email ); ?>"><?php echo $email;?></a>
							</div> 
						<?php endif; ?>

						<div class="section8__social_container">

							<?php if ( $fb_image ): ?>
								<div class="section8__facebook"> 
									<a href="<?php echo $fb_link;?>" target="_blank"><img src="<?php echo $fb_image ?>" /></a>    
								</div> 
							<?php endif; ?>

							<?php if ( $inst_image ): ?>
								<div class="section8__instegram"> 
									<a href="<?php echo $inst_link;?>" target="_blank"><img src="<?php echo $inst_image ?>" /></a>    
								</div> 
							<?php endif; ?>

						</div>
					</section>

				<?php endif; ?>
			</div>

		</article>
	<?php endwhile;
else :
	pojo_get_content_template_part( 'content', 'none' );
endif;