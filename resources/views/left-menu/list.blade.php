@extends('layouts.system-admin')

@section('title', '')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.left_menu')</h1>
    </div>
    <a class="my-2 btn btn-primary" href="/system-admin/left-menu/new" role="button">+ @lang('custom_label.add_new')</a>
    @if(session()->has('deleted'))
        <div class="alert alert-success">
            <strong>@lang('custom_message.deleted')</strong>
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
                    <th scope="col">@lang('custom_label.name')</th>
                    <th scope="col">@lang('custom_label.top_menu')</th>
                    <th scope="col">@lang('custom_label.index_menu')</th>
                    <th scope="col">@lang('custom_label.url')</th>
                    <th scope="col">@lang('custom_label.lang')</th>
                    <th scope="col">@lang('custom_label.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $i => $leftMenu)
                    <tr>
                        <td>{{($list->currentPage() - 1) * $list->perPage() + ($i + 1)}}</td>
                        <td>{{$leftMenu->name}}</td>
                        <td>{{$leftMenu->top_menu_name}}</td>
                        <td>{{$leftMenu->index}}</td>
                        <td>{{$leftMenu->url}}</td>
                        <td>{{$leftMenu->lang}}</td>
                        <td>
                            <a class="btn btn-info" href="/system-admin/left-menu/detail/{{$leftMenu->id}}" role="button">@lang('custom_label.detail')</a>
                            <a class="btn btn-primary" href="/system-admin/left-menu/update/{{$leftMenu->id}}" role="button">@lang('custom_label.update')</a>
                            <a onclick="return confirm('@lang('custom_message.confirm_delete')');" class="btn btn-danger" href="/system-admin/left-menu/delete/{{$leftMenu->id}}" role="button">@lang('custom_label.delete')</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $list->links() }}
    @endif
@endsection

