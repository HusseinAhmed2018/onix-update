<?php
/*
 * Template Name: Events Page Template
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
the_post();
$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'media-thumbnail');
?>

<!--Start Main Content-->
<div class="top-page events-page">
<div class="top-page-bg text-center">
<div class="container">
<h1 class="page-title"><?php the_title()?></h1>    
    <p><?php the_excerpt()?></p>
</div>
</div>
</div>


    
<div class="container">
    
<?php cf4it_breadcrumbs();?>
    
    
    <?php 
    $args = array( 
        'post_type' => 'events',
        'paged' => $paged,
        'post_status' => 'publish',        
        "order" => 'DESC', 
        "orderby" => "menu_order ID",
    );
    $newsList = query_posts($args);   
  ?>
      
    <ul class="row list-unstyled">
        <?php foreach ($newsList as $key => $news) {the_post() ?>
        <li class="col-md-3 col-sm-6">
        <div class="news-item">
            <h3 class="news-title"><a href="<?php echo get_post_permalink($news->ID); ?>"><?php echo $news->post_title?></a></h3>
            <p class="news-date"><?php echo get_the_date( ); ?></p>
            <a href="<?php echo get_post_permalink($news->ID); ?>"><img src="<?php if (has_post_thumbnail($news->ID)) echo  wp_get_attachment_image_src( get_post_thumbnail_id($news->ID, 'Home-news') )[0]; else echo  bloginfo('stylesheet_directory'). '/images/default-image.png'?>" alt="" class="img-responsive"></a>
            <p class="news-desic">
            <?php echo $news->post_excerpt?>
            </p>
            <a class="read-more" href="<?php echo get_post_permalink($news->ID); ?>"> <?php _e( "Read More", 'cf4it' ); ?></a>
        </div>
        </li>
          <?php }?>
    </ul>   
    
    
 
    <?php cf4it_pagination();?>
</div>

    
<!--End Main Content Section-->
    
<?php get_footer(); ?>
