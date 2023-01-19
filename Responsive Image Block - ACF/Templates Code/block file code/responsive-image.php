<?php

/**
 * Responsive Images Block Template.
 */

//Storing field values in variables
$desktopImage = get_field('desktop-image');
$altTag = get_field('alt-tag-name');
$className = get_field('css_class');
$linkToImage = get_field('link_to_image');

?>

<picture <?php if($className){ ?> class="wps-imgBlock <?php echo $className; ?>" <?php  } ?> >

  <?php
  if( have_rows('responsive_image_fields') ){
    while( have_rows('responsive_image_fields') ){
        the_row(); ?>

        <source media="(max-width:<?php echo get_sub_field('screen_size'); ?>)" srcset="<?php echo get_sub_field('resp-image'); ?>">

    <?php
    } // end of while
  } //end of if 
  ?>
  
  <img src="<?php echo $desktopImage; ?>" <?php if($altTag){ ?> alt="<?php echo $altTag; ?>" <?php } ?> />

  <?php if($linkToImage) { ?>  <a href="<?php echo $linkToImage ?>"></a> <?php } ?>

</picture>

<style>
.wps-imgBlock {
  position: relative;
  display: block;
}
.wps-imgBlock a {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
</style>
