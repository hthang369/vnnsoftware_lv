@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.user')</h1>
    </div>
    <!-- SEARCH FORM -->
    <p>
        <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
           aria-controls="collapseExample">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
            Open Search form
        </a>
    </p>
    <div id="collapseExample"
         class="collapse mb-4 alert alert-secondary">
        <form method="GET">
            <input type="hidden" name="search" value="true">
            <div class="form-group">
                <label>Name</label>
                <input value="{{ request()->name }}" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input value="{{ request()->email }}" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input value="{{ request()->phone }}" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input value="{{ request()->address }}" name="address" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Search
                <i class="fa fa-search"></i>
            </button>
            <!-- GET ALL BUTTON -->
            <a class="ml-3  my-2 btn  btn-secondary" href="/system-admin/user-management/list" role="button">
                <i class="fa fa-list" aria-hidden="true"></i>
                @lang('custom_label.get_all')
            </a>
        </form>
    </div>


    <strong>Total: </strong><label>{{$list->total()}}</label>
    <strong>Page: </strong><label>{{$list->currentPage() . '/' . $list->lastPage()}}</label>
    @if(count($list) == 0)
        <div class="alert alert-warning">
            @lang('custom_message.no_item_found')
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-light">
                <thead>
                <tr>
                    <th scope="col">@lang('custom_label.index')</th>
                    <th scope="col"> @lang('custom_label.name')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => request('sort') == 'name' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'name' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa {{ request('sort') != 'name' ? 'fa-sort' : (request('direction') == 'desc' ? 'fa-sort-down' : 'fa-sort-up')}}">
                            </i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.email')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'email', 'direction' => request('sort') == 'email' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'email' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa {{ request('sort') != 'email' ? 'fa-sort' : (request('direction') == 'desc' ? 'fa-sort-down' : 'fa-sort-up')}}">
                            </i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.phone')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'phone', 'direction' => request('sort') == 'phone' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'phone' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa {{ request('sort') != 'phone' ? 'fa-sort' : (request('direction') == 'desc' ? 'fa-sort-down' : 'fa-sort-up')}}">
                            </i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.address')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'address', 'direction' => request('sort') == 'address' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'address' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa {{ request('sort') != 'address' ? 'fa-sort' : (request('direction') == 'desc' ? 'fa-sort-down' : 'fa-sort-up')}}">
                            </i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.role')</th>
                    <th scope="col">@lang('custom_label.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $i => $user)
                    <tr>
                        <th>{{($list->currentPage() - 1) * $list->perPage() + ($i + 1)}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge badge-danger">{{$role->name}}</span>
                            @endforeach
                        </td>
                        <td>
                            @if(!in_array('LMT user manage.LMT user info (detail)', $NOT_HAS_PERMISSION))
                                <a class="btn btn-info" href="/system-admin/user-management/detail/{{$user->id}}" role="button">@lang('custom_label.detail')</a>
                            @endif
                            @if(!in_array('LMT user manage.Update', $NOT_HAS_PERMISSION))
                                <a class="btn btn-primary" href="/system-admin/user-management/update/{{$user->id}}" role="button">@lang('custom_label.update')</a>
                            @endif
                            @if(!in_array('LMT user manage.LMT user delete', $NOT_HAS_PERMISSION))
                                <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                                   class="btn btn-danger"
                                   href="/system-admin/user-management/delete/{{$user->id}}"
                                   role="button">@lang('custom_label.delete')</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $list->appends(request()->input())->links() }}
        @endif
        </div>
@endsection

