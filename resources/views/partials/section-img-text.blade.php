@group('block_img_text')
<div class="c__section-img-text">
    <div class="w__section-img-text flex-it f-row f-just-between f-align-center f-wrap">
        @hassub('image')
        <div class="img__l">
            <img src="@sub('image', 'url')" alt="@sub('image', 'alt')">
        </div>
        @endsub
        @group('text_rechts')
        <div class="text__r">
            <h3 class="f__reenie">@sub('titel')</h3>
            @sub('text')
            @hassub('link')
            <a href="@sub('link', 'url')" class="btn__text-link"><img src="@asset('images\line-btn.svg')" alt="">@sub('link', 'title')</a>
            @endsub
        </div>
        @endgroup
    </div>
</div>
@endgroup