<?php
/* #04ACFF
 * Template Name: Glossery Page Template
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
the_post();
      $qa_args = array(
        'post_type' => 'glossery',
        "order" => 'DESC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1
    );
    $qas = query_posts($qa_args); 
?>
                <div class="site-con">
                    <div class="container sm">
                        <div class="site-co">
                            <h2><?=the_title() ;?></h2>
                            <div id="tabs" class="up" style="margin-top: 40px;">
                                <div id="tabs_container">
                                    <div class="container">
                                      <ul class="acc">
                                      <?php 
                                      foreach ($qas as $key => $qa) {
                                          # code...
                                     
                                      ?>
                                        <li>
                                          <button class="acc_ctrl"><h2><?=$qa->post_title?></h2></button>
                                          <div class="acc_panel">
                                              <?=$qa->post_content?>
                                           </div>
                                        </li>
                                      <?php }?>
                                      </ul>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                        </div>
    
<?php get_footer(); ?>
