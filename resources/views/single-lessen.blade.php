@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section class="les__hero">
        <div class="hero-img">
            <img src="@field('header_afbeelding', 'url')" alt="@field('header_afbeelding', 'alt')">
        </div>
        <div class="hero__banner flex-it f-row f-just-center f-align-center">
            <img src="@asset('images/circle.svg')" alt="" class="svg-circle">
            <div class="title-wrapper flex-it f-col f-just-center f-align-center">
              <h1><?php the_title(); ?></h1>
              @group('praktische_info')
              <span class="date">@sub('dag') | @sub('hoelaat') </span>
              @endgroup
            </div>
        </div>
    </section>

    <section class="c__pratical-info flex-it f-row f-just-center f-wrap">
      <div class="img__practical-info">
        <img src="@field('afbeelding', 'url')" alt="@field('afbeelding', 'alt')">
      </div>
      @group('praktische_info')
      <div class="info__practical-info flex-it f-col f-just-center f-align-center">
        <h3>@sub('titel')</h3>
        <div class="info__row flex-it f-row f-just-start">
          <span class="info-30">Waar:</span>
          <span class="info-70">@sub('waar')</span>
        </div>
        <div class="info__row flex-it f-row f-just-start">
          <span class="info-30">Dag:</span>
          <span class="info-70">@sub('dag')</span>
        </div>
        <div class="info__row flex-it f-row f-just-start">
          <span class="info-30">Hoelaat:</span>
          <span class="info-70">@sub('hoelaat')</span>
        </div>
        <div class="info__row flex-it f-row f-just-start">
          <span class="info-30">Prijs:</span>
          <span class="info-70">€ @sub('prijs') per les</span>
        </div>
        <a href="#inschrijven" class="btn__def">Inschrijven</a>
      </div>
      @endgroup
    </section>
    @group('fullwidth_text')
    <section class="c__fw-text boxed__s">
      @sub('text')
    </section>
    @endgroup
    <section id="inschrijven" class="inschrijf_module">

    </section>
  @endwhile
@endsection
