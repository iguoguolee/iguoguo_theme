;(function($){
	$.extend($.fn, {
	swipeEvents:function() {
      return this.each(function() {
        var startX,
            startY,
            $this = $(this);
        

        $this.bind('touchstart', touchstart);

        function touchstart(event) {
          var touches = event.originalEvent.touches;
          if (touches && touches.length) {
            startX = touches[0].pageX;
            startY = touches[0].pageY;
            $this.bind('touchmove', touchmove);
          }
         //event.preventDefault();
        }

        function touchmove(event) {
          var touches = event.originalEvent.touches;
          if (touches && touches.length) {
            var deltaX = startX - touches[0].pageX;
            var deltaY = startY - touches[0].pageY;

            console.warn(deltaX);
            if (deltaX >= 300) {
              $this.trigger("swipeLeft");
            }
            if (deltaX <= -300) {
              $this.trigger("swipeRight");
            }
            if (deltaY >= 300) {
              $this.trigger("swipeUp");
            }
            if (deltaY <= -300) {
              $this.trigger("swipeDown");
            }
            if (Math.abs(deltaX) >= 300 || Math.abs(deltaY) >= 300) {
              $this.unbind('touchmove', touchmove);
            }
          }
          //event.preventDefault();
        }

      });
    }
  }
)}
)(Zepto)
