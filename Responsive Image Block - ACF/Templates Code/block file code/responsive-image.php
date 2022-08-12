<?php

/**
 * Responsive Images Block Template.
 */


//Storing field values in variables
$desktopImage = get_field('desktop-image');
$altTag = get_field('alt-tag-name');
$className = get_field('css_class');

?>

<picture <?php if($className){ ?> class="<?php echo $className; ?>" <?php  } ?> >
  
  <?php
  if( have_rows('responsive_image_fields') ){
    while( have_rows('responsive_image_fields') ){
        the_row(); ?>

        <source media="(max-width:<?php echo get_sub_field('screen_size'); ?>)" srcset="<?php echo get_sub_field('resp-image'); ?>">

    <?php
    } // end of while
  } //end of if 
  ?>
  <img src="<?php echo $desktopImage; ?>" <?php if($altTag){ ?> alt="<?php echo $altTag; ?>" <?php } ?> style="width:auto;">
  
</picture>