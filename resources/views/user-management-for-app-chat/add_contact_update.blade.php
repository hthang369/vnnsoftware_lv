@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">LAKA user update contact</h5>
        <div class="card-body">
            <div class="form-group">
                <strong>@lang('custom_label.name'):</strong>
                <label>{{$user->name}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.email'):</strong>
                <label>{{$user->email}}</label>
            </div>
            <div class="form-group">
                <strong>@lang('custom_label.company'):</strong>
                <label>{{$user->company}}</label>
            </div>
            <form method="POST">
            @csrf
            <!-- Dropdown list -->
                <select class="form-control"
                        name="company_id" >
                    <option disabled selected></option>
                    @foreach($companies as $company)
                        <option
                            value="{{$company->id}}">
                            {{$company->name}}
                        </option>
                    @endforeach
                </select>

                <!-- Radio buttons -->

                <div class="form-group">
                    <input class="form-check-input"
                           type="checkbox"
                           name="add-all-contacts"
                           value="1">
                    <label class="form-check-label">Add all contacts</label>
                </div>
                <div class="form-group">
                    <input class="form-check-input"
                           type="checkbox"
                           name="add-to-all-rooms"
                           value="1">
                    <label class="form-check-label">Add to all rooms</label>
                </div>

                <!-- Submit button -->
                <div class="form-group">
                    <input hidden type="text" name="user-id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-primary">@lang('custom_label.update')</button>
                </div>
            </form>
        </div>


    </div>
@endsection
