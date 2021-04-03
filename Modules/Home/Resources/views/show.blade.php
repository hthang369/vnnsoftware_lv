@extends('home::layouts.master')

@section('content')
<main id="main">
    <section id="about" class="about section-bg">
        <div class="section-title">
          <span>{{$post_title}}</span>
          <h2>{{$post_title}}</h2>
        </div>
      <div class="container">
        <div class="row content">
          {!! $post_content !!}
        </div>

      </div>
    </section>
</main>
@endsection
