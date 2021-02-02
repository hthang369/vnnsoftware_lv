@extends('layouts.system-admin')

@section('title', 'Role')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.role')</h1>
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
                <label>@lang('custom_label.name')</label>
                <input value="{{ request()->name }}" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>@lang('custom_label.role_rank')</label>
                <input value="{{ request()->role_rank }}" name="role_rank" class="form-control">
            </div>
            <div class="form-group">
                <label>@lang('custom_label.description')</label>
                <input value="{{ request()->description }}" name="description" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Search
                <i class="fa fa-search"></i>
            </button>
            <!-- GET ALL BUTTON -->
            <a class="ml-3  my-2 btn  btn-secondary" href="/system-admin/user-management" role="button">
                <i class="fa fa-list" aria-hidden="true"></i>
                @lang('custom_label.get_all')
            </a>
        </form>
    </div>
    <strong>Total: </strong><label>{{$list->total()}}</label>
    <strong>Page: </strong><label>{{$list->currentPage() . '/' . $list->lastPage()}}</label>
    @if(session()->has('deleted'))
        <div class="alert alert-success">
            <strong>@lang('custom_message.deleted')</strong>
        </div>
    @endif
    @if(count($list) == 0)
        <div class="alert alert-warning">
            @lang('custom_message.no_item_found')
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-light">
                <thead>
                <tr>
                    <th scope="col">@lang('custom_label.index')
                    </th>
                    <th scope="col">@lang('custom_label.name')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => request('sort') == 'name' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'name' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa {{ request('sort') != 'name' ? 'fa-sort' : (request('direction') == 'desc' ? 'fa-sort-down' : 'fa-sort-up')}}">
                            </i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.role_rank')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'role_rank', 'direction' => request('sort') == 'role_rank' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'role_rank' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa {{ request('sort') != 'role_rank' ? 'fa-sort' : (request('direction') == 'desc' ? 'fa-sort-down' : 'fa-sort-up')}}">
                            </i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.description')
                        <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'description', 'direction' => request('sort') == 'description' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                            <i style="{{request()->sort == 'description' ? 'color:blue;' : 'color:gray;'}}"
                               class="fa {{ request('sort') != 'description' ? 'fa-sort' : (request('direction') == 'desc' ? 'fa-sort-down' : 'fa-sort-up')}}">
                            </i>
                        </a>
                    </th>
                    <th scope="col" colspan="3">@lang('custom_label.permission')</th>
                    <th scope="col">@lang('custom_label.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $i => $role)
                    <tr>
                        <td>{{($list->currentPage() - 1) * $list->perPage() + ($i + 1)}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->role_rank}}</td>
                        <td>{{$role->description}}</td>
                        <td colspan="3">
                            @foreach($listApiName as $apiName)
                                @if($apiName->role_id == $role->id)
                                    <span class="badge badge-danger">[{{$apiName->feature . '] ' . $apiName->name}}</span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a class="btn btn-info m-1" href="/system-admin/role/detail/{{$role->id}}" role="button">@lang('custom_label.detail')</a>
                            @if($role->name != config('constants.name.role_permission_name'))
                                @if(!in_array('LMT user manage.Update', $NOT_HAS_PERMISSION))
                                    <a class="btn btn-primary m-1" href="/system-admin/role/update/{{$role->id}}" role="button">@lang('custom_label.update')</a>
                                @endif
                                @if(!in_array('LMT role manage.Role setting', $NOT_HAS_PERMISSION))
                                    <a class="btn btn-warning m-1" href="/system-admin/role/set-permission/{{$role->id}}" role="button">@lang('custom_label.role_setting')</a>
                                @endif
                                @if(!in_array('LMT role manage.Role delete', $NOT_HAS_PERMISSION))
                                    <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                                       class="btn btn-danger m-1"
                                       href="/system-admin/role/delete/{{$role->id}}"
                                       role="button">@lang('custom_label.delete')</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $list->appends(request()->input())->links() }}
    @endif
@endsection

