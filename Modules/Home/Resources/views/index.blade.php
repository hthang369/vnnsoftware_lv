@extends('home::layouts.master')

@section('content')
<section id="hero1">

  <x-carousel :items="$slides" :indicators="true" :control="true" id="heroCarousel" class="mb-3" />

  <div class="container">
      <x-portfolio :items="$products" />
  </div>
</section>
@endsection
