@extends('layouts.app')

@section('content')
  {{-- @while(have_posts()) @php the_post() @endphp --}}
    <section class="les__hero">
        <div class="hero-img">
            <img src="@asset('images/pregnant-grey.jpeg')" alt="">
        </div>
        <div class="hero__banner flex-it f-row f-just-center f-align-center">
            <img src="@asset('images/circle.svg')" alt="" class="svg-circle">
            <div class="title-wrapper flex-it f-col f-just-center f-align-center">
              <h1><?php the_title(); ?></h1>
              <span class="date">Nijmegen 9:15 tot 10:30 </span>
            </div>
        </div>
    </section>

    <section class="c__pratical-info flex-it f-row f-just-center f-wrap">
      <div class="img__practical-info">
        <img src="@asset('images/pregnant-grey.jpeg')" alt="">
      </div>
      <div class="info__practical-info flex-it f-col f-just-center f-align-center">
        <h3>Praktische informatie</h3>
        <div class="info__row flex-it f-row f-just-start">
          <span class="info-30">Waar:</span>
          <span class="info-70">Nijmegen, straatnaam 21</span>
        </div>
        <div class="info__row flex-it f-row f-just-start">
          <span class="info-30">Dag:</span>
          <span class="info-70">Zaterdag</span>
        </div>
        <div class="info__row flex-it f-row f-just-start">
          <span class="info-30">Hoelaat:</span>
          <span class="info-70">9:15 tot 10:30</span>
        </div>
        <div class="info__row flex-it f-row f-just-start">
          <span class="info-30">Prijs:</span>
          <span class="info-70">€ 14,95 per les</span>
        </div>
        <a href="" class="btn__def">Inschrijven</a>
      </div>
    </section>

    <section class="c__fw-text boxed__s">
      <h2>Zwangerschapscursus</h2>
      <p>Je hebt de keuze gemaakt om veganistisch te eten, en dan? Ik denk dat iedereen die het besluit maakt om plantaardig te eten voor veel keuzes komt te staan en ook veel vragen.
      </p><p>
          Vooral als je helemaal nieuw bent met plantaardig eten is het even uitzoeken en komt er best veel op je af. Ik weet nog dat ik dacht ‘maar wat moeten we dan eten?’ En ‘o, nee, dan kunnen we dit.. en dat… en dat.. niet meer eten’. ‘Hoe moet dat dan met kerst, uit eten, vakantie’. Maar allereerst, ‘hoe moet dat dan in de supermarkt?’
          </p>
          <a href="" class="btn__text-link"><img src="@asset('images\line-btn.svg')" alt="">Meer lezen</a>
  </section>
  {{-- @endwhile --}}
@endsection
