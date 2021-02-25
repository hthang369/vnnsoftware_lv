@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.user_management_for_app_chat')</h1>
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
                <th scope="col">Add</th>
                <th scope="col">@lang('custom_label.action')</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>1</td>
                <td>khoa</td>
                <td>khoa@gmail.com</td>
                <td>11111</td>
                <td>abv/12</td>
                <td>
                    <div class="form-group">
                        <select class="form-control"
                                name="business_plan_id"
                                value=" ">
                            <option disabled selected> </option>
                            @foreach($companies as $company)
                                <option
                                    value="{{$company->id}}">
                                    {{$company->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td>
                    <div class="pl-4">
                        <div class="form-group">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name=""
                                   value="">
                            <label class="form-check-label">Add all contacts</label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name=""
                                   value="">
                            <label class="form-check-label">Add to all rooms</label>
                        </div>
                    </div>
                </td>
                <td>
                    <a class="btn btn-info" role="button">add</a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

@endsection
