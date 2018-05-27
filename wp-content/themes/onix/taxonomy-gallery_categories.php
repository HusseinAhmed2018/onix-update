<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 


$term_slug = get_query_var( 'term' );
$taxonomyName = get_query_var( 'taxonomy' );
$current_term = get_term_by( 'slug', $term_slug, $taxonomyName );
     // if (is_tax()){
     //    echo 'ww' ;exit;
     // }
 


$terms = get_terms('gallery_categories', [ 'hide_empty' => false]);

 if ($term_slug > ''){
      $materials_args = array(
        'post_type' => 'gallery',
        "order" => 'DESC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1,

    );

  }else {
       $materials_args = array(
        'post_type' => 'gallery',
        "order" => 'DESC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1,
             
    );   
  }
    $materials = query_posts($materials_args); 

?> 

    <!--Start Main Slider-->
    <?php //get_template_part( 'content', 'slider' );?>
    <!--END Main Slider-->
 
<div class="about">
                <div class="container-fluid">
                    <div class="row">
                        <div class="filter-button-group">
                            <a data-filter="*">All</a>
                            <?php
                            foreach ( $terms as $term ) {

                                ?>
                                <a data-filter=".<?= $term->slug?>" class="<? if ($term_slug ==  $term->slug ) echo 'current' ;  ?>"><?= $term->name?></a>
                            <?php }?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="grid">
                        <?php 
                        foreach ($materials as $key => $gallery) {
                            # code...
                            $terms = wp_get_post_terms(  $gallery->ID , 'gallery_categories'  ) ;
                            $slug = '' ;
                            foreach ($terms as $key => $trem) {
                                # code...
                                $slug.=  $trem->slug.' ';
                            }
                        $image = wp_get_attachment_image_src( get_post_custom_values('images',$gallery->ID)[0] , 'full');
                        $sm_img = pods_image_url($image[0], 'first', 0, '', true);

                        if (!$image)  $image =  bloginfo('stylesheet_directory'). '/images/default-image.png'   ;
                        ?>

                            <div class="grid-item <?=$slug?> col-md-3 col-sm-6 col-xs-12">
                                <a href="<?=get_permalink($gallery->ID)?>" >
                                    <img src="<?=$sm_img?>"/>
<!--                                    <div class="grid-item-hover">-->
<!--                                        <span class="grid-item-hover-icon"></span>-->
<!--                                        <span class="grid-item-hover-bottom">--><!--</span>-->
<!--                                        <span class="grid-item-hover-bg boysband"></span>-->
<!--                                    </div>-->
                                <h4><?= $gallery->post_title?></h4>
                                </a>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>


<?php get_footer(); ?>
<?php
if ($term_slug ){
    ?>
    <script type="text/javascript">

        setTimeout(function(){
            $('a[data-filter=".<?=$term_slug?>"]').trigger('click');

        }, 500);
    </script>
<?php }?>