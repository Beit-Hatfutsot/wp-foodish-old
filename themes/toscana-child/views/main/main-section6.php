<?php
/**
 * Section 3
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.1.4
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$main_background     = get_field('acf-main__section6_background');
$apron               = get_field('acf-main__section6_apron-image');
$title               = get_field('acf-main__section6_text_title');
$event_purchase_text = get_field('acf-main__section6_events_button_text');
$top_image_mobile    = get_field('acf-main__section6_mobile-top-image');
$image_link          = get_field('acf-main__section6_image_link');


?>
<?php if ( $main_background ): ?>
<style>
    #section6 {
        background-image: url(<?php echo $main_background;?>);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position: 0 0;
    }
</style>    
<?php endif;?>

<section id="section6" class="elementor-menu-anchor" <?php echo ( $image_link ) ? 'style="cursor: pointer;" onclick="window.open(\'' . $image_link . '\', \'_blank\');"' : ''; ?>>

    <?php if ( $apron ): ?>
       <figure class="section6__apron">
            <img src="<?php echo $apron?>" />
       </figure> 
    <?php endif ;?>

   <div class="section6__text-container">
   
     <?php if ( $title ): ?>
       <h2 class="section6__title"> 
           <?php echo $title; ?>
       </h2> 
    <?php endif ;?>  
        
   </div>
   
   
   <?php if ( $top_image_mobile ): ?>
        <figure class="section6__band visible-xs"> 
            <img src="<?php echo $top_image_mobile; ?>" />
        </figure> 
   <?php endif; ?>
   
   
   <?php 
   
   
    // Get current date and time as DateTime Object    
    $today_date     = new DateTime('now', new DateTimeZone('Asia/Jerusalem'));
    
    // Convert it to string (WP_QUERY requirment) 
    $today_date_str =  $today_date->format('Y-m-d');    
   
   
   // Get all the events from today and in the future
   $meta_query = [
                    	[
                    		'key'     => 'acf-event-date',
                    		'value'   => $today_date_str,
                    		'type'    => 'DATE',
                    		'compare' => '>='
                    	]
                  ];
   
   $args_events = [
    				'post_type' 	 => EVENT__POST_TYPE,
    				'posts_per_page' => 1,
                    'meta_key'       => 'acf-event-date',
                    'meta_query'     => $meta_query,
                    'order'          => 'ASC',
        	        'orderby'        => 'meta_value_num',
                    'lang'           => pll_current_language(),
				  ];

    $events = new WP_Query( $args_events );
    
    if ( $events->have_posts() ): ?>
    
    <div class="section6__event">
        
        <?php while ( $events->have_posts() ): $events->the_post(); ?>
            <?php                 
                $event_date     = get_field('acf-event-date');
                $event_location = get_field('acf-event-location');
                $event_purchase_url  = get_field('acf-event-purchase');
                
                // Load field value and convert to numeric timestamp.
                $unixtimestamp = strtotime( $event_date );
                
                $event_date = date_i18n( 'd/m/y', $unixtimestamp );
                $event_time = date_i18n( 'H:i', $unixtimestamp );
            ?>
        <?php endwhile; ?>
        
        <div class="section6__event__main-date">
                <div class="section6__event__main-date-date">
                    <?php echo $event_date; ?>
                </div>
                
                <div class="section6__event__main-date-time">
                    <?php echo pll__('at','pojo') . ' ' . $event_time; ?>
                </div>
        </div>
        
        <div class="hl-seperator green"></div>
        
        <div class="section6__event__main-content">
            <?php the_content(); ?>
        </div>
        
        <div class="section6__event__meta">
            <div class="section6__event__meta-when"><span><?php  echo pll__('When','pojo')   . ':' . ' '  ?></span><?php echo $event_date . ' ' . pll__('at','pojo') . ' ' . $event_time; ?></div>
            <div class="section6__event__meta-where"><span><?php echo pll__('Where','pojo') . ':' . ' ' ?></span><?php   echo $event_location; ?></div>
        </div>
        
        <?php if ( $event_purchase_text AND $event_purchase_url ): ?>
            <div class="section6__event__button">
                <a class="button" href="<?php echo $event_purchase_url?>" target="_blank"><?php echo $event_purchase_text?><span></span></a>     
            </div>
        <?php endif; ?>
            
    </div> <!-- section6__event -->   
<?php else: ?>

    <div class="section6__no-events">
        <?php //_e( 'Sorry, no results were found.', 'pojo' ) ?>
    </div>

<?php  endif; ?>

<?php wp_reset_postdata(); ?>
   
   
  

 
</section>
