<?php
/**
 * Show a posts grid
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



// WP_Query arguments
$args = [
            'post_type'       => 'post',    
        	'posts_per_page'  => '-1',
        	'orderby'         => 'date',
            'order'           => 'DESC'
        ];
        
        

$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ):
	while ( $query->have_posts() ):  $query->the_post();
	   include( locate_template( 'views/posts/grid-item.php' ) );
	endwhile;
else: 
	// no posts found
endif;

// Restore original Post Data
wp_reset_postdata();        