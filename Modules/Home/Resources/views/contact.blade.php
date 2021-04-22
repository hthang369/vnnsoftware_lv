@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="contact" class="contact" :title="$post_title">
        <div class="map">
            {!! $mapInfo !!}
        </div>

        <div class="info-wrap mt-5">
            <div class="row">
              <div class="col-lg-4 info">
                <x-fa icon="fa-map-marker" />
                <h4>Location:</h4>
                <p>{{ $webAddess }}</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <x-fa icon="fa-envelope-o" />
                <h4>Email:</h4>
                <p>{{ $webEmail }}</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <x-fa icon="fa-phone" />
                <h4>Call:</h4>
                <p>{{ $webPhone }}</p>
              </div>
            </div>
        </div>

        <x-form-base />
    </x-section-box>
</main>
@endsection
