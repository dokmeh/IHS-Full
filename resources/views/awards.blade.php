
    <script>
        $(document).ready(function () {
            // $('.projects-container').mousewheel(function (e) {
            //     var sc = ($('.projects-boxes-container')[0].scrollWidth - $('.projects-boxes-container').width()) / 10;
            //     if (sc < 150) {
            //         sc = 150;
            //     }
            //     $('.projects-boxes-container').stop().animate({scrollLeft: $('.projects-boxes-container').scrollLeft() - (e.deltaY * 150)}, 1000, 'easeOutCubic');
            // });
            // $('.projects-box').on('mouseenter', function () {
            //     $('.projects-info h2 a').attr('href', $(this).attr('href')).text($(this).find('.projects-title').text());
            //     $('.projects-info p').text($(this).find('.projects-details').text());
            // })
        });
    </script>
    <div class="projects-container">
        <div class="projects-title-box">
            <div class="projects-info">
              <h1>Projects</h1>
                <!-- <h2><a class="ba-line"></a></h2> -->
                <p></p>
            </div>
        </div>
        <div class="projects-thumbs-container">


        <div class="projects-category-list">
            <ul>
              <li>Hospitals</li>
              <li>Offices</li>
              <li>Residential</li>
              <li>Public Building</li>
              <li>Public Building</li>
            </ul>
        </div>
        <div class="projects-boxes-container">
        @foreach ($awards as $award)

                <div class="projects-boxes">
                    <a href="awards/{{ $award->id }}" class="projects-box a-w-d">
                        <div class="projects-content">

                                <div class="projects-img-box">

                                    <img src="{{ $award->photo->image }}">

                                    <div class="projects-text-over">
                                      <h2 class="projects-title ba-line">{{ $award->name }}</h2>
                                     <p class="projects-details">{!! $award->date !!}</p>
                                    </div>

                                </div>



                        </div>
                    </a>


                </div>


        @endforeach
        </div>
        </div>

    </div>
<script type="text/javascript">
  window.sr = ScrollReveal().reveal('.a-w-d',{ duration: 1000, reset:true}, 100);
</script>
