
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laka Management - @yield('title')</title>
    <!-- CSS -->
    @section('bootstrap-css')
        @component('components.bootstrap-css')

        @endcomponent
    @show
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

    <!-- Dialog confirm delete -->
    @section('dialog_confirm_delete')
        @component('common.dialog_confirm_delete')

        @endcomponent
    @show

    <div class="container-fluid m-0 pl-0">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 pr-0">
                @section('sidebar')
                    @component('components.system-admin.sidebar')

                    @endcomponent
                @show
            </div>
            <!-- Main content -->
            <div class="col-lg-10 px-0">
                <div class="mt-2 container-fluid">
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

    <!-- Script -->
    @section('script')
        @component('components.bootstrap-script')

        @endcomponent
    @show

</div>

</body>
</html>
