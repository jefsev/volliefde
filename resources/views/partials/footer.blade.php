<footer class="content-info">
  {{-- <div class="footer__banner flex-it f-row f-just-center f-align-center">
    <img src="@asset('images/circle.svg')" alt="" class="svg-circle">
    <h3>Vol liefde je zwangerschap en de geboorte van je kindje beleven. </h3>
  </div> --}}
  <div class="w__footer boxed__m flex-it f-row f-just-between f-align-start f-wrap">
    <img src="@asset('images/circle.svg')" alt="" class="svg-circle">
    @options('footer_rij_1')
      <div class="nav__footer flex-it f-col">
        <h4>@sub('footer_rij_titel')</h4>
        @fields('footer_top_links')
        @php
            $link = get_sub_field('footer_top_link');
            $link_target = $link['target'] ? $link['target'] : '_self';
        @endphp
        <a href="@sub('footer_top_link', 'url')" target="{{$link_target}}">@sub('footer_top_link', 'title')</a>
        @endfields
      </div>
    @endoptions
    @options('footer_rij_2')
      <div class="nav__footer flex-it f-col">
        <h4>@sub('footer_rij_titel')</h4>
        @fields('footer_top_links')
        @php
            $link = get_sub_field('footer_top_link');
            $link_target = $link['target'] ? $link['target'] : '_self';
        @endphp
        <a href="@sub('footer_top_link', 'url')" target="{{$link_target}}">@sub('footer_top_link', 'title')</a>
        @endfields
      </div>
    @endoptions
    @options('footer_rij_3')
      <div class="nav__footer flex-it f-col">
        <h4>@sub('footer_rij_titel')</h4>
        @fields('footer_top_links')
        @php
        $link = get_sub_field('footer_top_link');
        $link_target = $link['target'] ? $link['target'] : '_self';
    @endphp
    <a href="@sub('footer_top_link', 'url')" target="{{$link_target}}">@sub('footer_top_link', 'title')</a>
        @endfields
      </div>
    @endoptions
    @options('footer_rij_4')
      <div class="nav__footer flex-it f-col">
        <h4>@sub('footer_rij_titel')</h4>
        @fields('footer_top_links')
        @php
            $link = get_sub_field('footer_top_link');
            $link_target = $link['target'] ? $link['target'] : '_self';
        @endphp
        <a href="@sub('footer_top_link', 'url')" target="{{$link_target}}">@sub('footer_top_link', 'title')</a>
        @endfields
      </div>
    @endoptions
      
  </div>

  <div class="btm__footer boxed__m flex-it f-row f-just-center f-align-center">
    <span>© <?php echo date("Y"); ?> Vol liefde | All rights reserved </span>
  </div>
</footer>
