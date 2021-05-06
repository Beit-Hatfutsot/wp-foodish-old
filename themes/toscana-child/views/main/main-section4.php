<?php
/**
 * Section 3
 *
 * @author		Roy Hizkya
 * @package		page-templates
 * @version		1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$main_background = get_field('acf-main__section4_background');
$people           = get_field('acf-main__section4_people-image');
$title            = get_field('acf-main__section4_text_title');
$text             = get_field('acf-main__section4_text');


?>
<?php if ( $main_background ): ?>
<style>
    #section4 {
        background-image: url(<?php echo $main_background;?>);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position: 0 0;
    }
</style>    
<?php endif;?>

<section id="section4" class="elementor-menu-anchor">

   <div class="section4__text-container">
   
     <?php if ( $title ): ?>
       <h2 class="section4__title"> 
           <?php echo $title; ?>
       </h2> 
    <?php endif ;?>  
        
        
    <?php if ( $text ): ?>
      <div class="section4__text section__text"> 
          <?php echo $text; ?>
      </div> 
    <?php endif ;?>

   </div>
 
 
    <?php if ( $people ): ?>
       <figure class="section4__people"> 
            <img src="<?php echo $people?>"/>
       </figure> 
    <?php endif ;?>
    
    
    <div class="section4__posts-container">
        <?php
   
        	/**
			* Display the posts grid
			*/
            include( locate_template( 'views/posts/grid.php' ) );
        ?>
    </div>
    
</section>
