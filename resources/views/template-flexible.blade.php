{{--
  Template Name: Flexible Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.header-fw-img')
    @include('partials.section-fw-text')
    @include('partials.section-lesson-row')
    @include('partials.section-img-text')
  @endwhile
@endsection
