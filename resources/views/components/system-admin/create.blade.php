@extends('layouts.system-admin')

@section('title', $titlePage)

@section('content')
    <!-- TITLE -->
    @section('header_page')
        <h2 class="card-header px-0">
            @lang($headerPage)
        </h2>
    @show

    <div class="card-body px-0">
        @yield('message_content')

        {!! Form::open(['route' => $routeLink]) !!}
            @yield('form_content')

            {!! Form::submit(__('custom_label.save'), ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::button(__('custom_label.back'), ['class' => 'btn btn-danger btn-sm', 'onclick' => "history.back()"]) !!}
        {!! Form::close() !!}
    </div>

    @yield('footer_page')
@endsection
