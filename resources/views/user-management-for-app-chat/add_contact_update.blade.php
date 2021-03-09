@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">LAKA user update contact</h5>
        @if(session()->has('added_all_contact'))
            @if(session()->get('added_all_contact') == true)
                <div class="alert alert-success">
                    <strong>@lang('custom_message.added_all_contacts')</strong>
                </div>
            @else
                <div class="alert alert-danger">
                    <strong>@lang('custom_message.add_all_contacts_failed')</strong>
                </div>
            @endif
        @endif
        @if(session()->has('added_to_all_rooms'))
            @if(session()->get('added_to_all_rooms') == true)
                <div class="alert alert-success">
                    <strong>@lang('custom_message.added_to_all_rooms')</strong>
                </div>
            @else
                <div class="alert alert-danger">
                    <strong>@lang('custom_message.add_to_all_rooms_failed')</strong>
                </div>
            @endif
        @endif
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
                        name="company_id">
                    <option disabled selected></option>
                    @foreach($companies as $company)
                        <option
                            value="{{$company->id}}">
                            {{$company->name}}
                        </option>
                    @endforeach
                </select>

                <!-- Radio buttons -->
                <div class="form-group ml-4 mt-4">
                    <input class="form-check-input"
                           type="checkbox"
                           name="add_all_contacts"
                           value="1">
                    <label class="form-check-label">Add all contacts</label>
                </div>
                <div class="form-group ml-4">
                    <input class="form-check-input"
                           type="checkbox"
                           name="add_to_all_rooms"
                           value="1">
                    <label class="form-check-label">Add to all rooms</label>
                </div>

                <!-- Buttons -->
                <div class="form-group">
                    <input hidden type="text" name="user_id" value={{$userId}}>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">@lang('custom_label.update')</button>
                    <!-- Back button -->
                    <a class="btn btn-danger ml-2" onclick="history.back()" role="button">@lang('custom_label.back')</a>
                </div>
            </form>
        </div>


    </div>
@endsection
