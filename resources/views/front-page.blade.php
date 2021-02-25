@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.header-front-page')
    @include('partials.section-lesson-row')
    @include('partials.section-fw-text')
    @include('partials.section-img-text')
  @endwhile
@endsection
