@extends('layouts.system-admin')

@section('title', __('custom_title.user_management_for_app_chat'))

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.user_management_for_app_chat')</h1>
    </div>
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
                    <th scope="col">@lang('custom_label.email')</th>
                    <th scope="col">@lang('custom_label.phone')</th>
                    <th scope="col">@lang('custom_label.address')</th>
                    <th scope="col">@lang('custom_label.business_plan')</th>
                    <th scope="col">@lang('custom_label.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $i => $lakaUser)
                    <tr>
                        <td>{{$i + 1}}</td>
                        <td>{{$lakaUser->name}}</td>
                        <td>{{$lakaUser->email}}</td>
                        <td>{{$lakaUser->phone}}</td>
                        <td>{{$lakaUser->address}}</td>
                        <td>{{$lakaUser->business_plan_name}}</td>
                        <td>
                            <a onclick="return confirm('@lang('custom_message.confirm_disable')');" class="btn btn-danger" href="/system-admin/user-management-for-app-chat/disable-user/{{$lakaUser->id}}" role="button">@lang('custom_label.disable')</a>
                        @if(in_array('LAKA user manage.LAKA disable user', $permission))
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

