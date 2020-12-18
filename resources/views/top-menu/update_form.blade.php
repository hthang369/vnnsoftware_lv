@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.top_menu')</h5>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group required">
                    <label>@lang('custom_label.name')</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="@lang('custom_label.name')"
                           name="name"
                           value="{{ old('name', $topMenu->name) }}"
                           autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('custom_label.index_menu')</label>
                    <input class="form-control @error('index')
                            is-invalid @enderror" type="text"
                           placeholder="@lang('custom_label.index_menu')" name="index"
                           value="{{ old('index', $topMenu->index )}}"
                           autocomplete="index">
                    @error('index')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('custom_label.url')</label>
                    <input class="form-control @error('url')
                            is-invalid @enderror" type="text"
                           placeholder="@lang('custom_label.url')" name="url"
                           value="{{ old('url', $topMenu->url )}}"
                           autocomplete="url">
                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('custom_label.lang')</label>
                    <input class="form-control @error('lang') is-invalid @enderror" type="text" placeholder="@lang('custom_label.lang')"
                           name="lang"
                           value="{{ old('lang', $topMenu->lang) }}"
                           autocomplete="lang">
                    @error('lang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                <a class="btn btn-danger ml-2" href="{{ route('top-menu.list') }}" role="button">@lang('custom_label.cancel')</a>
            </form>
        </div>
    </div>
@endsection
