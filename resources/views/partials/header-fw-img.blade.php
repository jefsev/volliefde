@group('header_img')
<section class="header__fw-img">
    <div class="hero-img">
        <img src="@sub('image', 'url')" alt="@sub('image', 'alt')">
    </div>
    <div class="hero__banner flex-it f-row f-just-center f-align-center">
        <img src="@asset('images/circle.svg')" alt="" class="svg-circle">
        <h1><?php the_title(); ?></h1>
    </div>
</section>
@endgroup