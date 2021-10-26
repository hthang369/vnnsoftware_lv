<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{--CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', '@Master Layout'))</title>

       <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
       <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
       <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        @stack('styles')
    </head>
    <body class="sidebar-mini control-sidebar-slide-open dark-mode">
        <section class="wrapper">
            @include('admin::partial.header')

            @include('admin::partial.sidebar')

            @include('admin::partial.content')

            @include('admin::partial.footer')

            @include('bootstrap::components.modal.container')
        </section>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
        <script src="{{ asset('js/grid.js') }}"></script>
        @stack('scripts')
    </body>
</html>
