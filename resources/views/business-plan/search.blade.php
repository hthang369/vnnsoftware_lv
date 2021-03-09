@extends('layouts.system-admin')

@section('title', 'Chi tiết công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.business_plan')</h1>
    </div>
    <!-- SEARCH FORM -->
    <div id="collapseExample"
         class="mb-4 alert alert-secondary">
        <form method="GET" action="/system-admin/business-plan/list">
            <input type="hidden" name="search" value="true">
            <div class="form-group">
                <label>@lang('custom_label.business_plan')</label>
                <input value="{{ request()->name }}" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>@lang('custom_label.description')</label>
                <input value="{{ request()->description }}" name="description" class="form-control"  >
            </div>
            <button type="submit" class="btn btn-success">Search
                <i class="fa fa-search"></i>
            </button>
            <!-- GET ALL BUTTON -->
            <a class="ml-3  my-2 btn  btn-secondary" href="/system-admin/business-plan" role="button">
                <i class="fa fa-list" aria-hidden="true"></i>
                @lang('custom_label.get_all')
            </a>
        </form>
    </div>
@endsection
