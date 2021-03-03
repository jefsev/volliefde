@group('fullwidth_text')
<section class="c__fw-text boxed__s">
    @sub('text')
    @hassub('link')
    <a href="@sub('link', 'url')" class="btn__text-link"><img src="@asset('images\line-btn.svg')" alt="">@sub('link', 'title')</a>
    @endsub
</section>
@endgroup