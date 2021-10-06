<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('home::partial.google')
        <title>@yield('header_title', $webName)</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset("storage/images/$webFavicon") }}">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        @stack('script_gg')
    </head>
    <body>
        @stack('no_script')

        <section class="container-fluid">
            @include('home::partial.header')

            @yield('content')

            @include('home::partial.right')

            @include('home::partial.footer')

            @include('home::partial.back_to_top')
        </section>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
