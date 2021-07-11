@extends('layouts.app')

@section('content')
  
    <div class="container__posts-title">
        <div class="wrap boxed__m">
            <h1>Blog</h1>
        </div>
    </div>
    <div class="container__posts boxed__m flex-it f-row f-just-start f-wrap">
        @while(have_posts()) @php the_post() @endphp
            <a href="@permalink" class="post__item flex-it f-col">
                <div class="thumb">
                    @thumbnail('medium')
                </div>
                <div class="info">
                    <h2>@title</h2>
                    <p><?php echo wp_trim_words( get_the_content(), 18, '...' ); ?></p>
                </div>
                <span class="btn__text-link"><img src="@asset('images\line-btn.svg')" alt="">Lees meer</span>
            </a>
        @endwhile
    </div>

@endsection
