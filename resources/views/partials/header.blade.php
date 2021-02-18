<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}"><img src="@asset('images/LogoVolliefde.svg')" alt=""></a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    <div class="mobile-hamburger-icon" id="mobile-hamburger-icon">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <nav class="nav-mobile-menu" id="nav-mobile-menu">
    @if (has_nav_menu('primary_navigation'))
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
  @endif
  </nav>
</header>