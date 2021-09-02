@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="news" class="news" :title="$category_name">
        <ul class="list-unstyled">
            @foreach($post_list['data'] as $post)
                <x-media tag="li" class="mb-3">
                    <x-slot name="object">
                        @php($post_image = $post['post_image'])
                        <x-image :src='asset("storage/images/$post_image")' :alt="$post_image" width="200" class="mr-3" />
                    </x-slot>

                    <h5><a href="{{ route('page.show-detail', $post['post_link']) }}">{{ $post['post_title'] }}</a></h5>
                    <p>{{ $post['post_excerpt'] }}</p>
                </x-media>
            @endforeach
        </ul>
        <x-pagination :total="$post_list['total']" :current="$post_list['current_page']" :pages="$post_list['last_page']" />
    </x-section-box>
</main>
@endsection
