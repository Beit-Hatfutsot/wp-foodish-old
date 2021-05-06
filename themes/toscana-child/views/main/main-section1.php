<?php
/**
 * Section 1
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$main_background   = get_field('acf-main__section1_background');
$bh_logo           = get_field('acf-main__section1_bh-logo');
$foodish_logo      = get_field('acf-main__section1_foodish-logo');
$pepper_image      = get_field('acf-main__section1_floating-elem');
$text_main_title   = get_field('acf-main__section1_main-title');
$text_top_right    = get_field('acf-main__section1_text-top-right');
$text_bottom_right = get_field('acf-main__section1_text-bottom-right');
$text_bottom_left  = get_field('acf-main__section1_text-bottom-left');

$button_text = get_field('acf-main__section1_button-text');
$button_link = get_field('acf-main__section1_button-url');
$button_link_url     = isset($button_link['url'])    ? $button_link['url'] : '#';
$button_link_target  = isset($button_link['target']) ? $button_link['target'] : '_self';

?>
<?php if ( $main_background ): ?>
<style>
    #section1 {
        background-image: url(<?php echo $main_background?>);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position: 0 0;
        padding-top: 56.25%;
        position: relative;
    }
</style>    
<?php endif;?>

<section id="section1" class="elementor-menu-anchor">

<div class="language-switcher visible-xs"><?php echo do_shortcode('[polylang_langswitcher]'); ?></div>


    <?php if ( $bh_logo ): ?>
       <figure class="section1__bh-logo"> 
            <img src="<?php echo $bh_logo?>"/>
       </figure> 
    <?php endif ;?>
    
    <?php if ( $foodish_logo ): ?>
       <figure class="section1__foodish-logo"> 
            <img src="<?php echo $foodish_logo?>"/>
       </figure> 
    <?php endif ;?>
    
    <?php if ( $text_main_title ): ?>
       <figure class="section1__main-title"> 
            <?php echo $text_main_title; ?>
       </figure> 
    <?php endif ;?>
    
    <?php if ( $pepper_image ): ?>
       <figure class="section1__pepper"> 
            <img src="<?php echo $pepper_image?>"/>
       </figure> 
    <?php endif ;?>    


    <?php if ( $button_text ): ?>
       <figure class="section1__button"> 
            <a href="<?php echo $button_link_url; ?>" target="<?php echo $button_link_target;?>" class="button">
                <?php echo $button_text; ?>
            </a>
       </figure> 
    <?php endif ;?>        
    
    <?php if ( $text_top_right ): ?>
       <div class="section1__text-top-right section1-side-texts"> 
           <?php echo $text_top_right;?>
       </div> 
    <?php endif ;?>
          
    <?php if ( $text_bottom_right ): ?>
       <div class="section1__text-bottom-right section1-side-texts"> 
           <?php echo $text_bottom_right;?>
       </div> 
    <?php endif ;?>

    <?php if ( $text_bottom_left ): ?>
       <div class="section1__text-bottom-left section1-side-texts"> 
           <?php echo $text_bottom_left;?>
       </div> 
    <?php endif ;?>
 
<?php if(pll_current_language() == 'en'): ?>

    <?php 
        $text_eng_top    = get_field('acf-main__section1_english_text-top'); 
        $text_eng_bottom = get_field('acf-main__section1_english_text-bottom'); 
    ?>

    <?php if ( $text_eng_top ): ?>
       <div class="section1__text-eng-top section1-side-texts"> 
           <?php echo $text_eng_top;?>
       </div> 
    <?php endif ;?>
    
    
    <?php if ( $text_eng_bottom ): ?>
       <div class="section1__text-eng-bottom section1-side-texts"> 
           <?php echo $text_eng_bottom;?>
       </div> 
    <?php endif ;?>
    
    
<?php endif;?>  
    
   
    
</section>
