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
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="rowchkall">
                        <label class="form-check-label" for="rowchkall">@lang('custom_label.check_all')</label>
                    </div>
                    @foreach($listFeatureApi as $i => $featureApi)
                        @if(($listFeatureApi[$i - 1]->feature ?? 'null') != $featureApi->feature)
                            <div class="border border-secondary bg-light p-2 rounded">
                                <div class="m-2">
                                    <strong>{{$featureApi->feature}}</strong><br>
                                    @endif
                                    <div class="form-check ml-3">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck{{$i}}" name="feature_api_id[]" value="{{$featureApi->id}}" {{in_array($featureApi->id, $arrayOldFeatureApi) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="exampleCheck{{$i}}">{{$featureApi->name}}</label>
                                    </div>
                                    @if(($listFeatureApi[$i + 1]->feature ?? 'null') != $featureApi->feature)
                                </div>
                            </div>
                            <hr>
                        @endif
                    @endforeach
                    <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                    <a class="btn btn-danger ml-2" href="/system-admin/role" role="button">@lang('custom_label.cancel')</a>
                </form>
            </div>
            <script>
                $("#rowchkall").change(function () {
                    $("input[type=checkbox]").each(function () {
                        $(this).attr('checked', $("#rowchkall").is(':checked'));
                    });
                });
            </script>
        @endif
    </div>
@endsection
