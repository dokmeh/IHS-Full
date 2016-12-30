<div class="projects-container">
    <div class="projects-title-box">
        <div class="projects-info">
            <h1>پروژه ها</h1>
            <!-- <h2><a class="ba-line"></a></h2> -->
            <p></p>
        </div>
    </div>
    <div class="projects-thumbs-container">


        <div class="projects-category-list">
            <ul>
                <li data-cat="all" class="cat-hide">همه</li>
                @foreach ($categories as $category)

                    <li data-cat="{{ $category->id }}">{{ $category->name_fa }}</li>
                @endforeach

            </ul>
        </div>
        <div class="projects-boxes-container">
            @foreach ($projects as $project)

                <div class="projects-boxes" data-cat="{{ $project->category->id }}">
                    <a data-title="{{ $project->title_fa }}" href="/fa/projects/{{ $project->title_fa }}"
                       class="projects-box a-w-d">
                        <div class="projects-content">
                            @if (count($project->thumbnail) > 0)
                                <div class="projects-img-box">
                                <!-- style="background-image: url('{{ $project->thumbnail->thumbnail_path }}')"> -->
                                    <img src="{{ $project->thumbnail->thumbnail_path }}">
                                    <div class="projects-text-over">
                                        <h2 class="projects-title ba-line">{{ $project->title_fa }}</h2>
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
    window.sr = ScrollReveal().reveal('.a-w-d', {duration: 1000, reset: true}, 100);
</script>
