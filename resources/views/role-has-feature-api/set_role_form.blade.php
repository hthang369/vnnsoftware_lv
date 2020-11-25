@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Set feature api for role</h5>
        @if(count($listFeatureApi) == 0)
            <div class="alert alert-warning">
                <strong>Do not have Feature api, create Feature api first to create Role has feature api</strong>
            </div>
            <a class="m-2 btn btn-primary" href="/system-admin/feature-api/new" role="button">+ Add New Feature api</a>
        @endif
        @if(count($listFeatureApi) > 0)
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <strong>Role: </strong>
                        <label>{{$role->name}}</label>
                        <input type="hidden" name="role_id" value="{{$role->id}}">
                    </div>
                    @foreach($listFeatureApi as $i => $featureApi)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck{{$i}}" name="feature_api_id[]" value="{{$featureApi->id}}" {{in_array($featureApi->id, $arrayOldFeatureApi) ? 'checked' : ''}}>
                            <label class="form-check-label" for="exampleCheck{{$i}}">{{$featureApi->feature}}</label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-danger ml-2" href="{{ route('role.list') }}" role="button">Cancel</a>
                </form>
            </div>
        @endif
    </div>
@endsection
