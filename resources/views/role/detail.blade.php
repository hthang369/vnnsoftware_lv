@extends('layouts.system-admin')

@section('title', 'Role Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Role Details</h5>
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
                <strong>Description:</strong>
                <label>{{$role->description}}</label>
            </div>
            <a class="btn btn-primary" href="/system-admin/role/update/{{$role->id}}" role="button">Update</a>
        </div>
    </div>
@endsection