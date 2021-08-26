@extends('home::layouts.master')

@section('content')
<section id="hero1">

  <x-carousel :items="$slides" :indicators="true" :control="true" id="heroCarousel" class="mb-3" />

  <div class="container">
    <div class="row row-cols-1 row-cols-md-4">
        @foreach ($products as $data)
        <div class="col mb-4">
            <div class="card">
                <img src="{{ asset("storage/images/$data->post_image")}}" class="card-img-top" alt="{{$data->post_image}}">
                <div class="card-body">
                <h5 class="card-title"><a href="{{route('page.show-post', $data->post_link)}}">{{$data->post_title}}</a></h5>
                <p class="card-text">{{$data->post_excerpt}}</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
  </div>
</section>
@endsection
