@extends('layouts.system-admin')

@section('title', 'Chi tiết công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.business_plan')</h1>
    </div>
    <a class="my-2 btn btn-primary" href="/system-admin/business-plan/new"
       role="button">+ @lang('custom_label.add_new')</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped bg-light">
            <thead>
            <tr>
                <th scope="col">@lang('custom_label.index')</th>
                <th scope="col">@lang('custom_label.business_plan')
                    <a class="btn-cta-freequote" href="/system-admin/business-plan/sort/name">
                        <i style="{{Route::currentRouteName() == 'Company.Sort.Name' ? 'color:blue;' : 'color:gray;'}}"
                           class="fas fa-sort">
                        </i>
                    </a>
                </th>
                <th scope="col">@lang('custom_label.description')
                    <a class="btn-cta-freequote" href="/system-admin/business-plan/sort/description">
                        <i style="{{Route::currentRouteName() == 'Company.Sort.Description' ? 'color:blue;' : 'color:gray;'}}"
                           class="fas fa-sort"> 
                        </i>
                    </a>
                </th>
                <th scope="col">@lang('custom_label.action')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($businessPlans as $key => $bp)
                <tr>
                    <td></td>
                    <td>  {{$bp->name}}  </td>
                    <td>{{$bp->description}}</td>
                    <td>
                        <a class="btn btn-info" href="/system-admin/business-plan/detail/{{$bp->id}}"
                           role="button">@lang('custom_label.detail')</a>
                        <a class="btn btn-primary" href="/system-admin/business-plan/update/{{$bp->id}}"
                           role="button">@lang('custom_label.update')</a>
                        <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                           class="btn btn-danger"
                           href="/system-admin/business-plan/delete/{{$bp->id}}"
                           role="button">@lang('custom_label.delete')</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

