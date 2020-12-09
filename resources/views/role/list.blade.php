@extends('layouts.system-admin')

@section('title', 'Role')

@section('sidebar')
    @parent
@endsection

@section('content')
    <a class="m-2 btn btn-primary" href="/system-admin/role/new" role="button">+ Add New</a>
    @if(session()->has('deleted'))
        <div class="alert alert-success">
            <strong>Deleted!</strong>
        </div>
    @endif
    @if(count($list) == 0)
        <div class="alert alert-warning">
            <strong>Sorry!</strong> No Item Found.
        </div>
    @else
        <div class="table-responsive-sm">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role rank</th>
                    <th scope="col">Description</th>
                    <th scope="col">Permission</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $i => $role)
                    <tr>
                        <td>{{$i + 1}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->role_rank}}</td>
                        <td>{{$role->description}}</td>
                        <td colspan="3">
                            @foreach($listApiName as $apiName)
                                @if($apiName->id == $role->id)
                                    <span class="badge badge-danger">{{$apiName->feature_api_name}}</span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a class="btn btn-info m-1" href="/system-admin/role/detail/{{$role->id}}" role="button">Detail</a>
                            <a class="btn btn-primary m-1" href="/system-admin/role/update/{{$role->id}}" role="button">Update</a>
                            <a class="btn btn-warning m-1" href="/system-admin/role-has-feature-api/set-permission/{{$role->id}}" role="button">Set permission</a>
                            <a onclick="return confirm('Are you sure you want to delete?');"
                               class="btn btn-danger m-1"
                               href="/system-admin/role/delete/{{$role->id}}"
                               role="button">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

