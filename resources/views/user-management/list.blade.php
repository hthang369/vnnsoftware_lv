@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Role</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td>Lampart</td>
            <td>abc/123</td>
            <td>lampart@gmail</td>
            <td>11158796</td>
            <td>Premium</td>
            <td>
                <button type="button" class="btn btn-primary">Details</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Lampart</td>
            <td>abc/123</td>
            <td>lampart@gmail</td>
            <td>11158796</td>
            <td>system-admin</td>
            <td>
                <button type="button" class="btn btn-primary">Details</button>
            </td>
        </tr>
        </tbody>
    </table>
@endsection

