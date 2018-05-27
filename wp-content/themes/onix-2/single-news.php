<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
$gallery = get_custom_field('gallery');
 __('our-news','cf4it');
 __('our-events','cf4it');
 __('work','cf4it');
 __('partners','cf4it');
 __('careers','cf4it');
 __('capabilities','cf4it');
 __('about-us','cf4it');
?>
<div class="top-page news-page">
    <div class="top-page-bg text-center">
        <div class="container">
            <h2><?php _e( "News", 'cf4it' ); ?></h2>
            <h1 class="page-title-news"><?php the_title() ?></h1>    
        </div>
    </div>
</div>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Start the loop.
        while (have_posts()) : the_post();
            ?>
            <div class="container">
            <?php cf4it_breadcrumbs();?>

        <!--<h3 class="post-heading"><?php the_title(); ?></h3>-->



                <div class="lead post-content">
                    <div class="text-center post-thumbs"><?php echo the_post_thumbnail(); ?></div>
    <?php the_content(); ?>  
                    <?php if (count($gallery) > 0) { ?>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">

                                <div class="item post-news-slider">            
                                    <div class="clearfix">
                                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                            <?php foreach ($gallery as $img) { ?>
                                                <li data-thumb="<?php echo wp_get_attachment_image_src($img, 'single-news-gallery')[0]; ?>"> 
                                                    <img src="<?php echo wp_get_attachment_image_src($img, 'single-news-gallery')[0]; ?>" class="img-responsive" />
                                                </li>

                                            <?php } ?>


                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div> 
    <?php } ?>


                </div>  

                <div class="next-post-news">
    <?php
    // next .
    the_post_navigation(array(
        'screen_reader_text' => __( 'Next New', 'cf4it' ),
        'next_text' => '<span class="post-title">%title</span>',
        'prev_text' => '',
    ));
    ?>
                    </div>
                <div class="prev-post-news">
    <?php
    // Previous .
    the_post_navigation(array(
        'screen_reader_text' => __( 'Previous New', 'cf4it' ),
        'next_text' => '',
        'prev_text' => '<span class="post-title">%title</span>',
    ));
    ?>
                    </div>
    <?php

// End the loop.
endwhile;
?>
            

        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
