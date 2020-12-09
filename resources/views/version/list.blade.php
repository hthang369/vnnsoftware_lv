@extends('layouts.system-admin')

@section('title', 'Danh sách version')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.version')</h1>
    </div>
    <div class="mt-5">
        @if($versions['socket_version'] == null)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> No Socket Version Found.
            </div>
        @else
            <div><span class="badge badge-success">@lang('custom_label.socket_version') </span> {{$versions['socket_version']}}</div>
        @endif

        @if($versions['backend_version'] == null)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> No Backend Version Found.
            </div>
        @else
            <div><span class="badge badge-success">@lang('custom_label.backend_version')</span> {{$versions['backend_version']}} </div>
        @endif

        @if($versions['frontend_version'] == null)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> No Fronted Version Found.
            </div>
        @else
            <div><span class="badge badge-success">@lang('custom_label.frontend_version') </span> {{$versions['frontend_version']}} </div>
        @endif

        @if($versions['api_version'] == null)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> No Api Version Found.
            </div>
        @else
            <span class="badge badge-success">@lang('custom_label.api_version')</span>      {{$versions['api_version']}}
        @endif
    </div>

@endsection

