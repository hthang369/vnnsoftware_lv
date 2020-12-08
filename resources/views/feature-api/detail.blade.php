@extends('layouts.system-admin')

@section('title', 'Feature api Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Feature api Details</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>Saved!</strong>
            </div>
        @endif
        <div class="card-body">
            {{--<div class="form-group">--}}
                {{--<strong>Feature:</strong>--}}
                {{--<label>{{$featureApi->feature}}</label>--}}
            {{--</div>--}}
            <div class="form-group">
                <strong>Api:</strong>
                <label>{{$featureApi->api}}</label>
            </div>
            <div class="form-group">
                <strong>Name:</strong>
                <label>{{$featureApi->name}}</label>
            </div>
            <a class="btn btn-danger ml-2" href="{{ route('feature-api.list') }}" role="button">Back</a>
        </div>
    </div>
@endsection
