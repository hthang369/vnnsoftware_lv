<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('header_title', $webName)</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset("storage/images/$webFavicon") }}">
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

        {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    </head>
    <body>
        <section class="container-fluid">
            @include('home::partial.header')

            @yield('content')

            @include('home::partial.right')

            @include('home::partial.footer')
        </section>
    </body>
</html>
