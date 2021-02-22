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
    <p>
        <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
           aria-controls="collapseExample">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
            Open Search form
        </a>
    </p>
    <div id="collapseExample"
         class="collapse mb-4 alert alert-secondary">
        <form method="GET">
            <input type="hidden" name="search" value="true">
            <div class="form-group">
                <label>@lang('custom_label.business_plan')</label>
                <input value="{{ request()->name }}" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>@lang('custom_label.description')</label>
                <input value="{{ request()->description }}" name="description" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Search
                <i class="fa fa-search"></i>
            </button>
            <!-- GET ALL BUTTON -->
            <a class="ml-3  my-2 btn  btn-secondary" href="/system-admin/business-plan/list" role="button">
                <i class="fa fa-list" aria-hidden="true"></i>
                @lang('custom_label.get_all')
            </a>
        </form>
    </div>
    <strong>Total: </strong><label>{{$businessPlans->total()}}</label>
    <strong>Page: </strong><label>{{$businessPlans->currentPage() . '/' . $businessPlans->lastPage()}}</label>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped bg-light">
            <thead>
            <tr>
                <th scope="col">@lang('custom_label.index')</th>
                <th scope="col">@lang('custom_label.business_plan')
                    <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => request('sort') == 'name' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                        <i style="{{request()->sort == 'name' ? 'color:blue;' : 'color:gray;'}}"
                           class="fa {{ request('sort') != 'name' ? 'fa-sort' : (request('direction') == 'desc' ? 'fa-sort-down' : 'fa-sort-up')}}">
                        </i>
                    </a>
                </th>
                <th scope="col">@lang('custom_label.description')
                    <a class="btn-cta-freequote" href="{{ request()->fullUrlWithQuery(['sort' => 'description', 'direction' => request('sort') == 'description' ? request('direction') == 'desc' ? 'asc' : 'desc' : 'asc']) }}">
                        <i style="{{request()->sort == 'description' ? 'color:blue;' : 'color:gray;'}}"
                           class="fa {{ request('sort') != 'description' ? 'fa-sort' : (request('direction') == 'desc' ? 'fa-sort-down' : 'fa-sort-up')}}">
                        </i>
                    </a>
                </th>
                <th scope="col">@lang('custom_label.action')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($businessPlans as $key => $bp)
                <tr>
                    <th>{{($businessPlans->currentPage() - 1) * $businessPlans->perPage() + ($key + 1)}}</th>
                    <td>{{$bp->name}}</td>
                    <td>{{$bp->description}}</td>
                    <td>
                        <a class="btn btn-info" href="/system-admin/business-plan/detail/{{$bp->id}}"
                           role="button">@lang('custom_label.detail')</a>
                        @if(!in_array('LAKA business plan.Update business plan info', $NOT_HAS_PERMISSION))
                            <a class="btn btn-primary" href="/system-admin/business-plan/update/{{$bp->id}}"
                               role="button">@lang('custom_label.update')</a>
                        @endif
                        @if(!in_array('LAKA business plan.Delete business plan', $NOT_HAS_PERMISSION))
                            <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                               class="btn btn-danger"
                               href="/system-admin/business-plan/delete/{{$bp->id}}"
                               role="button">@lang('custom_label.delete')</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $businessPlans->appends(request()->input())->links() }}
@endsection

