<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php
    $args = array( 
        'post_type' => 'capabilities',
        "order" => 'DESC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1
    );
    $capabilities = query_posts($args); 
?>
<section id="service" class="our-service">
    <div class="container">
        <div class="heading clearfix wow fadeInDown">
            <h3><?php _e( 'Our Service', 'cf4it' ); ?></h3>
            <hr>
        </div>
        <div class="row">
            <?php foreach ($capabilities as $key => $capability) {the_post();?>
            <div class="col-md-3 col-sm-6 col-xs-12 wow flipInY" data-wow-delay="0.<?=$key*2?>s">
                <div class="serv-item hvr-bounce-to-top text-center">
                    <div class="serv-icon">
                        <i class="fa <?php echo get_post_custom_values('icon')[0];?> fa-4x"></i>
                    </div>
                    <div class="clearfix"></div>
                    <h3><?php the_title();?></h3>
                    <?php the_excerpt()?>
                </div>
            </div>
            <?php }?>
            

        </div>
    </div>
</section>