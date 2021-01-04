<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="referrer" content="strict-origin"/>

    <title>Laka Management - @yield('title')</title>

    <!-- FONT AWESOME -->
{{--    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/3.2.1/assets/font-awesome/css/font-awesome.css">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

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

            /*clear: both;*/
            /*position: relative;*/
            /*height: 200px;*/
            /*margin-top: -200px;*/
            /*margin-top: -200px;*/

            position:fixed;
            bottom:0;
        }

        table {
            table-layout: fixed;
        }

        table th, table td {
            overflow: hidden;
        }

        .container-fluid{
            min-height: 2600px;
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
                    @if (session('messCommon'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('messCommon') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('errorCommon'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('errorCommon') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
