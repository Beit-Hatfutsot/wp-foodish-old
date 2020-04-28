<?php
/**
 * Section 3
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$main_background = get_field('acf-main__section6_background');
$apron           = get_field('acf-main__section6_apron-image');
$title            = get_field('acf-main__section6_text_title');
$text             = get_field('acf-main__section6_text');


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

<section id="section6" class="elementor-menu-anchor">

    <?php if ( $apron ): ?>
       <figure class="section6__apron"> 
            <img src="<?php echo $apron?>"/>
       </figure> 
    <?php endif ;?>

   <div class="section6__text-container">
   
     <?php if ( $title ): ?>
       <h2 class="section6__title"> 
           <?php echo $title; ?>
       </h2> 
    <?php endif ;?>  
        
        
    <?php if ( $text ): ?>
      <div class="section6__text section__text"> 
          <?php echo $text; ?>
      </div> 
    <?php endif ;?>

   </div>
   
   <div class="arpon-container  visible-xs">
       <figure class="section6__band-mobile visible-xs"> 
            <?php $band_image_mobile = get_bloginfo('stylesheet_directory') . '/assets/images/band.jpg'; ?>
            <img src="<?php echo $band_image_mobile; ?>"/>
       </figure> 
      
         
       <figure class="section6__apron-mobile visible-xs"> 
            <?php $apron_image_mobile = get_bloginfo('stylesheet_directory') . '/assets/images/apron.png'; ?>
            <img src="<?php echo $apron_image_mobile; ?>"/>
       </figure> 
  </div>
 
</section>
