<?php
/* #04ACFF
 * Template Name: About Page Template
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
the_post();
?>

                <div class="site-con">
                    <div class="container sm">
                        <div class="site-co">
                            <h2><?=the_title()?></h2>
                            <div class="prods">
                                <p>
                                  <?=the_content()?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bannerp banner">
                    <div class="container">
                        <div class="row center site-co">
                            <h2><?=get_post_custom_values('title_2')[0]?></h2>
                            <div class="prods">
                             <p>
                                   <?=get_post_custom_values('description_2')[0]?>
                                       </p>          
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-con">
                    <div class="container sm">
                        <div class="site-co">
                            <h2><?=get_post_custom_values('title_3')[0]?></h2>
                            <div class="prods">
                                <p> 
                                     <?=get_post_custom_values('description_3')[0]?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
    
<?php get_footer(); ?>
