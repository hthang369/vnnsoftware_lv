@extends('layouts.system-admin')

@section('title', 'Chi tiết công ty')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Company Details</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <strong>Company name:</strong>
                    <label>{{$company->name}}</label>
                </div>
                <div class="form-group">
                    <strong>Business plan:</strong>
                    <label>{{$company->business_plan_id}}</label>
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <label>{{$company->email}}</label>
                </div>
                <div class="form-group">
                    <strong>Address:</strong>
                    <label>{{$company->address}}</label>
                </div>
                <div class="form-group">
                    <strong>Phone:</strong>
                    <label>{{$company->phone}}</label>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
