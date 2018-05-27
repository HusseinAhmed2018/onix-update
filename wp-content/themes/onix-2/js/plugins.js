jQuery(document).ready(function () {
    $('.map-spots').tooltip({
      selector: "a[rel=tooltip]"
  })   ; 

  $(".tooltips-office").hover(function()
    {
        $('.map-info').css("display", "none") ;
        $(this).parent().find('.map-info').css("display", "block");
    });    
    $(function() {

            var Page = (function() {

                var $nav = $('#nav-dots > span'),
                    slitslider = $('#slider').slitslider({
                        onBeforeChange: function(slide, pos) {

                            $nav.removeClass('nav-dot-current');
                            $nav.eq(pos).addClass('nav-dot-current');

                        }
                    }),

                    init = function() {

                        initEvents();

                    },
                    initEvents = function() {

                        $nav.each(function(i) {

                            $(this).on('click', function(event) {

                                var $dot = $(this);

                                if (!slitslider.isActive()) {

                                    $nav.removeClass('nav-dot-current');
                                    $dot.addClass('nav-dot-current');

                                }

                                slitslider.jump(i + 1);
                                return false;

                            });

                        });

                    };

                return {
                    init: init
                };

            })();

            Page.init();

            /**
             * Notes: 
             * 
             * example how to add items:
             */

            /*
				
            var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
				
            // call the plugin's add method
            ss.add($items);

            */

        });
    
                $(".mobile-app").hide();
            $("#mobile-app1").show();
            jQuery(".app-item-thumb").click(function(){
                $(".app-item-thumb").each(function(){
                    $(this).removeClass("active");
                });
                $(this).toggleClass("active");
                $(".mobile-app").hide();
                var id = jQuery(this).attr("id");
                $("#mobile-app"+id).show();
            });

    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 250) {
            $('#scoll-top').fadeIn();
        } else {
            $('#scoll-top').fadeOut();
        }
    });
                //News Slider
    			$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });

    //Click event to scroll to top
    $('#scoll-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    //Wow Fucnction Call        
    new WOW().init();

    //Nice Scroll        
    $("html").niceScroll();
    $(".client-post").niceScroll();
});

jQuery(".scrollToDown").click(function(){
    jQuery("html, body").animate({scrollTop:jQuery(".our-service").offset().top-190},1e3)
});