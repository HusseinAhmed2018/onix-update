<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$page = get_posts(
    array(
        'name' => 'contact-us'
    , 'post_type' => 'page'
    )
);
$address = get_post_custom($page[0]->ID)['address'][0];
$mobile = get_post_custom($page[0]->ID)['mobile'][0];
$telephone = get_post_custom($page[0]->ID)['telephone'][0];
$email = get_post_custom($page[0]->ID)['email'][0];
$facebook = get_post_custom($page[0]->ID)['facebook'][0];
$twitter = get_post_custom($page[0]->ID)['twitter'][0];
$instagram = get_post_custom($page[0]->ID)['instagram'][0];
$google_plus = get_post_custom($page[0]->ID)['google_plus'][0];

?>
</div><!-- /content-wrap -->
</div>
</div><!-- /container -->
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="links hide">
                <img src="<?php echo get_bloginfo('template_directory') ?>/images/logo.png">
            </div>
            <div class="links hide">
                <h3>Address</h3>
                <p>
                    <?= nl2br($address) ?>
                </p>
            </div>
            <div class="links hide">
                <h3>Contact</h3>
                <p>
                    <?php if ($telephone > '') { ?>  TEl: <?= $telephone ?><br> <?php } ?>
                    <?php if ($mobile > '') { ?> Mob: <?= $mobile ?><br> <?php } ?>
                    Email: <?php if ($email > '') { ?><?= $email ?><?php } ?>
                </p>
            </div>
            <div class="links hide">
                <h3>Follow us</h3>
                <nav>

                    <?php if ($facebook > '') { ?><a  href="<?= $facebook ?>"><i class="fa fa-facebook-square"></i>
                        </a><?php } ?>
                    <?php if ($twitter > '') { ?><a  href="<?= $twitter ?>"><i class="fa fa-twitter-square"></i>
                        </a><?php } ?>
                    <?php if ($instagram > '') { ?><a  href="<?= $instagram ?>"><i class="fa fa-instagram"></i>
                        </a><?php } ?>
                    <?php if ($google_plus > '') { ?><a  href="<?= $google_plus ?>"><i
                                class="fa fa-google-plus-square"></i></a><?php } ?>
                    <?php if ($google_plus > '') { ?><a
                            href="https://www.google.com/maps/place/ONIX+FOR+MARBLE+%26+GRANITE/@30.129247,31.7536315,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xe55947a112e7a670!8m2!3d30.129247!4d31.7558202?hl=en"><i
                                class="fa fa-map-marker"></i></a><?php } ?>

                </nav>
            </div>
        </div>
        <h4>Copyright &copy; <?= date('Y') ?> The Agency. All Rights Reserved</h4>
    </div>
</footer>

<!-- Ui js -->
<script src="<?php echo get_bloginfo('template_directory') ?>/js/jquery-2.2.1.min.js" type="text/javascript"></script>

<script src="<?php echo get_bloginfo('template_directory') ?>/js/snap.svg-min.js" type="text/javascript"></script>

<script src="<?php echo get_bloginfo('template_directory') ?>/js/classie.js" type="text/javascript"></script>

<script src="<?php echo get_bloginfo('template_directory') ?>/js/jquery.bxslider.min.js"
        type="text/javascript"></script>

<script src="<?php echo get_bloginfo('template_directory') ?>/js/tabulous.js" type="text/javascript"></script>

<script src="<?php echo get_bloginfo('template_directory') ?>/js/main.js" type="text/javascript"></script>

<script src="<?php echo get_bloginfo('template_directory') ?>/js/custom.js" type="text/javascript"></script>

<script src="<?php echo get_bloginfo('template_directory') ?>/js/myScript.js" type="text/javascript"></script>

<script type="text/javascript" src="<?= get_template_directory_uri() . '/js/jquery.zoom.js'; ?>"></script>

<script type="text/javascript" src="<?= get_template_directory_uri() . '/js/swiper.min.js'; ?>"></script>

