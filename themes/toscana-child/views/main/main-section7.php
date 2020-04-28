<?php
/**
 * Section 3
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$main_background  = get_field('acf-main__section7_background');
$peel             = get_field('acf-main__section7_floating-elem');
$title            = get_field('acf-main__section7_text_title');
$text             = get_field('acf-main__section7_text');
$cf_shortcode     = get_field('acf-main__section7_form-code');


?>
<?php if ( $main_background ): ?>
<style>
    #section7 {
        background-color: #fff43f;
        background-image: url(<?php echo $main_background;?>);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position: 0 0;
    }
</style>    
<?php endif;?>

<section id="section7" class="elementor-menu-anchor">

   <div class="section7__text-container">
   
     <?php if ( $title ): ?>
       <h2 class="section7__title"> 
           <?php echo $title; ?>
       </h2> 
    <?php endif ;?>  
        
        
    <?php if ( $text ): ?>
      <div class="section7__text section__text"> 
          <?php echo $text; ?>
      </div> 
    <?php endif ;?>

   </div>
   
       <?php if ( $cf_shortcode ): ?>
       <div class="contact-form-yellow-section">
            <?php echo do_shortcode( $cf_shortcode );?>
       </div>
    <?php endif ;?>
    
    
    <?php if ( $peel ): ?>
       <figure class="section7__peel"> 
            <img src="<?php echo $peel?>"/>
       </figure> 
    <?php endif ;?>    
 
</section>
