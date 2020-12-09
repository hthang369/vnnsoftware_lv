@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(session()->has('deleted'))
        <div class="alert alert-success">
            <strong>Deleted!</strong>
        </div>
    @endif
    @if(session()->has('saved'))
        <div class="alert alert-success">
            <strong>Saved!</strong>
        </div>
    @endif
    @if( 0)
        <div class="alert alert-warning">
            <strong>Sorry!</strong> No Item Found.
        </div>
    @else
        <div class="table-responsive-sm">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Request approval status</th>
                    <th scope="col">Request approval timestamp</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>{{var_dump($json)}}
                {{--@foreach($json as $i => $company)--}}
                    {{--<tr>--}}
                        {{--<td>{{$i + 1}}</td>--}}
                        {{--<td>{{$company->name}}</td>--}}
                        {{--<td>{{$company->email}}</td>--}}
                        {{--<td>{{$company->phone}}</td>--}}
                        {{--<td>{{$company->address}}</td>--}}
                        {{--<td>{{$company->business_plan_name}}</td>--}}
                        {{--<td>--}}
                            {{--<a class="btn btn-info m-1" href="/system-admin/company/detail/{{$company->id}}" role="button">Detail</a>--}}
                            {{--<a class="btn btn-primary m-1" href="/system-admin/company/update/{{$company->id}}" role="button">Update</a>--}}
                            {{--<a class="btn btn-danger m-1" href="/system-admin/company/delete/{{$company->id}}" role="button">Delete</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                </tbody>
            </table>
        </div>
    @endif
@endsection

