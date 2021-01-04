@extends('layouts.system-admin')

@section('title', 'Danh sách công ty')

@section('sidebar')
    @parent
@endsection

@section('content')
    <!-- SEARCH FORM -->
    <div class="mb-4 alert alert-secondary">
        <form method="POST" action="{{  route('Company.Search')  }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input value="{{ old('name') }}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Find name">
            </div>
            <button type="submit" class="btn btn-success">Search
                <i style="" class="fa fa-search"></i>
            </button>
            <!-- GET ALL BUTTON -->
            <a class="ml-3  my-2 btn btn-primary" href="/system-admin/company" role="button">+ @lang('custom_label.get_all')</a>
        </form>
    </div>
    <!-- TITLE -->
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.company')</h1>
    </div>
    <!-- ADD NEW BUTTON-->
    <a class="my-2 btn btn-primary" href="/system-admin/company/new" role="button">+ @lang('custom_label.add_new')</a>

    @if(session()->has('deleted'))
        <div class="alert alert-success">
            <strong>@lang('custom_message.deleted')</strong>
        </div>
    @endif
    @if(count($list) == 0)
        <div class="alert alert-warning">
            @lang('custom_message.no_item_found')
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-light">
                <thead>
                <tr>
                    <th scope="col">@lang('custom_label.index')</th>
                    <th scope="col">@lang('custom_label.name')
                        <a class="btn-cta-freequote" href="/system-admin/company/sort/name">
                            <i style="{{Route::currentRouteName() == 'Company.Sort.Name' ? 'color:blue;' : 'color:gray;'}}"
                                class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.email')
                        <a class="btn-cta-freequote" href="/system-admin/company/sort/email">
                            <i style="{{Route::currentRouteName() == 'Company.Sort.Email' ? 'color:blue;' : 'color:gray;'}}"
                                class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.phone')
                        <a class="btn-cta-freequote" href="/system-admin/company/sort/phone">
                            <i style="{{Route::currentRouteName() == 'Company.Sort.Phone' ? 'color:blue;' : 'color:gray;'}}"
                                class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.address')
                        <a class="btn-cta-freequote" href="/system-admin/company/sort/address">
                            <i style="{{Route::currentRouteName() == 'Company.Sort.Address' ? 'color:blue;' : 'color:gray;'}}"
                                class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.business_plan')
                        <a class="btn-cta-freequote" href="/system-admin/company/sort/business-plan">
                            <i style="{{Route::currentRouteName() == 'Company.Sort.Business Plan' ? 'color:blue;' : 'color:gray;'}}"
                                class="fa fa-sort"></i>
                        </a>
                    </th>
                    <th scope="col">@lang('custom_label.action') </th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $i => $company)
                    <tr>
                        <td>{{($list->currentPage() - 1) * $list->perPage() + ($i + 1)}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->phone}}</td>
                        <td>{{$company->address}}</td>
                        <td>{{$company->business_plan_name}}</td>
                        <td>
                            <a class="btn btn-info" href="/system-admin/company/detail/{{$company->id}}"
                               role="button">@lang('custom_label.detail')</a>
                            <a class="btn btn-primary" href="/system-admin/company/update/{{$company->id}}"
                               role="button">@lang('custom_label.update')</a>
                            <a onclick="return confirm('@lang('custom_message.confirm_delete')');"
                               class="btn btn-danger" href="/system-admin/company/delete/{{$company->id}}"
                               role="button">@lang('custom_label.delete')</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $list->links() }}
    @endif
@endsection

