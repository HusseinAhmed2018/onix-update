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
        'post_type' => 'about-sections',
        "order" => 'ASC',
        "orderby" => "menu_order",
        "posts_per_page" => -1
    );
    $about_sections = query_posts($args); 
?>
<section id="about" class="why-us">
    <div class="container">
        <div class="heading clearfix wow tada" data-wow-offset="200" >
            <h3><?php _e( 'Why Choose Us', 'cf4it' ); ?></h3> 
            <hr>
        </div>
        <div class="row">
        <?php foreach ($about_sections as $key => $about_section) {the_post();?>
            <div class="col-md-4 col-sm-6 wow fadeInUp"  data-wow-delay="0.<?=$key*2?>s">
                <div class="why-item">
                    <div class="wu-icon">
                        <i class="fa <?php echo get_post_custom_values('icon')[0];?> fa-3x"></i>
                    </div>
                    <span class="wu-heading"><?php the_title();?></span>
                    <?php the_excerpt()?>
                </div>
            </div>
              <?php }?>

        </div>
    </div>
</section>