
    <!-- <script>
        $(document).ready(function () {

            $('.project-container').mousewheel(function (e) {
                var sc = (this.scrollWidth - $(this).width()) / 10;
                if (sc < 150) {
                    sc = 150;
                }
                $(this).stop().animate({scrollLeft: $(this).scrollLeft() - (e.deltaY * sc)}, 1000, 'easeOutCubic');
            });
        })
        //var bh = $('.project-img-box').eq(0).height();
        $('.project-img-box img').imageloader({
            callback: function (ele) {
                //var mt = (bh - $(ele).height()) * 100 / bh;
                //var rmt = Math.floor(Math.random() * mt);
                //$(ele).css('margin-top', rmt + '%').addClass('loaded');
                $(ele).addClass('loaded');
            }
        });
        $('.project-buts a').click(function () {
            window.history.pushState(null, null, $(this).attr('href'));
            loadAjax($(this).attr('href'));
            return false;
        });
        $('.project-img-box img').click(function () {
            $('.project-gallery-bimg').attr('src', $(this).attr('src'));
            $('.project-galery').addClass('show');
        });
        $('.project-gallery-close').click(gclose);
        $('.project-gallery-but.left').click(gprev);
        $('.project-gallery-but.right').click(gnext);
        $('.project-galery').swipe({
            swipeLeft : gnext,
            swipeRight: gprev,
            swipeDown : gclose
        });
        $(window).keyup(function (e) {
            if ($('.project-galery').hasClass('show')) {
                if (e.which == 37) {
                    //left arrow
                    gprev();
                }
                else if (e.which == 39) {
                    //right arrow
                    gprev();
                }
                else if (e.which == 27) {
                    //Esc arrow
                    gclose();
                }
                return false;
            }
        });


        function gclose() {
            $('.project-galery').removeClass('show');
        }

        function gprev() {
            var ele  = $('.project-img-box img[src="' + $('.project-gallery-bimg').attr('src') + '"]');
            var prev = $('.project-img-box img').index(ele) - 1;
            if (prev < 0) {
                prev = $('.project-img-box img').length - 1;
            }
            $('.project-gallery-bimg').fadeOut(300, function () {
                $('.project-gallery-bimg').attr('src', $('.project-img-box img').eq(prev).attr('src'));
                $('.project-gallery-bimg').fadeIn(300);
            });
        }

        function gnext() {
            var ele  = $('.project-img-box img[src="' + $('.project-gallery-bimg').attr('src') + '"]');
            var next = $('.project-img-box img').index(ele) + 1;
            if (next >= $('.project-img-box img').length) {
                next = 0;
            }
            $('.project-gallery-bimg').fadeOut(300, function () {
                $('.project-gallery-bimg').attr('src', $('.project-img-box img').eq(next).attr('src'));
                $('.project-gallery-bimg').fadeIn(300);
            });
        }
    </script> -->
    <div class="project-container">
        <div class="project-part project-details a-w-d">

            <div class="project-cover"></div>
            <h2 class="ba-line">{{ $award->name }}</h2>
            <div class="project-info">
                <p>{!!  $award->description !!}</p>
            </div>


        </div>
        <div class="project-gallery a-w-d">

            <div class="slide">
                <img src="{{$award->photo->image}}" alt="">
            </div>

          <div class="project-controls">

              <div class="project-left-arrow">
                  <img src="../img/left.svg" alt="">
              </div>
              <div class="project-right-arrow">
                  <img src="../img/right.svg" alt="">
              </div>
              <div class="project-fullscreen-arrow">
                  <img src="../img/fullscreen.svg" alt="">
              </div>
          </div>
        </div>
    </div>

    <script type="text/javascript">
      window.sr = ScrollReveal().reveal('.a-w-d',{ duration: 1000, reset:true}, 100);
    </script>
