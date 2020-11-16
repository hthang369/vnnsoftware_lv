<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laka Management - @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Bootstrap script-->
    @component('components.script')
    <style>
        #page-container {
            position: relative;
            min-height: 100vh;
            display: block;
            overflow: auto;
        }

        .container {


            position: relative;
            min-height: 100vh;
            display: block;
            overflow: auto;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 2.5rem; /* Footer height */
        }
    </style>
</head>
<body>

<div id="page-container">
    <!-- Navbar -->
    @section('navbar')
        @component('components.system-admin.navbar')

        @endcomponent
    @show

    <div class="container-fluid m-0 pl-0">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                @section('sidebar')
                    @component('components.system-admin.sidebar')

                    @endcomponent
                @show
            </div>
            <!-- Main content -->
            <div class="col-lg-9">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @section('footer')
        @component('components.system-admin.footer')

        @endcomponent
    @show

</div>

</body>
</html>
