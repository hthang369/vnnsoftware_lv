@extends('home::layouts.master')

@section('content')
<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators">
            <li data-bs-target="#heroCarousel" data-slide-to="0" class="active" aria-current="true"></li>
            <li data-bs-target="#heroCarousel" data-slide-to="1" class=""></li>
            <li data-bs-target="#heroCarousel" data-slide-to="2" class=""></li>
        </ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="carousel-container">
              <img src="{{ asset('img/slide/slide-1.jpg')}}" class="d-block w-100"/>
            <div class="carousel-caption">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>MyBiz</span></h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="carousel-container">
            <img src="{{ asset('img/slide/slide-2.jpg')}}" class="d-block w-100"/>
            <div class="carousel-caption">
              <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
          <div class="carousel-container">
            <img src="{{ asset('img/slide/slide-3.jpg')}}" class="d-block w-100"/>
            <div class="carousel-caption">
              <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
              <p class="animate__animated animate__adeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section>
@endsection
