@extends('layouts.system-admin')

@section('title', 'Trang chủ')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>

@endsection

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company</th>
            <th scope="col">Plan</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td>Lampart</td>
            <td>Business</td>
            <td>
                <button type="button" class="btn btn-primary">Details</button>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Wakka</td>
            <td>Premium</td>
            <td>
                <button type="button" class="btn btn-primary">Details</button>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
