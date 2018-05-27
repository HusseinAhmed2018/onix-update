<?php
/**
 * The template for displaying slider post formats
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php
    $slider_args = array(
        'post_type' => 'home-slider',
        "order" => 'DESC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1
    );
    $sliders = query_posts($slider_args); 
?>
<div class="main-slide">
    <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
            <?php foreach ($sliders as $key => $slider) {
//                    the_post();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($slider->ID), 'post-thumbnail');
                    $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($slider->ID), 'full');

                    if (!$image)  $image =  bloginfo('stylesheet_directory'). '/images/default-image.png'   ;   
            ?>            
            <div class="sl-slide" data-orientation="<?php if($key%2 == 0) echo 'horizontal';else echo 'vertical';?>" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                    <div class="sl-slide-inner text-center">
                        <div class="bg-img " style="background-image: url(<?php echo $image[0];  ?>)">
                            <div class="overlay-bg"></div>
                        </div>
                        <div class="container">
                            <div class="slide-content text-center wow zoomInDown">
                                <h1><?php echo $slider->post_title?></h1>
                                <?php echo $slider->post_content?>
                                <?php if(get_post_custom_values('Link',$slider->ID)[0]){?>
                                        <a href="<?php echo get_post_custom_values('Link',$slider->ID)[0];?>" type="button" class="btn btn-default"><?php _e( 'Take tour', 'cf4it' ); ?></a>
                                <?php }?>
                            </div>
                        </div>
                        <a href="#" class="scrollToDown"><i class="fa fa-arrow-circle-down fa-3x"></i></a>
                    </div>
                </div>
            <?php
            } ?>
            
        </div>
        <!-- /sl-slider -->



    </div>
    <!-- /slider-wrapper -->



</div>