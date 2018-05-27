<?php
/*
 * Template Name:  Portfolio Page Template
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
the_post();
$active = get_query_var("active", "");
?>

<!--Start Main Content-->
<div class="top-page events-page">
    <div class="top-page-bg text-center">
        <div class="container">
            <h1 class="page-title"><?php the_title() ?></h1>    
            <p><?php the_excerpt() ?></p>
        </div>
    </div>
</div>



<div class="container">

    <?php cf4it_breadcrumbs(); ?>
</div>  
<!--End Main Content Section-->
<section id="portfollio" class="latest-projects-inner">
    <div class="container">
        <div class="heading wow rubberBand clearfix">
            <h3><?php _e("Our Project's", 'cf4it'); ?></h3>
            <?php
            $args = array(
                'post_type' => 'work',
                "order" => 'DESC',
                "orderby" => "menu_order ID",
                'paged' => $paged,
                'post_status' => 'publish',
                "posts_per_page" => -1
            );
            $portfollios_list = query_posts($args);
            $cats = get_categories();
            ?>
            <hr>
        </div>
        <div id="options" class="clearfix  wow rubberBand">
            <ul id="filters" class="list-inline category-filter option-set clearfix portfolioFisr text-center" data-option-key="filter">
                <li><a href="centered-masonry.html#filter" data-option-value="*" <?php if ($active == "") { ?>class="selected"<?php } ?>><?php _e("all", 'cf4it'); ?></a></li>
                <?php
                foreach ($cats as $key => $cat) {
                    # code...

                    if ($cat->category_count > 0) {
                        ?>
                        <li><a href="centered-masonry.html#filter" data-option-value=".<?= $cat->slug ?>" <?php if ($active == $cat->slug) { ?>class="selected"<?php } ?>><?= $cat->name ?></a></li>
                    <?php }
                } ?>
                <!-- <li><a href="centered-masonry.html#filter" data-option-value=".web">Web Design</a></li>
                <li><a href="centered-masonry.html#filter" data-option-value=".mobile">Mobile App</a></li>
                <li><a href="centered-masonry.html#filter" data-option-value=".brand">Branding</a></li>
                <li><a href="centered-masonry.html#filter" data-option-value=".print">Printing</a></li> -->
            </ul>
        </div>

        <div id="container" class="clearfix">

            <?php
            foreach ($portfollios_list as $key => $portfollio) {
                the_post();
                $isoTopCats = "";
                $catsPost = get_the_category(get_the_ID());

                foreach ($catsPost as $key => $catPost) {
                    # code...
                    if ($catPost->category_count > 0)
                        $isoTopCats.=' ' . $catPost->slug;
                }
                $link = get_post_custom(get_the_ID())['Link'][0];
                ?>
                <div class="element <?= $isoTopCats ?> wow fadeIn" data-category="<?= $catPost->slug ?>">   
                    <div class="ovrly15">
                        <img alt="<?php the_title(); ?>" src="<?php if (has_post_thumbnail(get_the_ID())) echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID(), 'home-projects'))[0];
                else echo bloginfo('stylesheet_directory') . '/images/default-image.png' ?>" class="img-responsive">
                        <div class="ovrly"></div>
                <?php if ($link) { ?><a href="<?php echo $link; ?>" class="fa fa-link"></a><?php } ?>
                        <a href="<?php echo get_post_permalink(get_the_ID()); ?>" class="fa fa-search"></a>
                    </div>
                </div>
<?php } ?>



        </div>
        <!-- #container -->
        <?php
        $page = get_posts(
                array(
                    'name' => 'work'
                    , 'post_type' => 'page'
                )
        ); //print_r($page);die;
        ?>

    </div>
</section>	

<?php get_footer(); ?>
