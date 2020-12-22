@extends('layouts.system-admin')

@section('title', 'Top Menu Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.top_menu_detail')</h5>
        @if(session()->has('saved'))
            <div class="alert alert-success">
                <strong>@lang('custom_message.saved')</strong>
            </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <strong>@lang('custom_label.name'):</strong>
                <label>{{$topMenu->name}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.index_menu'):</strong>
                <label>{{$topMenu->index}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.url'):</strong>
                <label>{{$topMenu->url}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.lang'):</strong>
                <label>{{$topMenu->lang}}</label>
            </div>
            <a class="btn btn-primary" href="/system-admin/top-menu/update/{{$topMenu->id}}" role="button">@lang('custom_label.update')</a>
            <a class="btn btn-danger ml-2" href="{{ route('top-menu.list') }}" role="button">@lang('custom_label.back')</a>
        </div>
    </div>
@endsection
