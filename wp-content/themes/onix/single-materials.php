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

$terms = get_terms('material', ['hide_empty' => false]);

// set our variables
$slider_args = array(
    'post_type' => 'slider',
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
$materials = query_posts($materials_args);
$catsPost = wp_get_post_terms(get_the_ID(), 'material');

$cats = '';
foreach ($catsPost as $key => $catPost) {
    # code...
    $cats .= ' <a href="' . get_term_link($catPost->slug, 'material') . '">' . $catPost->name . '</a>';
}
$post = get_post(get_the_ID());
?>

<!--Start Main Slider-->
<?php //get_template_part( 'content', 'slider' );
//var_dump(get_the_post_thumbnail_url(get_the_ID()));
?>
<!--END Main Slider-->
<div class="site-con">
    <div class="container sm">
        <div class="site-co">
            <div class="prods">
                <div class="product-det">
                    <!--<div class="product-img">
                                        <?php /*echo the_post_thumbnail(); */ ?>
                                    </div>-->

                    <!-- Start Slider-->
                    <div class="single-m product-img">
                        <ul class="bxslider">
                            <?php
                            if (get_post_custom_values('material_gallery') != null) {
                                $image_length = count(get_post_custom_values('material_gallery'));
                                for ($i = 0; $i <= $image_length; $i++) {
                                    $imagess = wp_get_attachment_image_src(get_post_custom_values('material_gallery')[$i], 'full');
                                    echo "<li><img src='" . $imagess[0] . "' alt=''></li>";
                                }
                            } else {
                                echo the_post_thumbnail();
                            }

                            ?>

                        </ul>
                        <div id="bx-pager">
                            <?php
                            if (get_post_custom_values('material_gallery') != null) {
                                $length = count(get_post_custom_values('material_gallery'));
                                if (empty($length)) {
                                    echo 'false';
                                } else {
                                    for ($x = 0; $x <= $length; $x++) {
                                        echo "<a data-slide-index='" . $x . "' href=''>";
                                        $post_image = wp_get_attachment_image_src(get_post_custom_values('material_gallery')[$x], 'full');
                                        echo "<img src='" . $post_image[0] . "' alt=''>";
                                    }
                                }
                            } else {
                                echo '';
                            }
                            ?>
                            </a>

                        </div>
                    </div>
                    <!-- End Slider-->

                    <div class="product-info">
                        <h2><?php the_title() ?></h2>
                        <p>
                            <?php the_excerpt() ?>
                        </p>
                        <!--<p>
                                            SKU: <? /*=get_post_custom_values('sku')[0]*/ ?>
                                        </p>-->
                        <p>
                            Category: <?= $cats ?>
                        </p>
                    </div>
                </div>
                <div class="flight-details">
                    <ul class="tabs">
                        <li class="active" rel="tab1">Description</li>
                        <li rel="tab2">Additional Information</li>
                    </ul>
                    <div class="tab_container">
                        <h3 class="d_active tab_drawer_heading" rel="tab1">Description</h3>
                        <div id="tab1" class="tab_content">
                            <?php echo $post->post_content; ?>

                        </div>
                        <!-- #tab1 -->
                        <h3 class="tab_drawer_heading" rel="tab2">Additional Information</h3>
                        <div id="tab2" class="tab_content">
                            <?= get_post_custom_values('additional_information')[0] ?>
                        </div>
                        <!-- #tab2 -->

                    </div>
                    <!-- .tab_container -->
                </div>

                <!-- Start Related Products-->
                <div>
                    <h2>Related Products</h2>
                    <div class="grid">
                        <?php
                        $length = [];
                        if (get_post_custom_values('related') != null) {
                            $length = count(get_post_custom_values('related'));
                        }

                        if (empty($length)) {
                            echo '<h1>Not have related Post!</h1>';
                        } else {

                            for ($x = 0; $x <= $length - 1; $x++) {
                                $post_id = get_post_custom_values('related')[$x];

                                $link = get_permalink($post_id);
                                $related_post = get_the_post_thumbnail($post_id, array(220, 195));
                                ?>
                                <div class="grid-item">
                                    <a href="<?= $link; ?>">
                                        <?= $related_post; ?>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- End Related Products-->
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
            if (get_post_custom_values('material_gallery') != null) {
                $image_length = count(get_post_custom_values('material_gallery'));
                for ($i = 0; $i < $image_length; $i++) {
                    $imagess = wp_get_attachment_image_src(get_post_custom_values('material_gallery')[$i], 'full');
            ?>
                    <div class="swiper-slide">
                        <div class="arr">
                            <img class="demo mainImg" src="<?= $imagess[0] ?>" alt="Demo">
                            <img class="subImg" src="<?= $imagess[0]?>" alt="Demo" id="box" style="display: none">
                        </div>
                    </div>
            <?php
                }
            }else{
            ?>
                <div class="swiper-slide">
                    <div class="arr">
                        <img class="demo mainImg" src="<?= get_the_post_thumbnail_url(get_the_ID()) ?>" alt="Demo">
                        <img class="subImg" src="<?= get_the_post_thumbnail_url(get_the_ID())?>" alt="Demo" id="box" style="display: none">
                    </div>
                </div>
            <?php
            }
            ?>
<!--            <div class="swiper-slide">-->
<!--                <div class="arr">-->
<!--                    <img class="demo mainImg" src="--><?//= get_template_directory_uri() . '/images/2.jpg' ?><!--" alt="Demo">-->
<!--                    <img class="subImg" src="--><?//= get_template_directory_uri() . '/images/2.jpg' ?><!--" alt="Demo" id="box" style="display: none">-->
<!--                </div>-->
<!--            </div>-->
<!--            -->
<!--            <div class="swiper-slide">-->
<!--                <div class="arr">-->
<!--                    <img class="demo mainImg" src="--><?//= get_template_directory_uri() . '/images/5.jpg' ?><!--" alt="Demo">-->
<!--                    <img class="subImg" src="--><?//= get_template_directory_uri() . '/images/5.jpg' ?><!--" alt="Demo" style="display: none">-->
<!--                </div>-->
<!--            </div>-->

        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
            <?php
            if (get_post_custom_values('material_gallery') != null) {
                $image_length = count(get_post_custom_values('material_gallery'));
                for ($i = 0; $i < $image_length; $i++) {
                    $imagess = wp_get_attachment_image_src(get_post_custom_values('material_gallery')[$i], 'full');
                    ?>
                    <div class="swiper-slide">
                        <img class="demo" src="<?= $imagess[0]?>" alt="Demo" id="x">
                    </div>
                    <?php
                }
            }else{
            ?>
                <div class="swiper-slide">
                    <img class="demo" src="<?= get_the_post_thumbnail_url(get_the_ID())?>" alt="Demo" id="x">
                </div>
            <?php
            }

            ?>
<!--            <div class="swiper-slide">-->
<!--                <img class="demo" src="--><?//= get_template_directory_uri() . '/images/2.jpg' ?><!--" alt="Demo" id="x">-->
<!--            </div>-->
<!--            -->
<!--            <div class="swiper-slide">-->
<!--                <img class="demo" src="--><?//= get_template_directory_uri() . '/images/5.jpg' ?><!--" alt="Demo">-->
<!---->
<!--            </div>-->

        </div>
    </div>
</div>

<?php get_footer(); ?>
