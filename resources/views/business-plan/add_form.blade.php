@extends('layouts.system-admin')

@section('title', 'Business Plan details')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.business_plan')</h5>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label class="required">@lang('custom_label.name')</label>
                    <input name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="@lang('custom_label.name')">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="required">Maximum storage</label>
                    <input name="maximum_storage_file" class="form-control @error('maximum_storage_file') is-invalid @enderror"
                           value="{{ old('maximum_storage_file') }}"
                           placeholder="Maxium storage">
                    @error('maximum_storage_file')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="required">@lang('custom_label.description')</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              placeholder="@lang('custom_label.description')">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                <a class="btn btn-danger ml-2" onclick="history.back()" role="button">@lang('custom_label.back')</a>
            </form>
        </div>
    </div>
@endsection
