@extends('home::layouts.master')

@section('content')
<main id="main">
    <x-section-box id="category" class="category" :title="$category_name">
        <x-portfolio :items="$post_list['data']" />
        {!! $post_list['pagination'] !!}
    </x-section-box>
</main>
@endsection
