@extends('layouts.system-admin')

@section('title', 'User Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.user_detail')</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>@lang('custom_message.saved')</strong>
            </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <strong>@lang('custom_label.name'):</strong>
                <label>{{$user->name}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.email'):</strong>
                <label>{{$user->email}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.phone'):</strong>
                <label>{{$user->phone}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.address'):</strong>
                <label>{{$user->address}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.role'):</strong>
                @foreach($user->roles as $role)
                    <span class="badge badge-danger">{{$role->name}}</span>
                @endforeach
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.status'):</strong>
                <label>{{$user->status == 0 ? 'Inactive' : 'Active'}}</label>
            </div>
            @if(!in_array('LMT user manage.Update', $NOT_HAS_PERMISSION))
                <a class="btn btn-primary" href="/system-admin/user-management/update/{{$user->id}}" role="button">@lang('custom_label.update')</a>
            @endif
            <a class="btn btn-danger ml-2" href="/system-admin/user-management" role="button">@lang('custom_label.back')</a>
        </div>
    </div>
@endsection
