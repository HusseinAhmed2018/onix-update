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
<?php

$team = count(query_posts(['post_type'=>'team',"posts_per_page" => -1]));   
$partners = count(query_posts(['post_type'=>'clients',"posts_per_page" => -1])); 
$mobileApp = count(query_posts(['post_type'=>'work','category_name'=>'mobile-apps-development',"posts_per_page" => -1]));
$webApp = count(query_posts(['post_type'=>'work','category_name'=>'web-development',"posts_per_page" => -1]));   
?>
<div class="our-counter">
    <div class="our-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="our-count clients text-center">
                        <div class="hex">
                            <i class="ton ton-li-people-7"></i>
                        </div>
                        <p class="timer" data-value="<?=$team?>"></p>
                        <span><?php _e( "TEAM", 'cf4it' ); ?></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-count clients text-center">
                        <div class="hex">
                            <i class="ton ton-li-thumb-up"></i>
                        </div>
                        <p class="timer" data-value="<?=$partners?>"></p>
                        <span><?php _e( "PARTNERS", 'cf4it' ); ?></span>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-count clients text-center">
                        <div class="hex">
                            <i class="ton ton-li-screen"></i>
                        </div>
                        <p class="timer" data-value="<?=$webApp?>"></p>
                        <span><?php _e( "WEB APP", 'cf4it' ); ?></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-count clients text-center">
                        <div class="hex">
                            <i class="ton ton-li-phone-1"></i>
                        </div>
                        <p class="timer" data-value="<?=$mobileApp?>"></p>
                        <span><?php _e( "MOBILE APP", 'cf4it' ); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>