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

$terms = get_terms('material', [ 'hide_empty' => false]);

// set our variables
     $slider_args = array(
        'post_type' => 'slider',
        'category_name'    => 'product_page',
        "order" => 'DESC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1
    );
    $sliders = query_posts($slider_args);

      $materials_args = array(
        'post_type' => 'materials',
        "order" => 'DESC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1
   );
//    $materials = query_posts($materials_args);
    $materials = get_posts($materials_args);
?>

<!---->
<!--    Start Main Slider-->
<!--    --><?php //get_template_part( 'content-slider', 'materials' );?>
<!--    END Main Slider-->
    <header class="home">
        <ul class="bxslider">
            <?php foreach ($sliders as $key => $slider) {

                $image = wp_get_attachment_image_src(get_post_custom_values('image',$slider->ID)[0], 'full');

                if (!$image)  $image =  bloginfo('stylesheet_directory'). '/images/default-image.png'   ;

                ?>
                <li class="ovrly" style="background-image:url(<?php echo $image[0];  ?>);">
                    <div class="container">
                        <h1><?php echo( nl2br($slider->post_excerpt) );?> </h1>
                        <!-- <a href=""><div class="button">Read more</div></a> -->
                    </div>
                </li>
            <?php }?>
        </ul>
    </header>
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
                        foreach ($materials as $key => $material) {
                            # code...
                            $terms = wp_get_post_terms(  $material->ID , 'material'  ) ;
                            $slug = '' ;
                            foreach ($terms as $key => $trem) {
                                # code...
                                $slug.=  $trem->slug.' ';
                            }
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id( $material->ID ), 'full');

                        if (!$image)  $image =  bloginfo('stylesheet_directory'). '/images/default-image.png'   ;

                            $sm_img = pods_image_url($image[0], 'first', 0, '', true);

                        ?>

                            <div class="grid-item <?=$slug?> col-md-3 col-sm-6 col-xs-12">
                                <a href="<?=get_permalink($material->ID)?>" >
                                    <img src="<?=$sm_img?>"/>
                                    <h4><?= $material->post_title?></h4>
                                </a>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>



            <?php
            if ($term_slug ){
            ?>
<script type="text/javascript">

 setTimeout(function(){
$('a[data-filter=".<?=$term_slug?>"]').trigger('click');

}, 500);
</script>
<?php }?>

<?php get_footer(); ?>