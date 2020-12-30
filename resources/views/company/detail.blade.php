@extends('layouts.system-admin')

@section('title', 'Company Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.company_detail')</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>@lang('custom_message.saved')</strong>
            </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <strong>@lang('custom_label.name'):</strong>
                <label>{{$company->name}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.email'):</strong>
                <label>{{$company->email}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.phone'):</strong>
                <label>{{$company->phone}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.address'):</strong>
                <label>{{$company->address}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.business_plan'):</strong>
                <label>{{$company->business_plan->name}}</label>
            </div>
            {{--            @if(in_array('company.update.form', $permission))--}}
            {{--                <a class="btn btn-primary" href="/system-admin/company/update/{{$company->id}}" role="button">@lang('custom_label.update')</a>--}}
            {{--            @endif--}}
            <a class="btn btn-primary" href="/system-admin/company/update/{{$company->id}}"
               role="button">@lang('custom_label.update')</a>
            <a class="btn btn-danger ml-2" href="{{ route('Company.List') }}"
               role="button">@lang('custom_label.back')</a>
        </div>
    </div>
@endsection
