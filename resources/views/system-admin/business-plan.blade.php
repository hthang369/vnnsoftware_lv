@extends('layouts.system-admin')

@section('title', 'Chi tiết công ty')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>

@endsection

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Business Plan</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
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
                <button type="button" class="btn btn-primary">Details</button>
            </td>
        </tr>
        </tbody>
    </table>
@endsection

