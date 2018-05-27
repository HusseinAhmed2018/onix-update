<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

 

<!--Start 404 Page Content-->
<div class="about">
                <div class="container-fluid">
        <div class="col-md-12 alert-error">
       <center>
        <i class="fa fa-exclamation-triangle fa-5x"></i>
        <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyfifteen' ); ?></h1>
        <h3><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfifteen' ); ?></h3>
         </center>
     </div>
     </div>
            </div>

  
<!--End 404 Page Content-->

	

<?php get_footer(); ?>
