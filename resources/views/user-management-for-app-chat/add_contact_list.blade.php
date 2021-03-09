@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.user_management_for_app_chat')</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped bg-light">
            <thead>
            <tr>
                <th scope="col">@lang('custom_label.index')</th>
                <th scope="col">@lang('custom_label.name')</th>
                <th scope="col">@lang('custom_label.email')</th>
                <th scope="col">@lang('custom_label.phone')</th>
                <th scope="col">@lang('custom_label.address')</th>
                <th scope="col">@lang('custom_label.company')</th>
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
                <td>{{$companyNames[$i]}}</td>
                <td>
                    <a href="/system-admin/user-management-for-app-chat/add-contact/update/{{$lakaUser->id}}"
                       class="btn btn-info"
                       role="button">Update</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
