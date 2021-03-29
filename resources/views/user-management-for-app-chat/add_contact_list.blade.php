@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.laka_user_update_contact')</h1>
    </div>

    <!-- SEARCH FORM -->
     <p>
         <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
             <i class="fa fa-chevron-down" aria-hidden="true"></i>
             Search form
         </a>
     </p>
     <div id="collapseExample"
          class="show mb-4 alert alert-secondary">
         <form method="GET">
             <input type="hidden" name="search" value="true">
             <div class="form-group">
                 <label>@lang('custom_label.name')</label>
                 <input value="{{ request()->name }}" name="name" class="form-control">
             </div>
             <div class="form-group">
                 <label>@lang('custom_label.email')</label>
                 <input value="{{ request()->name }}" name="email" class="form-control">
             </div>
             <div class="form-group">
                 <label>@lang('custom_label.phone')</label>
                 <input value="{{ request()->name }}" name="phone" class="form-control">
             </div>
             <div class="form-group">
                 <label>@lang('custom_label.address')</label>
                 <input value="{{ request()->name }}" name="address" class="form-control">
             </div>
             <div class="form-group">
                 <label>@lang('custom_label.company')</label>
                 <input value="{{ request()->name }}" name="company" class="form-control">
             </div>
             <!-- SEARCH BUTTON -->
             <button type="submit" class="btn btn-success">Search
                 <i class="fa fa-search"></i>
             </button>
             <!-- GET ALL BUTTON -->
             <a class="ml-3  my-2 btn  btn-secondary" href="/system-admin/user-management/list" role="button">
                 <i class="fa fa-list" aria-hidden="true"></i>
                 @lang('custom_label.get_all')
             </a>
         </form>
     </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped bg-light">
            <thead>
            <tr>
                <th scope="col">@lang('custom_label.index')</th>
                <th scope="col">@lang('custom_label.name')</th>
                <th scope="col">@lang('custom_label.email')</th>
                <th scope="col">@lang('custom_label.phone')</th>
                <th scope="col">@lang('custom_label.address')</th>
                <th scope="col">@lang('custom_label.company')</th>
                <th scope="col">@lang('custom_label.action')</th>
            </tr>
            </thead>
            <tbody>

            @foreach($list as $i => $lakaUser)
            <tr>
                <td>{{$i + 1}}</td>
                <td>{{$lakaUser->name}}</td>
                <td>{{$lakaUser->email}}</td>
                <td>{{$lakaUser->phone}}</td>
                <td>{{$lakaUser->address}}</td>
                <td>{{$companyNames[$i]}}</td>
                <td>
                    <a href="/system-admin/user-management-for-app-chat/add-contact/update/{{$lakaUser->id}}"
                       class="btn btn-info"
                       role="button">@lang('custom_label.update')</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
