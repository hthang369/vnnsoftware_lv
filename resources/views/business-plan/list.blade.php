@extends('layouts.system-admin')

@section('title', 'Chi tiết công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <a class="m-2 btn btn-primary" href="/system-admin/business-plan/new" role="button">+ Add New</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped bg-light">
            <thead>
            <tr>
                <th scope="col">@lang('custom_label.index')</th>
                <th scope="col">@lang('custom_label.business_plan')</th>
                <th scope="col">@lang('custom_label.description')</th>
                <th scope="col">@lang('custom_label.action')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($businessPlans as $key => $bp)
                <tr>
                    <td></td>
                    <td>{{$bp->name}}</td>
                    <td>{{$bp->description}}</td>
                    <td>
                        <a class="btn btn-info" href="/system-admin/business-plan/detail/{{$bp->id}}" role="button">Detail</a>
                        <a class="btn btn-primary" href="/system-admin/business-plan/update/{{$bp->id}}" role="button">Update</a>
                        <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                           class="btn btn-danger"
                           href="/system-admin/business-plan/delete/{{$bp->id}}" role="button">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

