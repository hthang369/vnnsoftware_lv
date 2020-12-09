<div class="list-group ">
    <a href="#" class="list-group-item list-group-item-action ">Dashboard</a>
    <a href="{{route('company.list')}}" class="{{ str_contains(Request::url(), '/company') ? 'active' : '' }} list-group-item list-group-item-action  ">Company </a>
    <a href="{{route('business-plan.list')}}" class="{{ str_contains(Request::url(), '/business-plan') ? 'active' : '' }} list-group-item list-group-item-action  ">Business Plan </a>
    <a href="{{route('user-management.list')}}" class="{{ str_contains(Request::url(), '/user-management') ? 'active' : '' }} list-group-item list-group-item-action  ">User management</a>
    <a href="{{route('role.list')}}" class="{{ str_contains(Request::url(), '/role') ? 'active' : '' }} list-group-item list-group-item-action  ">Role</a>
    <a href="{{route('feature-api.list')}}" class="{{ str_contains(Request::url(), '/feature-api') ? 'active' : '' }} list-group-item list-group-item-action  ">Feature api</a>
    <a href="{{route('version.list')}}" class="{{ str_contains(Request::url(), '/version') ? 'active' : '' }} list-group-item list-group-item-action  ">Versions</a>
</div>
