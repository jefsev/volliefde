@group('lesson_row')
<section class="c__lesson-row">
    <div class="bg-color"></div>
    <img src="@asset('images/circle.svg')" alt="" class="svg-circle">

    <div class="w__lesson-row boxed__m">
        <div class="text__row boxed__s">
            <h2>@sub('title')</h2>
            <p>@sub('text')</p>
        </div>
        <div class="lesson__row flex-it f-row f-just-start">

            @php
                $query = new WP_Query([
                    'post_type' => 'lessen',
                    'post_per_page' => 3,
                ]);
            @endphp
            @posts($query)
                <a href="@permalink" class="lesson__i">
                    <img src="@thumbnail('full', false)" alt="" class="lesson__thumb">
                    @group('samenvatting')
                    <span class="location">@sub('sub_titel')</span>
                    <h3>@sub('titel')</h3>
                    <p>@sub('samenvatting')</p>
                    <span class="btn__def">@sub('knop_text')</span>
                    @endgroup
                </a>
            @endposts
        </div>
    </div>
</section>
@endgroup