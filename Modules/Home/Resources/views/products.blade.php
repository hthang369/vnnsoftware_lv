@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="news" class="news" :title="$category_name">
        @foreach($data_list as $data)
        <x-card :header="$data['category_name']">
            <x-card-group size="md" size-cols="4">
                @foreach($data['post_list'] as $post)
                <div class="col mb-4">
                    <div class="card">
                        @php($post_image = $post['post_image'])
                        <x-image :src='asset("storage/images/$post_image")' class="card-img-top" :alt="$post_image" :lazyload="false" />
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('page.show-post', $post['post_link'])}}">{{$post['post_title']}}</a></h5>
                            <p class="card-text">{{$post['post_excerpt']}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </x-card-group>
        </x-card>
        @endforeach

    </x-section-box>
</main>
@endsection
