@extends('layouts.system-admin')

@section('title', 'Business Plan details')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Business Plan</h5>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label>Business Plan name</label>
                    <input name="name" class="form-control"
                           value="{!! request()->id ? (old('name') ? old('name') : $businessPlan->name) : old('name')!!}"
                           placeholder="Business Plan name">
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
                    <label>Description</label>
                    <textarea name="description" class="form-control"
                              placeholder="Description">{!! request()->id
                                ? (old('description') ? old('description') : $businessPlan->description)
                                : old('description') !!}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger ml-2" href="{{ route('business-plan.list') }}" role="button">Cancel</a>
            </form>
        </div>
    </div>
@endsection
