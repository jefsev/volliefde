@extends('layouts.app')

@section('content')
    @options('header_img')
    <section class="header__fw-img">
        <div class="hero-img">
            <img src="@sub('image', 'url')" alt="@sub('image', 'alt')">
        </div>
    </section>
    @endoptions

    <section class="c__lesson-row archive-lesson-row">
        <div class="bg-color"></div>
        <img src="@asset('images/circle.svg')" alt="" class="svg-circle">
    
        <div class="w__lesson-row boxed__m">
            <div class="text__row boxed__s">
                <h2>@option('title')</h2>
                <p>@option('text')</p>
            </div>
        <div class="lesson__row flex-it f-row f-just-start f-wrap">
            @while(have_posts()) @php the_post() @endphp

            <a href="@permalink" class="lesson__i">
                <img src="@thumbnail('full', false)" alt="" class="lesson__thumb">
                @group('samenvatting')
                <span class="location">@sub('sub_titel')</span>
                <h3>@sub('titel')</h3>
                <p>@sub('samenvatting')</p>
                <span class="btn__def">@sub('knop_text')</span>
                @endgroup
            </a>   
            @endwhile

        </div>
    </div>
</section>
@endsection
