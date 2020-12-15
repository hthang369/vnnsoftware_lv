@extends('layouts.system-admin')

@section('title', 'Business Plan details')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Business Plan</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label>Business Plan name</label>
                    <input class="form-control" placeholder="Business Plan name">
                </div>
                <div class="form-group">
                    <label>Maximum storage</label>
                    <input class="form-control" placeholder="Maxium storage">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input class="form-control" placeholder="Description">
                </div>
                <button type="submit" class="btn btn-primary">@lang('custom_label.update')</button>
                <button type="button" class="btn btn-danger">@lang('custom_label.delete')</button>
            </form>
        </div>
    </div>
@endsection
