@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="news" class="news" :title="$category_name">
        @foreach($data_list as $data)
        <x-card :header="$data['category_name']">
            <x-card-group grids grid-cols="4" grid-md>
                @foreach($data['post_list'] as $post)
                    <x-card :title="$post['post_title']">
                    {{ $post['post_image'] }}
                    </x-card>
                @endforeach
            </x-card-group>
        </x-card>
        @endforeach

    </x-section-box>
</main>
@endsection
