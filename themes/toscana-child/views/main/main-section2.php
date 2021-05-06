<?php
/**
 * Section 2
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$background_color = get_field('acf-main__section2_background');
$beetsweb         = get_field('acf-main__section2_floating-elem');
$phone            = get_field('acf-main__section2_phone-image');
$title            = get_field('acf-main__section2_text_title');
$text             = get_field('acf-main__section2_text');


?>
<?php if ( $background_color ): ?>
<style>
    #section2 {
      background-color: <?php echo $background_color;?>;  
    }
</style>    
<?php endif;?>

<section id="section2" class="elementor-menu-anchor">

 
 

   <div class="section2__text-container">
   
     <?php if ( $title ): ?>
       <h2 class="section2__title"> 
           <?php echo $title; ?>
       </h2> 
    <?php endif ;?>  
        
        
    <?php if ( $text ): ?>
      <div class="section2__text section__text"> 
          <?php echo $text; ?>
      </div> 
    <?php endif ;?>

   </div>
   
   <?php if ( $beetsweb ): ?>
       <figure class="section2__beetsweb hidden-xs"> 
            <img src="<?php echo $beetsweb?>"/>
       </figure> 
   <?php endif ;?>
   
   
   <figure class="section2__beetsweb-mobile visible-xs"> 
        <?php $beetsweb_image_mobile = get_bloginfo('stylesheet_directory') . '/assets/images/beetsweb-mobile.png'; ?>
        <div class="beetsweb-image" style="background: url(<?php echo $beetsweb_image_mobile; ?>) no-repeat;"></div>
   </figure> 

 
   <?php if ( $phone ): ?>
       <figure class="section2__phone"> 
            <img src="<?php echo $phone?>"/>
       </figure> 
  <?php endif ;?>   
    
</section>
