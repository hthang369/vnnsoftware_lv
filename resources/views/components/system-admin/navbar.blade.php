<nav style="background-color: #6351ce;" class="navbar navbar-expand-lg ">
    <img style="width:5rem;" src="{{ URL::to('/') }}/images/logo-official.png">

    <a class="text-light navbar-brand" href="{{ URL::to('/system-admin/company') }}"> Management Tool</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="d-flex flex-row-reverse bd-highlight collapse navbar-collapse " id="navbarSupportedContent">
        <div class="p-2 bd-highlight dropdown dropdown-menu-left">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User
            </button>
            <div class="dropdown-menu" aria-labelledby="">
                <a class="dropdown-item d-flex" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="dropdown-item" href="{{ route('user-management.update-password.form', Auth::user()->id) }}">Change password</a>
            </div>
        </div>
    </div>
</nav>
