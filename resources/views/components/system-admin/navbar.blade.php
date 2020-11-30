<nav style="background-color: #6351ce;" class="navbar navbar-expand-lg ">
    <img style="width:5rem;" src="{{ URL::to('/') }}/images/logo-official.png">

    <a class="text-light navbar-brand" href="{{ URL::to('/system-admin/company') }}"> Management Tool</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <a class="ml-auto text-light d-flex" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>
