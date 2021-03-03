@group('header_home')
<section class="hero__front-page">
    <div class="hero__inner boxed__m flex-it f-row f-just-between f-align-center f-wrap">
        @group('header_links')
        <div class="hero__text">
            <h1>@sub('title')</h1>
            <p>@sub('text') </p>
            @hassub('link')
            <a href="@sub('link', 'url')" class="btn__text-link"><img src="@asset('images\line-btn.svg')" alt="">@sub('link', 'title')</a>
            @endsub
        </div>
        @endgroup
        @group('header_rechts')
        <div class="hero__vid-img">

            <video width="100%" height="100%" controls>
                <source src="@sub('video', 'url')" type="video/mp4">
              </video>
        </div>
        @endgroup
    </div>
</section>
@endgroup