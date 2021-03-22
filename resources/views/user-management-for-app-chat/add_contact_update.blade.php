@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.laka_user_update_contact')</h5>
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
        @if(session()->has('user_has_been_disabled'))
            <div class="alert alert-danger">
                <strong>User has been disabled!</strong>
            </div>
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
                <label>{{$companyName}}</label>
            </div>
            <form method="POST">
            @csrf
            <!-- Dropdown list -->
                <label class="required mt-3">Choose company</label>
                <select class="
                form-control
{{ session()->has('has_chosen_company') ? (session()->get('has_chosen_company') == false ? 'is-invalid' : '') : ''  }} "
                        name="company_id">
                    <option disabled selected></option>
                    @foreach($companies as $company)
                        <option
                            {{$company->id == $user->company ? 'selected' : ''}}
                            value="{{$company->id}}">
                            {{$company->name}}
                        </option>
                    @endforeach
                </select>
                <span class="invalid-feedback" role="alert">
                    <strong>{{ session()->has('has_chosen_company') ? (session()->get('has_chosen_company') == false ? 'You must choose a company' : '') : ''  }}</strong>
                </span>

                <!-- Radio buttons -->
                <label class="required mt-4 mb-2">Add contact options</label>
                <div class="form-group ml-4">
                    <input class="
                    {{ session()->has('has_chosen_add_option') ? (session()->get('has_chosen_add_option') == false ? 'is-invalid' : '') : ''  }}
                        form-check-input"
                           type="checkbox"
                           id="add_all_contacts"
                           name="add_all_contacts"
                           value="1">
                    <label for="add_all_contacts" class="form-check-label">Add all contacts</label>
                </div>
                <div class="form-group ml-4">
                    <input class="
                        {{ session()->has('has_chosen_add_option') ? (session()->get('has_chosen_add_option') == false ? 'is-invalid' : '') : ''  }}
                        form-check-input"
                           type="checkbox"
                           id="add_to_all_rooms"
                           name="add_to_all_rooms"
                           value="1">
                    <label for="add_to_all_rooms" class="form-check-label">Add to all rooms</label>
                </div>
                <span class="invalid-feedback mt-0" role="alert">
                    <strong>{{ session()->has('has_chosen_add_option') ? (session()->get('has_chosen_add_option') == false ? 'You must choose at least 1 option' : '') : ''  }}</strong>
                </span>

                <!-- Buttons -->
                <div class="form-group mt-4">
                    <input hidden type="text" name="user_id" value={{$userId}}>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">@lang('custom_label.update')</button>
                    <!-- Back button -->
                    <a class="btn btn-danger ml-2"
                       onclick="window.location='/system-admin/user-management-for-app-chat/add-contact'"
                       role="button">@lang('custom_label.back')</a>
                </div>
            </form>
        </div>


    </div>
@endsection
