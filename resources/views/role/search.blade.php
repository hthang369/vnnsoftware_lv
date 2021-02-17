@extends('layouts.system-admin')

@section('title', 'Role')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.role')</h1>
    </div>
    <a class="my-2 btn btn-primary" href="/system-admin/role/new" role="button">+ @lang('custom_label.add_new')</a>
    <!-- SEARCH FORM -->
    <div id="collapseExample"
         class=" mb-4 alert alert-secondary">
        <form method="GET" action="/system-admin/role">
            <input type="hidden" name="search" value="true">
            <div class="form-group">
                <label>@lang('custom_label.name')</label>
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
            <a class="ml-3  my-2 btn  btn-secondary" href="/system-admin/user-management" role="button">
                <i class="fa fa-list" aria-hidden="true"></i>
                @lang('custom_label.get_all')
            </a>
        </form>
    </div>
@endsection

