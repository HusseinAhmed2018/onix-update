/*jslint plusplus: true*/
/*global console, alert*/

(function ($) {
    $.fn.countTo = function (options) {
        // merge the default plugin settings with the custom options
        options = $.extend({}, $.fn.countTo.defaults, options || {});

        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return $(this).each(function () {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                $(_this).html(value.toFixed(options.decimals));

                if (typeof (options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof (options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };


})(jQuery);

jQuery(function ($) {
    
    var g = 0;
 var offset = $('.our-counter').offset();
           $(window).on("scroll", function(){
           var sc = $(window).scrollTop();
               
    if(sc >= 3448 && g == 0){
        g++;
    $('.timer').each(function() {
            $(this).countTo({
                from: 0,
                to: $(this).attr( "data-value" ),
                speed: 5000,
                refreshInterval: 10,
                onComplete: function (value) {
                    console.debug(this);
                }
    });
    });
    }
           })
});

