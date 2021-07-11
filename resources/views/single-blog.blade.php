@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

  @php
    $current_user = get_the_author();  
    $author_id = $post->post_author; 
    $author_email = get_the_author_meta('user_email',$author_id);
    $user_profile_image = get_field('profile_photo',  'user_'.$author_id);
  @endphp

    <div class="container__post-single boxed__s">

        <div class="container___post-header">
            @thumbnail('full')
        </div>

        @include('partials.content-single-'.get_post_type())

        @if($user_profile_image)
            <div class="container__post-footer flex-it f-row f-just-start f-align-center">
                <div class="user__pic">
                    <img src="{{ $user_profile_image['url'] }}" alt="">
                </div>
                <div class="user__info flex-it f-col">
                    <h5>@author</h5>
                    <a href="mailto:{{$author_email}}">{{$author_email}}</a>
                </div>
            </div>
        @endif
    </div>
  @endwhile
@endsection
