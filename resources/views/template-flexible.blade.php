{{--
  Template Name: Flexible Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @layouts('header')
      @layout('header_front_page')
        @include('partials.header-front-page')
      @endlayout
      @layout('header_fw_img')
        @include('partials.header-fw-img')
      @endlayout
    @endlayouts

    @layouts('content')
      @layout('section_lesson_row')
        @include('partials.section-lesson-row')
      @endlayout
      @layout('section_fw_text')
        @include('partials.section-fw-text')
      @endlayout 
      @layout('section_img_text')
        @include('partials.section-img-text')
      @endlayout 
      @layout('contact_content')
        @include('partials.section-contact-content')
        @endlayout 
    @endlayouts
  @endwhile
@endsection