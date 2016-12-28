
    <script>

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
              <li data-cat="all" class="cat-hide">all</li>
              <li data-cat="hospital1">Hospitals</li>
              <li data-cat="hospital">Offices</li>
              <li data-cat="hospital1">Residential</li>
              <li data-cat="hospital1">Public Building</li>
              <li data-cat="hospital">Public Building</li>
            </ul>
        </div>
        <div class="projects-boxes-container">
        @foreach ($projects as $project)

                <div class="projects-boxes" data-cat="hospital">
                    <a href="projects/{{ $project->id }}" class="projects-box a-w-d" >
                        <div class="projects-content">
                            @if (count($project->thumbnail) > 0)
                                <div class="projects-img-box">
                                     <!-- style="background-image: url('{{ $project->thumbnail->thumbnail_path }}')"> -->
                                    <img src="{{ $project->thumbnail->thumbnail_path }}">
                                    <div class="projects-text-over">
                                      <h2 class="projects-title ba-line">{{ $project->title }}</h2>


                                    </div>

                                </div>
                            @endif


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
