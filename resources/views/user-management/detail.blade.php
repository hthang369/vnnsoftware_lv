@extends('layouts.system-admin')

@section('title', 'Chi tiết công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">User Details</h5>
        <div class="card-body">
            <div class="form-group">
                <strong>Name:</strong>
                <label>{{$user->name}}</label>
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                <label>{{$user->email}}</label>
            </div>
            <div class="form-group">
                <strong>Phone:</strong>
                <label>{{$user->phone}}</label>
            </div>
            <div class="form-group">
                <strong>Address:</strong>
                <label>{{$user->address}}</label>
            </div>
            <div class="form-group">
                <strong>Role:</strong>
                <label>{{$user->role_id}}</label>
            </div>
            <a class="btn btn-primary" href="/system-admin/user-management/update/{{$user->id}}" role="button">Update</a>
        </div>
    </div>
@endsection
