@extends('layouts.system-admin')

@section('title', 'Business Plan details')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.business_plan_detail')</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>@lang('custom_message.saved')</strong>
            </div>
        @endif
        <div class="card-body">
            <form>
                <div class="form-group">
                    <strong>@lang('custom_label.name'):</strong>
                    <label>{{$businessPlan->name}}</label>
                </div>
                <div class="form-group">
                    <strong>@lang('custom_label.description'):</strong>
                    <label>{{$businessPlan->description}}</label>
                </div>
                <div class="form-group">
                    <strong>Maximum storage file:</strong>
                    <label>{{$businessPlan->maximum_storage_file}}</label>
                </div>
                <a class="btn btn-primary" href="/system-admin/business-plan/update/{{$businessPlan->id}}" role="button">@lang('custom_label.update')</a>
                <a class="btn btn-danger ml-2" href="/system-admin/business-plan" role="button">@lang('custom_label.back')</a>
            </form>
        </div>
    </div>
@endsection
