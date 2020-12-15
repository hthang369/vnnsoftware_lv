@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.set_permission_for_role')</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>@lang('custom_message.saved')</strong>
            </div>
        @endif
        @if(session()->has('mess'))
            <div class="alert alert-danger">
                <strong>@lang('custom_message.inaccurate_data')</strong>
            </div>
        @endif
        @if(count($listFeatureApi) == 0)
            <div class="alert alert-warning">
                <strong>@lang('custom_message.alert_no_feature_api')</strong>
            </div>
            <a class="my-2 btn btn-primary" href="/system-admin/feature-api/new" role="button">+ @lang('custom_label.add_new') Feature api</a>
        @endif
        @if(count($listFeatureApi) > 0)
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <strong>@lang('custom_label.role'): </strong>
                        <label>{{$role->name}}</label>
                        <input type="hidden" name="role_id" value="{{$role->id}}">
                    </div>
                    @foreach($listFeatureApi as $i => $featureApi)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck{{$i}}" name="feature_api_name[]" value="{{$featureApi->name}}" {{in_array($featureApi->name, $arrayOldFeatureApi) ? 'checked' : ''}}>
                            <label class="form-check-label" for="exampleCheck{{$i}}">{{$featureApi->name}}</label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                    <a class="btn btn-danger ml-2" href="{{ route('role.list') }}" role="button">@lang('custom_label.cancel')</a>
                </form>
            </div>
        @endif
    </div>
@endsection
