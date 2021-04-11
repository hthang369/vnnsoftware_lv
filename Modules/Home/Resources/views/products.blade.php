@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="news" class="news" :title="$category_name">
        <x-card-group>
            @foreach($post_list as $post)
                <x-card title="">
                {{ $post['post_content'] }}
                </x-card>
            @endforeach
        </x-card-group>
    </x-section-box>
</main>
@endsection
