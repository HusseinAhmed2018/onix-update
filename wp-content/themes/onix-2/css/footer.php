<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$page = get_posts(
    array(
        'name'      => 'contact-us'
,        'post_type' => 'page'
    )
);
    $address=get_post_custom($page[0]->ID)['address'][0] ;
    $mobile=get_post_custom($page[0]->ID)['mobile'][0] ;
    $telephone=get_post_custom($page[0]->ID)['telephone'][0] ;
    $email=get_post_custom($page[0]->ID)['email'][0] ;
    $facebook=get_post_custom($page[0]->ID)['facebook'][0] ;
    $twitter=get_post_custom($page[0]->ID)['twitter'][0] ;
    $instagram=get_post_custom($page[0]->ID)['instagram'][0] ;
    $google_plus=get_post_custom($page[0]->ID)['google_plus'][0] ;

?>
        </div><!-- /content-wrap -->
         </div>
    </div><!-- /container -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="links hide">
                    <img src="<?php echo get_bloginfo('template_directory') ?>/images/logo.png">
                </div>
                <div class="links hide">
                    <h3>Address</h3>
                    <p>
                       <?=nl2br($address)?>
                    </p>
                </div>
                <div class="links hide">
                    <h3>Contact</h3>
                    <p>
                      <?php if ( $telephone > '') { ?>  TEl: <?=$telephone?><br> <?php }?>
                       <?php if ( $mobile > '') { ?> Mob: <?=$mobile?><br> <?php }?>
                        Email:  <?php if ( $email > '') { ?><?=$email?><?php }?>
                    </p>
                </div>
                <div class="links hide">
                    <h3>Follow us</h3>
                    <nav>

                        <?php if ( $facebook > '') { ?><a target="_blank" href="<?=$facebook?>"><i class="fa fa-facebook-square"></i></a><?php }?>
                        <?php if ( $twitter > '') { ?><a target="_blank" href="<?=$twitter?>"><i class="fa fa-twitter-square"></i></a><?php }?>
                        <?php if ( $instagram > '') { ?><a target="_blank" href="<?=$instagram?>"><i class="fa fa-instagram"></i></a><?php }?>
                        <?php if ( $google_plus > '') { ?><a target="_blank" href="<?=$google_plus?>"><i class="fa fa-google-plus-square"></i></a><?php }?>

                    </nav>
                </div>
            </div>
            <h4>Copyright &copy; <?=date('Y')?> The Agency. All Rights Reserved</h4>
        </div>
    </footer>

    <!-- Ui js -->
    <script src="<?php echo get_bloginfo('template_directory') ?>/js/jquery-2.2.1.min.js" type="text/javascript"></script>

    <script src="<?php echo get_bloginfo('template_directory') ?>/js/snap.svg-min.js" type="text/javascript"></script>

        <script src="<?php echo get_bloginfo('template_directory') ?>/js/classie.js" type="text/javascript"></script>

            <script src="<?php echo get_bloginfo('template_directory') ?>/js/jquery.bxslider.min.js" type="text/javascript"></script>

                <script src="<?php echo get_bloginfo('template_directory') ?>/js/tabulous.js" type="text/javascript"></script>

                    <script src="<?php echo get_bloginfo('template_directory') ?>/js/main.js" type="text/javascript"></script>

                        <script src="<?php echo get_bloginfo('template_directory') ?>/js/custom.js" type="text/javascript"></script>

    <?php wp_footer(); ?>

        </body>

        </html>