<div class="about-container">

    <div class="about-boxes">
        <div class="about-texts-left">
            <div class="about-box about-title a-w-d">
                <div class="about-content">
                    <h1>{{ $about->header }}</h1>
                </div>
            </div>
            <div class="about-box about-text">
                <div class="about-content a-w-d">
                    <p>{{ $about->description }}</p>
                </div>
            </div>
        </div>
        <div class="about-office-img-h a-w-d" style="background: url('img/project/photos/1482066388thumb2.png')">

        </div>
        <div class="about-box about-team-title">
            <div class="about-content">
                <h3>Certificates</h3>
            </div>
        </div>
        <div class="about-all-team-boxes">
            @foreach ($about->photos as $photo)

                <a href="{{ $photo->image }}" target="_blank" class="about-box about-team a-w-d">
                    <div class="about-content">
                        <img src="{{ $photo->image }}" class="about-team-img">
                    </div>
                </a>
            @endforeach


        </div>
    </div>
</div>
<script type="text/javascript">
    window.sr = ScrollReveal().reveal('.a-w-d', {duration: 1000, reset: true});
</script>
