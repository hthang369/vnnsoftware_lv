@extends('layouts.system-admin')

@section('title', 'Role')

@section('sidebar')
    @parent
@endsection

@section('content')
    <a class="m-2 btn btn-primary" href="/system-admin/role/new" role="button">+ Add New</a>
    @if(count($list) == 0)
        <div class="alert alert-warning">
            <strong>Sorry!</strong> No Item Found.
        </div>
    @else

        <table class="table table-hover" style="table-layout: fixed; word-break: break-word">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Role rank</th>
                <th scope="col">Description</th>
                <th scope="col">Feature</th>
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
                    <td>
                        @foreach($listFeature as $feature)
                            @if($feature->id == $role->id)
                                <span class="badge badge-danger">{{$feature->feature}}</span>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-info" href="/system-admin/role/detail/{{$role->id}}" role="button">Detail</a>
                        <a class="btn btn-primary" href="/system-admin/role/update/{{$role->id}}" role="button">Update</a>
                        <a class="btn btn-warning" href="/system-admin/role-has-feature-api/set-role/{{$role->id}}" role="button">Set role</a>
                        <a class="btn btn-danger" href="/system-admin/role/delete/{{$role->id}}" role="button">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

