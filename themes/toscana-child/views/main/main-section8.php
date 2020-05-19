<?php
/**
 * Section 8
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$background_color = get_field('acf-main__section8_background');
$peel             = get_field('acf-main__section7_floating-elem');
$title            = get_field('acf-main__section8_text_title');
$text             = get_field('acf-main__section8_text');
$cf_shortcode     = get_field('acf-main__section8_form-code');
$email            = get_field('acf-main__section8_email');
$fb_image         = get_field('acf-main__section8_facebook_image');
$fb_link          = get_field('acf-main__section8_facebook_link');
$inst_image       = get_field('acf-main__section8_instegram_image');
$inst_link        = get_field('acf-main__section8_instegram_link');


?>
<?php if ( $background_color ): ?>
<style>
    #section8 {
        background-color: <?php echo $background_color;?>;
    }
</style>    
<?php endif;?>

<section id="section8" class="elementor-menu-anchor">

   <div class="section8__text-container">
   
     <?php if ( $title ): ?>
       <h2 class="section8__title"> 
           <?php echo $title; ?>
       </h2> 
    <?php endif ;?>  
        
        
    <?php if ( $text ): ?>
      <div class="section8__text"> 
          <?php echo $text; ?>
      </div> 
    <?php endif ;?>

   </div>
   
    <?php if ( $cf_shortcode ): ?>
       <div class="contact-form-newsletter-section">
            <?php echo do_shortcode( $cf_shortcode );?>
       </div>
    <?php endif ;?>
    
    
    <?php if ( $email ): ?>
      <div class="section8__email"> 
        <a href="mailto:<?php echo sanitize_email( $email ); ?>"><?php echo $email;?></a>
      </div> 
    <?php endif ;?>

    <div class="section8__social_container">

            <?php if ( $fb_image ): ?>
              <div class="section8__facebook"> 
                <a href="<?php echo $fb_link;?>" target="_blank">
                    <img src="<?php echo $fb_image ?>" />
                </a>    
              </div> 
            <?php endif ;?>
            
        
            <?php if ( $inst_image ): ?>
              <div class="section8__instegram"> 
                <a href="<?php echo $inst_link;?>" target="_blank">
                    <img src="<?php echo $inst_image ?>" />
                </a>    
              </div> 
            <?php endif ;?>

    </div>
    
    
 
</section>
