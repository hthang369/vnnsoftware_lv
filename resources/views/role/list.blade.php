@extends('layouts.system-admin')

@section('title', 'Role')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.role')</h1>
    </div>
    <a class="my-2 btn btn-primary" href="/system-admin/role/new" role="button">+ @lang('custom_label.add_new')</a>
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
                    <th scope="col">@lang('custom_label.index')</th>
                    <th scope="col">@lang('custom_label.name')</th>
                    <th scope="col">@lang('custom_label.role_rank')</th>
                    <th scope="col">@lang('custom_label.description')</th>
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
                                @if($apiName->id == $role->id)
                                    <span class="badge badge-danger">{{$apiName->feature_api_name}}</span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a class="btn btn-info m-1" href="/system-admin/role/detail/{{$role->id}}" role="button">@lang('custom_label.detail')</a>
                            <a class="btn btn-primary m-1" href="/system-admin/role/update/{{$role->id}}" role="button">@lang('custom_label.update')</a>
                            <a class="btn btn-warning m-1" href="/system-admin/role-has-feature-api/set-permission/{{$role->id}}" role="button">@lang('custom_label.set_permission')</a>
                            <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                               class="btn btn-danger m-1"
                               href="/system-admin/role/delete/{{$role->id}}"
                               role="button">@lang('custom_label.delete')</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $list->links() }}
    @endif
@endsection

