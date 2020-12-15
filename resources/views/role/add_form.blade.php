@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Role</h5>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group required">
                    <label>@lang('custom_label.name')</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="@lang('custom_label.name')"
                           name="name"
                           value="{{ old('name') }}"
                           autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('custom_label.role_rank')</label>
                    <input class="form-control @error('role_rank')
                        is-invalid @enderror" type="text"
                           placeholder="@lang('custom_label.role_rank')" name="role_rank"
                           value="{{ old('role_rank') }}"
                           autocomplete="role_rank">
                    @error('role_rank')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('custom_label.description')</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" type="text"
                              placeholder="@lang('custom_label.description')" name="description"
                              autocomplete="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                <a class="btn btn-danger ml-2" href="{{ route('role.list') }}" role="button">@lang('custom_label.cancel')</a>
            </form>
        </div>
    </div>
@endsection
