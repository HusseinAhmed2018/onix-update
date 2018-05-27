$(document).ready( function () {
    /*$('.thumbnail img').mouseenter(function () {
        $('.zoom').show();
    });
    $('.thumbnail img').mouseleave(function () {
        $('.zoom').hide();
    })
    $('.thumbnail img').mousemove(function (e) {
        console.log($(this).length);
        $('.zoom img').stop();
        var offset = $(this).offset();
        var x = (-(e.pageX - offset.left)*$(this).naturalWidth / $(this).width);
        var y = (-(e.pageY - offset.top)*$(this).naturalHeight / $(this).height);
        var left = Math.max(x + 250 , 500 - $(this).naturalWidth);
        var top = Math.max(y + 250, 500 - $(this).naturalHeight);
        var fleft =  Math.min(left, 0);
        var ftop = Math.min(top, 0);
        $('.zoom img').animate({
            left: fleft + 'px',
            top: ftop + 'px'
        });
        $('.zoom img')[0].src = $(this)[0].src;
    });*/

    var currentMousePos = { x: -1, y: -1 };
    var interval = null;

    $(document).mousemove(function(event) {
        currentMousePos.x = event.pageX;
        currentMousePos.y = event.pageY;
    });

//     $('.product-img img').mouseenter(function () {
//         $('.zoom img')[0].src = $(this)[0].src;
//         $('.zoom').show();
//         $image = $(this);
//         interval = setInterval(function(){
//             var offset = $image.offset();
//             var x = (-(currentMousePos.x - offset.left)* $image[0].naturalWidth / $image[0].width);
//             var y = (-(currentMousePos.y - offset.top)* $image[0].naturalHeight / $image[0].height);
//             var left = Math.max(x + $('.zoom').width()/2 , $('.zoom').width() - $image[0].naturalWidth);
//             var top = Math.max(y + $('.zoom').height()/2, $('.zoom').height() - $image[0].naturalHeight);
//             var fleft =  Math.min(left, 0);
//             var ftop = Math.min(top, 0);
//             $('.zoom img').css({"left" : fleft , "top" : ftop});
//         }, 100);
//     });
//     $('.product-img img').mouseleave(function () {
//         $('.zoom').hide();
//         clearInterval(interval);
//     });
});
