@extends('layouts.system-admin')

@section('title', 'Top Menu Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.left_menu_detail')</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>@lang('custom_message.saved')</strong>
            </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <strong>@lang('custom_label.name'):</strong>
                <label>{{$leftMenu->name}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.top_menu'):</strong>
                <label>{{$leftMenu->topMenu->name}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.index_menu'):</strong>
                <label>{{$leftMenu->index}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.url'):</strong>
                <label>{{$leftMenu->url}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.lang'):</strong>
                <label>{{$leftMenu->lang}}</label>
            </div>
            <a class="btn btn-primary" href="/system-admin/left-menu/update/{{$leftMenu->id}}" role="button">@lang('custom_label.update')</a>
            <a class="btn btn-danger ml-2" href="{{ route('left-menu.list') }}" role="button">@lang('custom_label.back')</a>
        </div>
    </div>
@endsection
