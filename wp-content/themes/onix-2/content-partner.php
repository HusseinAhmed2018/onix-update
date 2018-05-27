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
        'post_type' => ' clients',
        'meta_query' => array(
            array(
                'key'     => 'feature',
                'value'   => 1,
                'compare' => '=',
            ),      
         ),  
        "order" => 'DESC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1
    );
   $partnersList = query_posts($args);    
?>
<style type="text/css">
    .Partner-item .img-responsive{
            height: 90px;
    }
</style>
<section id="partner" class="Our-partner">
    <div class="container">
        <div class="heading clearfix">
            <h3><?php _e( "Our Partner", 'cf4it' ); ?></h3>
            <hr>
        </div>


        
            <div class="item">
            <ul id="content-slider" class="content-slider">
                <?php  foreach ($partnersList as $key => $partner) {the_post();?>
                <li class="wow bounceInUp ">
                    <div class="Partner-item">
                        
                            <img src="<?php if (has_post_thumbnail(get_the_ID())) echo  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID(), 'full') )[0]; else echo  bloginfo('stylesheet_directory'). '/images/default-image.png'?>" height="50" width="135" class="img-responsive center-block" alt="<?php the_title();?>">
                   
                    </div>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
    

</section>