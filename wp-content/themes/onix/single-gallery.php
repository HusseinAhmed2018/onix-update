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

<!--Start Main Slider-->
<?php //get_template_part( 'content', 'slider' );?>
<!--END Main Slider-->


<!--<div class="my-container">-->
<!--    <p class="my-close">X</p>-->
<!--    <div class="around-img">-->
<!--        <img class="demo" src="" alt="Demo" id="x"-->
<!--             style="max-width: 100%; max-height: 100%;height: inherit !important; display: none">-->
<!--    </div>-->
<!--</div>-->

<div class="site-con">
    <div class="container">
<!--        <span class='zoom1' id='ex1'>-->
<!--		<img src='--><?//= get_template_directory_uri() . '/images/name1.jpg'?><!--' width='555' height='320' alt='Daisy on the Ohoopee'/>-->
<!--		<p>Hover</p>-->
<!--	</span>-->
        <div class="site-co sing-gallery">
            <h1><?= the_title() ?></h1>
            <p><?= $cats ?></p>
            <ul class="bxslider">
                <?php
                foreach (get_post_custom_values('images') as $key => $image_id) {
                    # code...
                    $image = wp_get_attachment_image_src($image_id, 'full');
                    ?>
                    <li class='ex1'><img src="<?= $image[0] ?>" class="sliderImg"  alt='Daisy on the Ohoopee'/></li>
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


<?php get_footer(); ?>


