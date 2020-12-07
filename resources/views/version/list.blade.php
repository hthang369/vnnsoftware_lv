@extends('layouts.system-admin')

@section('title', 'Danh sách version')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="mt-5">
        @if($versions['socket_version'] == null)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> No Socket Version Found.
            </div>
        @else
            <div><span class="badge badge-success">Socket Version </span> {{$versions['socket_version']}}</div>
        @endif

        @if($versions['backend_version'] == null)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> No Backend Version Found.
            </div>
        @else
            <div><span class="badge badge-success">Backend Version </span> {{$versions['backend_version']}} </div>
        @endif

        @if($versions['frontend_version'] == null)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> No Fronted Version Found.
            </div>
        @else
            <div><span class="badge badge-success">Fronted Version </span> {{$versions['frontend_version']}} </div>
        @endif

        @if($versions['api_version'] == null)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> No Api Version Found.
            </div>
        @else
            <span class="badge badge-success">Api Version </span>      {{$versions['api_version']}}
        @endif
    </div>
@endsection

