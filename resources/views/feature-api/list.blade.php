@extends('layouts.system-admin')

@section('title', 'Feature api')

@section('sidebar')
    @parent
@endsection

@section('content')
    <a class="m-2 btn btn-primary" href="/system-admin/feature-api/new" role="button">+ Add New</a>
    @if(count($list) == 0)
        <div class="alert alert-warning">
            <strong>Sorry!</strong> No Item Found.
        </div>
    @else

        <table class="table table-hover" style="table-layout: fixed; word-break: break-word">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Feature</th>
                <th scope="col">Api</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $i => $featureApi)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>{{$featureApi->feature}}</td>
                    <td>{{$featureApi->api}}</td>
                    <td>
                        <a class="btn btn-info" href="/system-admin/feature-api/detail/{{$featureApi->id}}" role="button">Detail</a>
                        <a class="btn btn-primary" href="/system-admin/feature-api/update/{{$featureApi->id}}" role="button">Update</a>
                        <a onclick="return confirm('Are you sure you want to delete?');"
                           class="btn btn-danger"
                           href="/system-admin/feature-api/delete/{{$featureApi->id}}"
                           role="button">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

