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
    $args2 = array( 
    'post_type' => 'testimonials',
    'meta_query' => array(
        array(
            'key'     => 'feature',
            'value'   => 1,
            'compare' => '=',
        ),      
     ),      
    "order" => 'DESC',
    "orderby" => "menu_order ID",
    "posts_per_page" => 6
    );    


    $testimonialsList = query_posts($args2); 
    $args = array( 
        'post_type' => 'news',
        'meta_query' => array(
            array(
                'key'     => 'feature',
                'value'   => 1,
                'compare' => '=',
            ),      
         ),          
        'showposts' => '2',
        "order" => 'DESC',
        "orderby" => "menu_order",
        "posts_per_page" => 2
    );
    $newsList = query_posts($args);    

?>
<section class="site-text">
    <div class="container">
        <div class="row">
            <!--Start Testmonials-->
            <div class="col-md-6 Testmonials">


                <div class="our-testimonials">
                    <div class="heading clearfix">
                        <h3><?php _e( "Our Testimonials", 'cf4it' ); ?></h3>
                        <hr>
                    </div>

                    <div class="test-item row">
                        <div id="Testmonials-slide" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                              <?php foreach ($testimonialsList as $key => $testimonial) { ?>
                                <div class="item <?php if ($key==0){ ?> active <?php }?>">
                                    <div class="col-md-8 col-xs-6">
                                        <div class="client-post">
                                            <i class="fa fa-quote-left fa-3x"></i>
                                            <p><?php echo $testimonial->post_content?></p>
                                        </div>

                                    </div>
                                    <div class="col-md-4 col-xs-6 wow flipInX">
                                        <div class="client-thumb">
                                            <img src="<?php if (has_post_thumbnail($testimonial->ID)) echo  wp_get_attachment_image_src( get_post_thumbnail_id($testimonial->ID, 'Home-Testimonials') )[0]; else echo  bloginfo('stylesheet_directory'). '/images/default-image.png'?>" class="img-responsive" alt="Client Thumbs">
                                            <p><?php echo $testimonial->post_title?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
     
                            </div>
                            <!-- Indicators -->
                            <div class="col-md-12">
                                <ul class="carousel-indicators list-inline custom-intdcatours text-center">
                                     <?php foreach ($testimonialsList as $key => $testimonial) { ?>
                                    <li data-target="#Testmonials-slide" data-slide-to="<?=$key?>" class="<?php if ($key==0){ ?>active<?php }?>"></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <!--End Testmonials-->
            <?php


            ?>
            <!--Start Latest News-->
            <div class="col-md-6 Latest_news">
                <div class="heading clearfix">
                    <h3><?php _e( "Latest News", 'cf4it' ); ?></h3>
                    <hr>
                </div>

                <ul class="Latest-news list-unstyled row">
                <?php 

                foreach ($newsList as $key => $news) {the_post();?>
                    <li class="col-md-6 col-sm-6">
                        <div class="news-item thumbnail">
                            <img src="<?php if (has_post_thumbnail(get_the_ID())) echo  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID(), 'Home-news') )[0]; else echo  bloginfo('stylesheet_directory'). '/images/default-image.png'?>" class="img-responsive" alt="News Thumbs">

                        </div>
                        <div class="post-text">
                            <a href="<?php echo get_post_permalink(get_the_ID()); ?>"><?php the_title();?></a>
                            <span class="post-time"><i class="ton ton-li-clock-1"></i><?php echo get_the_date( ); ?></span>
                        </div>
                    </li>
                    <?php }?>

                </ul>
            </div>
            <!--End Latest News-->

        </div>
    </div>
</section>