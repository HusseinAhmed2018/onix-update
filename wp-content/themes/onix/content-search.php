<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */



?>

 


                        <?php 
  if ( 'materials' == get_post_type() || 'page' == get_post_type() ) {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id( ), 'full');

                        if (!$image[0]  )   $image[0] = get_stylesheet_directory_uri() . '/images/default-image.png'  ;   

                        ?> 

                            <div class="grid-item   col-md-3 col-sm-6 col-xs-12">
                                <a href="<?=get_permalink()?>" >
                                    <img src="<?=$image[0]?>"/>
                                    <div class="grid-item-hover">
                                        <span class="grid-item-hover-icon"></span>
                                        <span class="grid-item-hover-bottom"><?= the_title()?></span>
                                        <span class="grid-item-hover-bg boysband"></span>
                                    </div>
                                </a>
                                </div>
                                <?php }?>
                   
