@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <a class="m-2 btn btn-primary" href="/system-admin/user-management/new" role="button">+ Add New</a>
    @if(count($list) == 0)
        <div class="alert alert-warning">
            <strong>Sorry!</strong> No Item Found.
        </div>
    @else

        <table class="table table-hover" style="table-layout: fixed; word-break: break-word">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $i => $user)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge badge-danger">{{$role->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-info" href="/system-admin/user-management/detail/{{$user->id}}" role="button">Detail</a>
                        <a class="btn btn-primary" href="/system-admin/user-management/update/{{$user->id}}" role="button">Update</a>
                        <a class="btn btn-danger" href="/system-admin/user-management/delete/{{$user->id}}" role="button">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

