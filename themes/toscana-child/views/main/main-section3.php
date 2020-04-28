<?php
/**
 * Section 3
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$background_color = get_field('acf-main__section3_background');
$leaves           = get_field('acf-main__section3_floating-elem');
$book             = get_field('acf-main__section3_book-image');
$title            = get_field('acf-main__section3_text_title');
$text             = get_field('acf-main__section3_text');


?>
<?php if ( $background_color ): ?>
<style>
    #section3 {
      background-color: <?php echo $background_color;?>;  
    }
</style>    
<?php endif;?>

<section id="section3" class="elementor-menu-anchor">

   <div class="section3__text-container">
   
     <?php if ( $title ): ?>
       <h2 class="section3__title"> 
           <?php echo $title; ?>
       </h2> 
    <?php endif ;?>  
        
        
    <?php if ( $text ): ?>
      <div class="section3__text section__text"> 
          <?php echo $text; ?>
      </div> 
    <?php endif ;?>

   </div>
   
   
   <?php if ( $leaves ): ?>
       <figure class="section3__leaves"> 
            <img src="<?php echo $leaves?>"/>
       </figure> 
   <?php endif ;?>
   

   <?php if ( $book ): ?>
       <figure class="section3__book"> 
            <img src="<?php echo $book?>"/>
       </figure> 
   <?php endif ;?>    
   
   

      <figure class="section3__leaves-mobile visible-xs"> 
            <?php $leaves_image_mobile = get_bloginfo('stylesheet_directory') . '/assets/images/leaves-mobile-eng.png'; ?>
            <img src="<?php echo $leaves_image_mobile; ?>"/>
       </figure> 

 
  
</section>
