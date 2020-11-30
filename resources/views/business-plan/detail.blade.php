@extends('layouts.system-admin')

@section('title', 'Business Plan details')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Business Plan Details</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>Saved!</strong>
            </div>
        @endif
        <div class="card-body">
            <form>
                <div class="form-group">
                    <strong>Business Plan name:</strong>
                    <label>{{$businessPlan->name}}</label>
                </div>
                <div class="form-group">
                    <strong>Business plan:</strong>
                    <label>{{$businessPlan->description}}</label>
                </div>
                <div class="form-group">
                    <strong>Maximum storage file:</strong>
                    <label>{{$businessPlan->maximum_storage_file}}</label>
                </div>
                <a class="btn btn-primary" href="/system-admin/business-plan/update/{{$businessPlan->id}}" role="button">Update</a>
            </form>
        </div>
    </div>
@endsection
