<?php
/**
 * Section 5
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$foosdish_logo  = get_field('acf-main__section5_foodish-image');
$title          = get_field('acf-main__section5_text_title');
$text           = get_field('acf-main__section5_text');
$button_text    = get_field('acf-main__section5__button-text');
$button_link    = get_field('acf-main__section5__button-link');

if( $button_link ) { 
    $link_url = $button_link['url'];
    $link_title = $button_link['title'];
    $link_target = $button_link['target'] ? $button_link['target'] : '_self';
}
?>
<style>
    #section5 {
      background-color: #fff;  
    }
</style>    

<section id="section5" class="elementor-menu-anchor">
    
    
    <?php if ( $foosdish_logo ): ?>
       <figure class="section5__logo"> 
            <img src="<?php echo $foosdish_logo?>"/>
       </figure> 
    <?php endif ;?>    
    
    
     <?php if ( $title ): ?>
     <div class="section5__title-container">
           <h2 class="section5__title"> 
               <?php echo $title; ?>
           </h2> 
      </div> 
    <?php endif ;?>  
        

   <div class="section5__text-container">      
    <?php if ( $text ): ?>
      <div class="section5__text section__text"> 
          <?php echo $text; ?>
      </div> 
    <?php endif ;?>

   </div>
 
 <?php 
  
  $arrow = '&larr;';
  
  if(pll_current_language() == 'en') {
    $arrow = '&rarr;';
  }
  
 ?>
 
   <?php if ( $button_text ): ?>
      <div class="section5__button_container">
        <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $button_text ); ?><span><?php echo $arrow;?></span></a>
      </div>  
   <?php endif; ?>     
  
</section>
