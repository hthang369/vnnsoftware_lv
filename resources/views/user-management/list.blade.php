@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.user')</h1>
    </div>

    <a class="my-2 btn btn-primary" href="/system-admin/user-management/new" role="button">+ @lang('custom_label.add_new')</a>
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
                    <th scope="col">@lang('custom_label.email')</th>
                    <th scope="col">@lang('custom_label.phone')</th>
                    <th scope="col">@lang('custom_label.address')</th>
                    <th scope="col">@lang('custom_label.role')</th>
                    <th scope="col">@lang('custom_label.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $i => $user)
                    <tr>
                        <td>{{$i + 1}}</td>
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
                            <a class="btn btn-info" href="/system-admin/user-management/detail/{{$user->id}}" role="button">@lang('custom_label.detail')</a>
                            <a class="btn btn-primary" href="/system-admin/user-management/update/{{$user->id}}" role="button">@lang('custom_label.update')</a>
                            <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                               class="btn btn-danger"
                               href="/system-admin/user-management/delete/{{$user->id}}"
                               role="button">@lang('custom_label.delete')</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
        </div>
@endsection

