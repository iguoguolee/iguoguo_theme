;(function($){
	$.extend($.fn, {
	swipeEvents:function() {
      
      this.each(function() {
        
        var startX,
            startY,
            $this = $(this);
        $this.on('touchstart', touchstart);

        function touchstart(event) {
         // alert('start');
          var touches = event.originalEvent.touches;
          if (touches && touches.length) {
            startX = touches[0].pageX;
            startY = touches[0].pageY;
            $this.on('touchmove', touchmove);
          }
         event.preventDefault();
        }

        function touchmove(event) {
          var touches = event.originalEvent.touches;
          if (touches && touches.length) {
            var deltaX = startX - touches[0].pageX;
            var deltaY = startY - touches[0].pageY;

            if (deltaX >= 50) {
              $this.trigger("swipe_left");
            }
            if (deltaX <= -50) {
              $this.trigger("swipe_right");
              alert('moveRight');
            }
            if (deltaY >= 50) {
              $this.trigger("swipe_up");
            }
            if (deltaY <= -50) {
              $this.trigger("swipe_down");
            }
            if (Math.abs(deltaX) >= 50 || Math.abs(deltaY) >= 50) {
              $this.off('touchmove', touchmove);
            }
          }
          event.preventDefault();
        }

      });
    return this;
    }
  }
)}
)(Zepto)
