<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<section id="portfollio" class="latest-projects">
    <div class="container">
        <div class="heading wow rubberBand clearfix">
            <h3><?php _e( "Latest Project's", 'cf4it' ); ?></h3>
            <?php
            $args = array( 
                'post_type' => 'work',
                'showposts' => '4',
                'meta_query' => array(
                    array(
                        'key'     => 'feature',
                        'value'   => 1,
                        'compare' => '=',
                    ),
                ),
                "order" => 'DESC',
                "orderby" => "menu_order ID",
                "posts_per_page" => -1
            );          
            $cats = get_categories();
 
            ?>
            <hr>
        </div>
        <div id="options" class="clearfix  wow rubberBand">
            <ul id="filters" class="list-inline category-filter option-set clearfix portfolioFisr text-center" data-option-key="filter">
                
                <?php 
                $firstCat = 0 ;
                foreach ($cats as $key => $cat) {
                    # code...
                     
                    $args['cat'] = $cat->cat_ID ; 
                    $catInPost =  query_posts($args);  
                    if (count($catInPost) > 0) {
                        $firstCat++ ; 
                    if ($firstCat ==1 ){ 
                ?>
                <li><a href="centered-masonry.html#filter" data-option-value=".<?=$cat->slug?>" class="selected"><?php _e( "all", 'cf4it' ); ?></a></li>
                <?php }?>
                <li><a href="centered-masonry.html#filter" data-option-value=".<?=$cat->slug?>"><?=$cat->name?></a></li>
                <?php }}?>
                <!-- <li><a href="centered-masonry.html#filter" data-option-value=".web">Web Design</a></li>
                <li><a href="centered-masonry.html#filter" data-option-value=".mobile">Mobile App</a></li>
                <li><a href="centered-masonry.html#filter" data-option-value=".brand">Branding</a></li>
                <li><a href="centered-masonry.html#filter" data-option-value=".print">Printing</a></li> -->
            </ul>
        </div>

        <div id="container" class="clearfix">
                
            <?php 

            foreach ($cats as $key => $cat) {
            $args['cat'] = $cat->cat_ID ;     
            $portfollios_list = query_posts($args);        
            foreach ($portfollios_list as $key => $portfollio) {;
            $isoTopCats="";    
            // $catsPost =get_the_category($portfollio->ID) ; 

            // foreach ($catsPost as $key => $catPost) {
            //     # code...
            //   $isoTopCats.=' '. $catPost->slug ;
            // }
            $isoTopCats =$cat->slug ; 
            $link = get_post_custom($portfollio->ID)['Link'][0] ; 
            ?>
            <div class="element <?=$isoTopCats?> wow fadeIn" data-category="<?=$catPost->slug?>">   
                <div class="ovrly15">
                    <img alt="<?php the_title();?>" src="<?php if (has_post_thumbnail($portfollio->ID)) echo  wp_get_attachment_image_src( get_post_thumbnail_id($portfollio->ID, 'Home-projects') )[0]; else echo  bloginfo('stylesheet_directory'). '/images/default-image.png'?>" class="img-responsive">
                    <div class="ovrly"></div>
                    <?php if($link ){  ?><a href="<?php echo $link;?>" class="fa fa-link"></a><?php }?>
                    <a href="<?php echo get_post_permalink($portfollio->ID); ?>" class="fa fa-search"></a>
                </div>
            </div>
            <?php }}?>
 
 

        </div>
        <!-- #container -->
        <?php 
        $page = get_posts(
            array(
                'name'      => 'work'
        ,        'post_type' => 'page'
            )
        );//print_r($page);die;?>
        <a href="<?php if ($page){echo get_permalink($page[0]->ID);}?>" class="portfolio-more"><?php _e( "More", 'cf4it' ); ?></a>
    </div>
</section>