<nav style="background-color: #6351ce;" class="navbar navbar-expand-lg ">
    <img style="width:5rem;" src="{{ URL::to('/') }}/images/logo.png">
    <a class="text-light navbar-brand" href="{{ URL::to('/system-admin/company') }}">Laka Management Tool</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{--<form class="form-inline my-2 my-lg-0 ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="text-light btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>--}}
        <a class="text-light ml-auto" href="{{ URL::to('/logout') }}">Logout</a>
    </div>
</nav>
