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
                    <img src="@asset('images/pregnant-grey.jpeg')" alt="" class="lesson__thumb">
                    <span class="location">Nijmegen ochtend</span>
                    <h3>@title</h3>
                    <p>Probeer een proefles op zaterdag of zondag.</p>
                    <span class="btn__def">Proefles</span>
                </a>
            @endposts
        </div>
    </div>
</section>
@endgroup