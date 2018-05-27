<?php
/*
 * Template Name: Careers Page Template
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
the_post();

?>


<!--Start Main Content-->
<div class="top-page careers-page">
<div class="top-page-bg text-center">
<div class="container">
<h1 class="page-title"><?php the_title()?></h1>    
    <p><?php the_excerpt()?></p>
</div>
</div>
</div>
<div class="container">
<?php cf4it_breadcrumbs();?>
    
    <h2 class="site-heading"><i class="ton-li-suitcase"></i> <?php _e( "Jobs Available", 'cf4it' ); ?></h2>
    
      <?php 
    $args = array( 
        'post_type' => 'careers',
        "order" => 'DESC',
        "orderby" => "menu_order ID",
        'paged' => $paged,
        'post_status' => 'publish',        
    );
    $careersList = query_posts($args);   
  ?>
    <ul class="list-unstyled row">
     <?php foreach ($careersList as $key => $career) { ?>
        <li class="col-md-6 col-sm-6">
            <div class="hiring-item">
                <h3 class="hiring-title"><a href="<?php echo get_post_permalink($career->ID); ?>"><?=$career->post_title?></a></h3>
                <ul class="list-unstyled hiring-text">
                    <h2><?php _e( "JOB DESCRIPTION", 'cf4it' ); ?></h2>
                    <?=$career->post_content?>
                </ul>
<!--                 <ul class="list-unstyled hiring-text">
                    <h2>Qualifications</h2>
                    <li>Analyze and understand customer requirements, prepare technical proposals.</li>
                    <li>Act as a consultant in educating the client about different solution possibilities and give recommendations</li>
                    <li>Investigate new technologies and stay on top of technology.</li>
                    <li>Engage with sales in the field through meetings and presentations.</li>
                    <li>Conduct presentations of solutions to clients and potential clients.</li>
                    <li>Communicate seamlessly with the sales team and other internal teams to be able to deliver a complete, high quality final deliverable.</li>
                </ul> -->
                
                <a href="<?php echo get_post_permalink($career->ID); ?>" class="apply-now"><?php _e( "Apply Now", 'cf4it' ); ?></a>
            </div>
        </li>
        <?php }?>
 
        
      </ul>
  </div>  
    


    <div class="container">
<?php  cf4it_pagination();?>
 
</div>

    
<!--End Main Content Section-->
    
<?php get_footer(); ?>