<script>
    $(document).ready(function () {
        $('.ex1').zoom();

        $('.product-img .bxslider img').click(function () {
            var galleryTop = new Swiper('.gallery-top', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                observeParents: true,
                observer: true,
                simulateTouch: false,
                on: {
                    init: function () {
                        zoom()
                    }
                }
            });
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 20,
                centeredSlides: true,
                touchRatio: 0.2,
                slideToClickedSlide: true,
                observeParents: true,
                observer: true,
                slidesPerView: 'auto',
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    }
                }

            });
            /* connect thumbnail with main slider */
            if (typeof galleryTop.controller !== 'undefined') {
                galleryTop.controller.control = galleryThumbs;
                galleryThumbs.controller.control = galleryTop;
            }
            $('.myPopup').css('display', 'flex');
            //--------- Zoom Functionality ---------//

            // get zoom container width
            var intialSize = $('.arr').width();
            var size = $('.arr').width();

            // Reset Img Width Before Sliding & Reset Positions
            galleryTop.on('slideChange', function () {
                $('#box').css({
                    width: intialSize,
                    left: 0,
                    top: 0
                });
            });

            // Set Id Attribute After Each Slide
            galleryTop.on('slideChangeTransitionEnd', function () {
                size = $('.arr ').width();
                $('.gallery-top .swiper-slide img').removeAttr('id');
                $('.gallery-top .swiper-slide-active .subImg').attr('id', 'box');
                $('.gallery-top .swiper-slide-active .subImg').css('display', 'none');
                $('.gallery-top .swiper-slide-active .mainImg').css('display', 'block');
                zoom()
            });


            //Handling oom In And Out
            $('.plus').click(function () {
                if (size < intialSize + 600) {
                    size += 100
                    $('.zoomContainer .swiper-slide-active #box').css('width', size + 'px')
                }
                $('#box').css({
                    display: 'block',
                })
                $('.mainImg').css({
                    display: 'none',
                })
            });
            $('.minus').click(function () {
                if (size > intialSize) {
                    size -= 100;
                    $('.zoomContainer .swiper-slide-active #box').css({
                        width: size + 'px',
                        left: 0,
                        top: 0
                    })
                }
            });

            function zoom() {
                var box = $('#box');
                box.offset({
                    left: 0,
                    top: 0
                });

                var drag = {
                    x: 0,
                    y: 0,
                    state: false
                };
                var diff = {
                    x: 0,
                    y: 0
                };

                // When clicking Get X and Y According To document
                box.mousedown(function (e) {
                    if (!drag.state) {
                        drag.x = e.pageX;
                        drag.y = e.pageY;
                        drag.state = true;
                    }
                    return false;
                });


                $('.arr').mousemove(function (e) {
                    if (drag.state) {
                        // Difference Between First Click And Current Click
                        diff.x = e.pageX - drag.x;
                        diff.y = e.pageY - drag.y;

                        var cur_offset = $('.swiper-slide-active #box').offset();
                        var divLeft = (cur_offset.left + diff.x) - $('.swiper-slide-active .arr').offset().left ;
                        var divTop = (cur_offset.top + diff.y) - $('.arr').offset().top;
                        var diffWidth = $('.swiper-slide-active .arr').width() - $('#box').width();
                        var bottom = $('.gallery-top .swiper-slide-active').height() - $('.swiper-slide-active #box').height();


                        if ((divLeft <= 0) && (divTop <= 0) && ( divLeft >= diffWidth) && ( bottom <= divTop)) {
                            $('.arr #box').offset({
                                left: (cur_offset.left + diff.x),
                                top: (cur_offset.top + diff.y)
                            });
                        }
                        drag.x = e.pageX;
                        drag.y = e.pageY;
                    }
                });

                $('.arr').mouseup(function () {
                    if (drag.state) {
                        drag.state = false;
                    }
                });
            }
        });

        $('.myPopup .closePop').click(function () {
            $('.myPopup').css('display', 'none');
            $('.gallery-top .subImg').css('display', 'none');
            $('.gallery-top .mainImg').css('display', 'block');
        });

    });
</script>

</body>
</html>