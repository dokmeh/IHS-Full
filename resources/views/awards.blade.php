<div class="projects-container">
    <div class="projects-title-box">
        <div class="projects-info">
            <h1>Awards</h1>
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
                    <a href="awards/{{ $award->name }}" class="projects-box a-w-d">
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
    window.sr = ScrollReveal().reveal('.a-w-d', {duration: 1000, reset: true}, 100);
</script>
