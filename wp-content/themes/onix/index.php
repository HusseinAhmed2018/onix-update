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


// set our variables
$slider_args = array(
    'post_type' => 'slider',
    'category_name' => 'home_page',
    "order" => 'DESC',
    "orderby" => "menu_order ID",
);
$sliders = query_posts($slider_args);

$term_slug = get_query_var('term');
$taxonomyName = get_query_var('taxonomy');
$current_term = get_term_by('slug', $term_slug, $taxonomyName);

$categories = get_terms('gallery_categories', ['hide_empty' => false]);

if ($term_slug > '') {
    $materials_args = array(
        'post_type' => 'gallery',
        "order" => 'ASC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1,

    );

} else {
    $materials_args = array(
        'post_type' => 'gallery',
        "order" => 'ASC',
        "orderby" => "menu_order ID",
        "posts_per_page" => -1,

    );
}
$galleries = query_posts($materials_args);

?>

<!--Start Main Slider-->
<?php //get_template_part( 'content', 'slider' );?>
<!--END Main Slider-->
<header class="home">
    <div class="swiper-container homeSlider">
        <div class="swiper-wrapper">
            <?php foreach ($sliders as $key => $slider) {

                $image = wp_get_attachment_image_src(get_post_custom_values('image', $slider->ID)[0], 'full');

                if (!$image) $image = bloginfo('stylesheet_directory') . '/images/default-image.png';

                ?>
                <div class="swiper-slide" style="background-image:url(<?php echo $image[0]; ?>);">
                    <div class="container">
                        <!-- <a href=""><div class="button">Read more</div></a> -->
                        <h1><?php echo(nl2br($slider->post_excerpt)); ?> </h1>
                    </div>
                </div>

            <?php } ?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
</header>
<?php foreach ($categories as $i => $cat) { ?>
    <div class="about">
        <div class="container-fluid">
            <div class="sit-co">
                <h1><?php echo strtoupper($cat->name); ?></h1>
            </div>
            <div class="row">
                <div class="grid-master">
                    <?php
                    $category = (get_category($categories[$i]));
                    $c = 0;
                    foreach ($galleries as $key => $gallery) {
                        if ($c > 3) {
                            $c = 0;
                            break;
                        }
                        $terms = wp_get_post_terms($gallery->ID, 'gallery_categories');
                        if ($terms[0]->name == $category->name) {
                            $c++;
                            $slug = '';
                            $image = wp_get_attachment_image_src(get_post_custom_values('images', $gallery->ID)[0], 'full');
                            if (!$image) $image = bloginfo('stylesheet_directory') . '/images/default-image.png';

                            $sm_img = pods_image_url($image[0], 'first', 0, '', true);
                            ?>

                            <div class="grid-item <?= $slug ?> col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= get_permalink($gallery->ID) ?>">
                                    <img src="<?= $sm_img ?>"/>

                                    <h4><?= $gallery->post_title ?></h4>
                                </a>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="about">
    <a class="all" href="<?= get_page_link(64); ?>">All Products</a>
</div>

<div class="about">
    <div class="container-fluid">
        <div class="row">
            <h1>FOLLOW US</h1>
        </div>
        <div class="row">
            <div class="grid-follow">
                <?php

                $facebook = get_post_meta(27, 'facebook', true);
                $twitter = get_post_meta(27, 'twitter', true);
                $instagram = get_post_meta(27, 'instagram', true);
                $Google = get_post_meta(27, 'google_plus', true);

                ?>
                <div id='' class="follow-social col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= $facebook; ?>" target="_blank">
                        <img src="http://theagencycairo.me/work/onix/wp-content/uploads/2017/06/Raleigh-art-museum-Brooks-Scarpa1.jpg"/>

                        <h4>FACEBOOK</h4>
                    </a>
                </div>

                <div class="follow-social col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= $instagram; ?>" target="_blank">
                        <img src="http://theagencycairo.me/work/onix/wp-content/uploads/2017/06/Raleigh-art-museum-Brooks-Scarpa1.jpg"/>

                        <h4>INSTAGRAM</h4>
                    </a>
                </div>

                <div class="follow-social col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= $Google; ?>" target="_blank">
                        <img src="http://theagencycairo.me/work/onix/wp-content/uploads/2017/06/Raleigh-art-museum-Brooks-Scarpa1.jpg"/>

                        <h4>GOOGLE</h4>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>

<script>

    //jQuery(window).ready(function(){
    //    var width = jQuery('.follow-social').width();
    //    var masterWidth = jQuery('.grid-masterpiece').width();
    //    var galleryWidth = jQuery('.grid-gallery').width();
    //
    //
    //
    //    jQuery('.follow-social').height(width*1);
    //    jQuery('.grid-masterpiece').height(masterWidth*1.01);
    //    jQuery('.grid-gallery').height(galleryWidth*1);
    //
    //
    //});
    //    jQuery(window).resize(function(){
    //
    //        var width = jQuery('.follow-social').width();
    //        var galleryWidth = jQuery('.grid-masterpiece').width();
    //        var galleryWidth = jQuery('.grid-gallery').width();
    //
    //
    //        jQuery('.follow-social').height(width*1);
    //        jQuery('.grid-masterpiece').height(galleryWidth*1.09);
    //        jQuery('.grid-gallery').height(galleryWidth*1);
    //
    //    });


</script>
