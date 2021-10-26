@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="about" class="about" :title="$post_title">
        {!! $post_content !!}
    </x-section-box>
</main>
@endsection
