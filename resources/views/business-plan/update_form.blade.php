@extends('layouts.system-admin')

@section('title', 'Business Plan details')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.business_plan')</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('business-plan.update', $businessPlan->id)}} ">
                @csrf
                <div class="form-group">
                    <label>@lang('custom_label.name')</label>
                    <input name="name" value="{{ old('name', $businessPlan->name) }}"
                           class="form-control @error('name') is-invalid @enderror" placeholder="@lang('custom_label.name')">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Maximum storage</label>
                    <input name="maximum_storage_file" value="{{ old('maximum_storage_file', $businessPlan->maximum_storage_file) }}"
                           class="@error('maximum_storage_file') is-invalid @enderror form-control" placeholder="Maxium storage">
                    @error('maximum_storage_file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('custom_label.description')</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" type="text"
                              placeholder="@lang('custom_label.description')" name="description"
                              autocomplete="description">{{ old('description', $businessPlan->description) }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">@lang('custom_label.update')</button>
                <a class="btn btn-danger ml-2" href="{{ route('business-plan.list') }}" role="button">@lang('custom_label.cancel')</a>
            </form>
        </div>
    </div>
@endsection
