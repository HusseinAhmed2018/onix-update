<?php
/* #04ACFF
 * Template Name: About Page Template
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
the_post();
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(  ), 'full');

                        if (!$image)  $image =  bloginfo('stylesheet_directory'). '/images/default-image.png'   ;
?>

 				<div class="site-con">
					<div class="container sm">
						<div class="site-co">
							<h2><?=the_title() ; ?></h2>
							<div class="prods">
								<img src="<?= $image[0]?>">
							<?=the_content();?>

							</div>
						</div>
					</div>
				</div>
    
<?php get_footer(); ?>
