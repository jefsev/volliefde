@extends('layouts.app')

@section('content')
@php
    $curPost = get_queried_object();
@endphp
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

    <?php
    $loop = new WP_Query(
        array(
            'post_type' => 'lesdagen', 
            'posts_per_page' => -1,
            'order' => 'ASC',
        )
    )
    ?>

    <?php if ($loop->have_posts() ): ?>
    <section id="inschrijven" class="inschrijf_module">
        <div class="fw__title-banner flex-it f-row f-just-center f-align-center">
          <h2>Zelf lessen kiezen</h2>
          <img src="@asset('images/circle.svg')" alt="" class="svg-circle">
        </div>
        @php
            $shortcodeForm = get_field('shortcode_form');
        @endphp


        <section class="c__lesdagen boxed__s flex-it f-row f-just-start f-align-start f-wrap">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php $checkDay = get_field('les');
            $checkAmountAllowed = get_field('max_inschrijvingen');
            $amountSubbed = count(get_field('inschrijvingen'));
            if ($checkDay == $curPost && $checkAmountAllowed >= $amountSubbed) {
            ?>
            <div class="dag flex-it f-col f-just-center f-align-center" id="<?php echo get_the_ID(); ?>" data-date="@field('dag')-@field('maand')-@field('jaar')">
                <span class="dag-maand" id="<?php echo get_the_ID(); ?>" data-date="@field('dag')-@field('maand')-@field('jaar')">@field('dag')-@field('maand')</span>
                <span class="year" id="<?php echo get_the_ID(); ?>" data-date="@field('dag')-@field('maand')-@field('jaar')">@field('jaar')</span>
            </div>
          <?php } ?>
        <?php endwhile; wp_reset_query(); ?>
        </section>

        <section class="c__fw-text boxed__s">
            @php
                echo do_shortcode($shortcodeForm);
            @endphp

        </section>
    </section>
    <?php endif; ?>

  @endwhile
@endsection
