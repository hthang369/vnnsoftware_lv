@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(session()->has('deleted'))
        <div class="alert alert-success">
            <strong>Deleted!</strong>
        </div>
    @endif
    @if(session()->has('saved'))
        <div class="alert alert-success">
            <strong>Saved!</strong>
        </div>
    @endif
    @if(count($json) == 0)
        <div class="alert alert-warning">
            <strong>Sorry!</strong> No Item Found.
        </div>
    @else
        <div class="table-responsive-sm">
            <table class="table table-hover">
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
                @foreach($json as $i => $item)
                    <tr>
                        <td>{{$i + 1}}</td>
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['request_approval_status']}}</td>
                        <td>{{Carbon\Carbon::createFromTimestamp($item['request_approval_timestamp'])->toDateTimeString()}}</td>
                        <td>
                            <a class="btn btn-info m-1" href="/system-admin/approval-api-token/approval-token/{{$item['id']}}" role="button">Approval token</a>
                            <a class="btn btn-primary m-1" href="/system-admin/approval-api-token/stop-token/{{$item['id']}}" role="button">Stop token</a>
                            <a class="btn btn-danger m-1" href="/system-admin/approval-api-token/delete-token/{{$item['id']}}" role="button">Delete token</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

