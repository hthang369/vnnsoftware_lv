@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.company')</h1>
    </div>
    <a class="m-2 btn btn-primary" href="/system-admin/company/new" role="button">+ Add New</a>
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

        <table class="table table-hover" style="table-layout: fixed; word-break: break-word">
            <thead>
            <tr>
                <th scope="col">@lang('custom_label.index')</th>
                <th scope="col">@lang('custom_label.name')</th>
                <th scope="col">@lang('custom_label.email')</th>
                <th scope="col">@lang('custom_label.phone')</th>
                <th scope="col">@lang('custom_label.address')</th>
                <th scope="col">@lang('custom_label.business_plan')</th>
                <th scope="col">@lang('custom_label.action')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $i => $company)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->phone}}</td>
                    <td>{{$company->address}}</td>
                    <td>{{$company->business_plan_name}}</td>
                    <td>
                        <a class="btn btn-info" href="/system-admin/company/detail/{{$company->id}}" role="button">Detail</a>
                        <a class="btn btn-primary" href="/system-admin/company/update/{{$company->id}}" role="button">Update</a>
                        <a onclick="return confirm('Are you sure you want to delete this company?');" class="btn btn-danger" href="/system-admin/company/delete/{{$company->id}}" role="button">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

