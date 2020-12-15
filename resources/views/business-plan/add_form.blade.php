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
                    <label>@lang('custom_label.name')</label>
                    <input name="name" class="form-control"
                           value="{!! request()->id ? (old('name') ? old('name') : $businessPlan->name) : old('name')!!}"
                           placeholder="@lang('custom_label.name')">
                </div>
                <div class="form-group">
                    <label>Maximum storage</label>
                    <input name="maximum_storage_file" class="form-control"
                           value="{!! request()->id
                                ? (old('maximum_storage_file') ? old('maximum_storage_file') : $businessPlan->maximum_storage_file)
                                : old('maximum_storage_file')!!}"
                           placeholder="Maxium storage">
                </div>
                <div class="form-group">
                    <label>@lang('custom_label.description')</label>
                    <textarea name="description" class="form-control"
                              placeholder="@lang('custom_label.description')">{!! request()->id
                                ? (old('description') ? old('description') : $businessPlan->description)
                                : old('description') !!}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                <a class="btn btn-danger ml-2" href="{{ route('business-plan.list') }}" role="button">@lang('custom_label.cancel')</a>
            </form>
        </div>
    </div>
@endsection
