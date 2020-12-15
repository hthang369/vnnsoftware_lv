@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.approval_api_token')</h1>
    </div>
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
    @if(session()->has('error'))
        <div class="alert alert-success">
            <strong>System error!</strong>
        </div>
    @endif
    @if(count($data) == 0)
        <div class="alert alert-warning">
            @lang('custom_message.no_item_found')
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-light">
                <thead>
                <tr>
                    <th scope="col">@lang('custom_label.index')</th>
                    <th scope="col">@lang('custom_label.id')</th>
                    <th scope="col">@lang('custom_label.name')</th>
                    <th scope="col">@lang('custom_label.request_approval_status')</th>
                    <th scope="col">@lang('custom_label.request_approval_timestamp')</th>
                    <th scope="col">@lang('custom_label.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $i => $item)
                    <tr>
                        <td>{{$i + 1}}</td>
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$status[$item['request_approval_status']]}}</td>
                        <td>{{Carbon\Carbon::createFromTimestamp($item['request_approval_timestamp'])->toDateTimeString()}}</td>
                        <td>
                            @if($status[$item['request_approval_status']] == 'Not accepted')
                                <a class="btn btn-info m-1" href="/system-admin/approval-api-token/approval-token/{{$item['id']}}" role="button">@lang('custom_label.accept')</a>
                            @endif
                            @if($status[$item['request_approval_status']] == 'Accepted')
                                <a class="btn btn-primary m-1" href="/system-admin/approval-api-token/stop-token/{{$item['id']}}" role="button">@lang('custom_label.pause')</a>
                            @endif
                            @if($status[$item['request_approval_status']] == 'Paused')
                                <a class="btn btn-info m-1" href="/system-admin/approval-api-token/approval-token/{{$item['id']}}" role="button">@lang('custom_label.accept')</a>
                                {{--<a class="btn btn-primary m-1" href="/system-admin/approval-api-token/reopen-token/{{$item['id']}}" role="button">Reopen</a>--}}
                            @endif
                            <a class="btn btn-danger m-1" onclick="return confirm('@lang('custom_message.confirm_delete')');" href="/system-admin/approval-api-token/delete-token/{{$item['id']}}" role="button">@lang('custom_label.delete')</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
