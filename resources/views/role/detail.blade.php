@extends('layouts.system-admin')

@section('title', 'Role Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.role_detail')</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>@lang('custom_message.saved')</strong>
            </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <strong>@lang('custom_label.name'):</strong>
                <label>{{$role->name}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.role_rank'):</strong>
                <label>{{$role->role_rank}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.permission'):</strong>
                @foreach($role->role_has_feature_api as $roleHasFeatureApi)
                    <span class="badge badge-danger">{{$roleHasFeatureApi->feature_api_id}}</span>
                @endforeach
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.description'):</strong>
                <label>{{$role->description}}</label>
            </div>
            <a class="btn btn-primary" href="/system-admin/role/update/{{$role->id}}" role="button">@lang('custom_label.update')</a>
            <a class="btn btn-danger ml-2" href="/system-admin/role" role="button">@lang('custom_label.back')</a>
        </div>
    </div>
@endsection
