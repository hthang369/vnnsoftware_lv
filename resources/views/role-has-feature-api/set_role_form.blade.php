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
                    @php
                        $isAll = true;
                    @endphp
                    @foreach($listFeatureApi as $i => $featureApi)
                        @php
                            if (!in_array($featureApi->id, $arrayOldFeatureApi)) {
                                $isAll = false;
                            }
                        @endphp
                        @if(($listFeatureApi[$i - 1]->feature ?? 'null') != $featureApi->feature)
                            @php
                                $isAllGroup = true;
                            @endphp
                            <div class="border border-secondary bg-light p-2 rounded check-all">
                                <div class="m-2 {{strtolower(str_replace(" ","-",$featureApi->feature))}}">
                                    <strong>{{$featureApi->feature}}</strong><br>
                                    @endif
                                    @php
                                        if (!in_array($featureApi->id, $arrayOldFeatureApi)) {
                                            $isAllGroup = false;
                                        }
                                    @endphp
                                    <div class="form-check ml-3">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck{{$i}}" name="feature_api_id[]" value="{{$featureApi->id}}" {{in_array($featureApi->id, $arrayOldFeatureApi) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="exampleCheck{{$i}}">{{$featureApi->name}}</label>
                                    </div>
                                    @if(($listFeatureApi[$i + 1]->feature ?? 'null') != $featureApi->feature)
                                </div>
                                <div class="form-check">
                                    <input onchange="checkAll(this)" type="checkbox" class="form-check-input" id="check-all-feature-{{strtolower(str_replace(" ","-",$featureApi->feature))}}" data-feature="{{strtolower(str_replace(" ","-",$featureApi->feature))}}" {{$isAllGroup ? 'checked' : ''}}>
                                    <label class="form-check-label" for="check-all-feature-{{strtolower(str_replace(" ","-",$featureApi->feature))}}">@lang('custom_label.all')</label>
                                </div>
                            </div>
                            <hr>
                        @endif
                    @endforeach
                    <div class="form-check mb-2">
                        <input onchange="checkAll(this)" type="checkbox" class="form-check-input" id="check-all-feature-check-all" data-feature="check-all" {{$isAll ? 'checked' : ''}}>
                        <label class="form-check-label" for="check-all-feature-check-all">@lang('custom_label.check_all')</label>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                    <a class="btn btn-danger ml-2" href="/system-admin/role" role="button">@lang('custom_label.cancel')</a>
                </form>
            </div>
            <script>
                function checkAll(feature) {
                    feature = feature.getAttribute("data-feature");
                    $("." + feature + " input[type=checkbox]").each(function () {
                        $(this).attr('checked', $("#check-all-feature-" + feature).is(':checked'));
                    });
                }
            </script>
        @endif
    </div>
@endsection
