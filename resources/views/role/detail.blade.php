@extends('layouts.system-admin')

@section('title', 'Role Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Role Details</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>Saved!</strong>
            </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <strong>Name:</strong>
                <label>{{$role->name}}</label>
            </div>
            <div class="form-group">
                <strong>Role rank:</strong>
                <label>{{$role->role_rank}}</label>
            </div>
            <div class="form-group">
                <strong>Permission:</strong>
                @foreach($role->role_has_feature_api as $roleHasFeatureApi)
                    <span class="badge badge-danger">{{$roleHasFeatureApi->feature_api_name}}</span>
                @endforeach
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                <label>{{$role->description}}</label>
            </div>
            <a class="btn btn-primary" href="/system-admin/role/update/{{$role->id}}" role="button">Update</a>
            <a class="btn btn-danger ml-2" href="{{ route('role.list') }}" role="button">Back</a>
        </div>
    </div>
@endsection
