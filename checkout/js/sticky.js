(function($) {
    $.fn.sticky = function(options) {

        options = $.extend({}, $.fn.sticky.defaults, options);


        this.each(function() {
            var self = $(this);
            var anchor  = self.parents('.billing');

            self.css({
               float: 'none',
               position: 'absolute'
            });

            anchor.css({
                position:'relative'
            });

            var topOffset = anchor.offset().top;
            var topDelta =  self.offset().top - topOffset;

            var bottomOffset = topOffset + anchor.height();

            function calculateDelta() {
                topOffset = anchor.offset().top;
                bottomOffset = topOffset + anchor.height();
                self.width(self.width());
            }

            var move = function() {

                var topScroll = $(window).scrollTop();
                var bottomScroll = topScroll + self.outerHeight(true);
                self.width(self.width());

                if (bottomScroll > bottomOffset) {
                    self.css({
                        position: "absolute",
                        top: "",
                        bottom: topDelta
                    });

                } else if ( topScroll < topOffset) {
                    self.css({
                        position: "absolute",
                        top: topDelta,
                        bottom: ""
                    });
                } else {
                    self.css({
                        position: "fixed",
                        top: topDelta,
                        bottom: ""
                    });
                }
            };

            $(window).scroll(move)
            $(window).resize( function () {
                calculateDelta();
                move();
            });
            onElementHeightChange(document.body, function(){
                calculateDelta();
                move();
            });
        });

        return this;
    };

    $.fn.sticky.defaults = {};

})(jQuery);

function onElementHeightChange(elm, callback){
    var lastHeight = elm.clientHeight, newHeight;
    (function run(){
        newHeight = elm.clientHeight;
        if( lastHeight != newHeight )
            callback();
        lastHeight = newHeight;

        if( elm.onElementHeightChangeTimer )
            clearTimeout(elm.onElementHeightChangeTimer);

        elm.onElementHeightChangeTimer = setTimeout(run, 200);
    })();
}

$(document).ready(function (){
    $('.sticky').sticky();
});
