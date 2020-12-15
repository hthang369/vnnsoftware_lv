@extends('layouts.system-admin')

@section('title', 'Feature api')

@section('sidebar')
    @parent
@endsection

@section('dialog_confirm_delete')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.feature_api')</h1>
    </div>
    <a class="my-2 btn btn-outline-danger" onclick="return confirm('@lang('custom_message.feature_confirm_sync')');" href="/system-admin/feature-api/save-all-to-db" role="button">Sync with DB</a>
    @if(session()->has('deleted'))
        <div class="alert alert-success">
            <strong>@lang('custom_message.deleted')</strong>
        </div>
    @endif
    @if(session()->has('saved'))
        <div class="alert alert-success">
            <strong>@lang('custom_message.saved')</strong>
        </div>
    @endif
    @if(count($list) == 0)
        <div class="alert alert-warning">
            @lang('custom_message.no_item_found')
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-light">
                <thead>
                <tr>
                    <th scope="col">@lang('custom_label.index')</th>
                    <th scope="col">@lang('custom_label.api')</th>
                    <th scope="col">@lang('custom_label.name')</th>
                    <th scope="col">@lang('custom_label.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $i => $featureApi)
                    <tr>
                        <td>{{($i + 1)}}</td>
                        <td>{{$featureApi->api}}</td>
                        <td>{{$featureApi->name}}</td>
                        <td>
                            <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                               {{--<button onclick="return callAjaxCheckDelete({{$featureApi->id}});"--}}
                               type="button"
                               class="btn btn-danger m-1"
                               href="/system-admin/feature-api/delete/{{$featureApi->id}}"
                               role="button">@lang('custom_label.delete')
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{--<script>--}}
        {{--function callAjaxCheckDelete(id) {--}}
        {{--$(".custom-delete").click(function () {--}}
        {{--window.location.href = "{{Request::root()}}" + "/system-admin/feature-api/delete/" + id;--}}
        {{--});--}}

        {{--let mess = 'Are you sure you want to delete?';--}}
        {{--$.ajax({--}}
        {{--type: 'GET',--}}
        {{--async: false,--}}
        {{--url: '/system-admin/role-has-feature-api/ajax-check-is-used-feature-api/' + id,--}}
        {{--success: function (data) {--}}
        {{--if (data.isUsed) {--}}
        {{--mess = 'Data is in use, are you sure you want to delete it?';--}}
        {{--}--}}
        {{--$(".modal-body").text(mess);--}}
        {{--}--}}
        {{--}).done(function () {--}}
        {{--$('#exampleModal').modal('show');--}}
        {{--});--}}
        {{--}--}}
        {{--</script>--}}
    @endif
@endsection

