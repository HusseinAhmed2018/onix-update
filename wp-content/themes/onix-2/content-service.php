<?php
/*
 * Template Name: Services Page Template
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
the_post();
 $args = array( 
'post_type' => 'capabilities',
"order" => 'DESC',
"orderby" => "menu_order ID",
"posts_per_page" => -1
);
$capabilities_list = query_posts($args); 
?>

<!--Start Main Content-->
<div class="top-page partners-page">
<div class="top-page-bg text-center">
<div class="container">
<h1 class="page-title"><?php the_title()?></h1>   
        <?php the_content()?>
</div>
</div>
</div>


    
<div class="container">
    
    <ul class="breadcrumb">
	<li><a href="<?php get_home_url(); ?>"><?php _e( "Home", 'cf4it' ); ?></a></li>
	<li><span ><?php the_title()?></span></li>
</ul>
   </div> 
        <?php 
        $secClass=['serv1','serv2','serv3'] ; $pointer=0 ; 
        foreach ($capabilities_list as $key => $capability) {the_post();
            # code...
            if ($pointer > 2   ) $pointer=0 ;
        ?>
        <section class="<?php echo $secClass[$pointer]?>">
            <div class="container">
            <div class="row">
                <?php if($key%2 == 0){ ?>
        <div class="col-md-3">
            <h1 class="serv-title"><?php echo the_title();?></h1>
            <div class="serv-ico">
                <i class="fa <?php echo get_post_custom_values('icon')[0];?> fa-5x"></i>
            </div>
        </div>
                
        <div class="col-md-9">
            <div class="serv-text">
                <p class="lead"><?php echo the_content();?></p>
            </div>
        </div>
                <?php }else{?>
                <div class="col-md-9">
            <div class="serv-text">
                <p class="lead"><?php echo the_content();?></p>
            </div>
        </div>
                <div class="col-md-3">
            <h1 class="serv-title"><?php echo the_title();?></h1>
            <div class="serv-ico">
                <i class="fa <?php echo get_post_custom_values('icon')[0];?> fa-5x"></i>
            </div>
        </div>
                
        
                <?php }?>
                </div>
                </div>
        </section>  
        <?php 
        $pointer++ ;
        }?>
         
        

 


    
<!--End Main Content Section-->
    
<?php get_footer(); ?>
