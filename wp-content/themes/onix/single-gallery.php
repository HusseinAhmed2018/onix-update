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
$images = get_attached_media('images');
$catsPost = wp_get_post_terms(get_the_ID(), 'gallery_categories');
$cats = '';

if (isset($catsPost[0]->slug)) {
    # code...
    $cats .= ' <a href="' . get_term_link($catsPost[0]->slug, 'gallery_categories') . '"> <i class="fa fa-angle-double-left"></i>  back to ' . $catsPost[0]->name . '</a>';
}

?>

<div class="site-con">
    <div class="container">

        <div class="site-co sing-gallery common-slider common-pop">
            <h1><?= the_title() ?></h1>
            <p><?= $cats ?></p>

            <ul class="bxslider">
                <?php
                foreach (get_post_custom_values('images') as $key => $image_id) {
                    # code...
                    $image = wp_get_attachment_image_src($image_id, 'full');
                    ?>

                    <li class=''>
                        <div class="overimage right"></div>
                        <img class="sliderImg" src='<?=$image[0]?>' alt=''>
                        <div class="overimage left"></div>
                    </li>
                <?php } ?>
            </ul>

            <div id="bx-pager">
                <?php
                foreach (get_post_custom_values('images') as $key => $image_id) {
                    # code...
                    $image = wp_get_attachment_image_src($image_id, 'full');
                    ?>
                    <a data-slide-index="<?= $key ?>" href=""><img src="<?= $image[0] ?>"/></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="myPopup">
    <a href="javascript:void(0)" class="closePop">X</a>
    <div class="controlZoom">
        <a href="javascript:void(1)" class="minus">-</a>
        <a href="javascript:void(1)" class="plus">+</a>
    </div>
    <div class="swiper-container gallery-top zoomContainer">
        <div class="swiper-wrapper">
            <?php
                foreach (get_post_custom_values('images') as $key => $image_id) {
                    # code...
                    $image = wp_get_attachment_image_src($image_id, 'full');
            ?>
                    <div class="swiper-slide">
                        <div class="arr">
                            <img class="demo mainImg" src="<?= $image[0] ?>" alt="Demo">
                            <img class="subImg" src="<?= $image[0] ?>" alt="Demo" style="display: none">
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
            <?php
                foreach (get_post_custom_values('images') as $key => $image_id) {
                    # code...
                    $image = wp_get_attachment_image_src($image_id, 'full');
            ?>
                    <div class="swiper-slide">
                        <img class="demo" src="<?= $image[0] ?>" alt="Demo" id="x">
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>


