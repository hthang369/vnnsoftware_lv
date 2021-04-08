@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="news" class="news" :title="$post_title">
        <ul class="list-unstyled">
            @foreach($post_list as $post)
                <x-media tag="li">
                    <x-slot name="aside">
                        <x-img blank width="150" />
                    </x-slot>

                    <h4><a href="{{ route('page.show-post', $post['post_link']) }}">{{ $post['post_title'] }}</a></h4>
                    <p>{{ $post['post_excerpt'] }}</p>
                </x-media>
            @endforeach
        </ul>
    </x-section-box>
</main>
@endsection
