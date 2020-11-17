@extends('layouts.system-admin')

@section('title', 'Chi tiết công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Business Plan</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td>Premium</td>
            <td>Full access</td>
            <td>
                <button type="button" class="btn btn-primary">Details</button>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Gold</td>
            <td>Half access</td>
            <td>
                <a class="btn btn-info" href="/system-admin/user-management/detail/{{$user->id}}" role="button">Detail</a>
                <a class="btn btn-primary" href="/system-admin/user-management/update/{{$user->id}}" role="button">Update</a>
                <a class="btn btn-danger" href="/system-admin/user-management/delete/{{$user->id}}" role="button">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection

