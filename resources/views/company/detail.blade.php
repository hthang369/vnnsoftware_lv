@extends('layouts.system-admin')

@section('title', 'Company Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Company Details</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>@lang('custom_message.saved')</strong>
            </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <strong>Name:</strong>
                <label>{{$company->name}}</label>
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                <label>{{$company->email}}</label>
            </div>
            <div class="form-group">
                <strong>Phone:</strong>
                <label>{{$company->phone}}</label>
            </div>
            <div class="form-group">
                <strong>Address:</strong>
                <label>{{$company->address}}</label>
            </div>
            <div class="form-group">
                <strong>Business plan:</strong>
                <label>{{$company->business_plan->name}}</label>
            </div>
            <a class="btn btn-primary" href="/system-admin/company/update/{{$company->id}}" role="button">@lang('custom_label.update')</a>
            <a class="btn btn-danger ml-2" href="{{ route('company.list') }}" role="button">Back</a>
        </div>
    </div>
@endsection
