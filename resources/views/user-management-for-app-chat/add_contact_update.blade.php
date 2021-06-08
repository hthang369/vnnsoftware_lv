@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <!-- Show notification when redirect action-->
    @if(session()->has('added_all_contact'))
        @if(session()->get('added_all_contact') == true)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                @lang('custom_message.added_all_contacts')
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @lang('custom_message.add_all_contacts_failed')
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
    @if(session()->has('added_to_all_rooms'))
        @if(session()->get('added_to_all_rooms') == true)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                @lang('custom_message.added_to_all_rooms')
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @lang('custom_message.add_to_all_rooms_failed')
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
    @if(session()->has('user_has_been_disabled'))
        <div class="alert alert-danger">
            <strong>@lang('custom_message.user_has_been_disabled')</strong>
        </div>
    @endif
    @if(session()->has('isResetPass'))
        @if(session()->get('isResetPass')==true)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
    <!--    End show notification-->
    <div class="card">
        <h5 class="card-header">@lang('custom_title.laka_user_update_contact')</h5>

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
            <form method="POST" id="form-update">
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
                <label class="required mt-4 mb-2">@lang('custom_label.add_contact_option')</label>
                <div class="form-group ml-4">
                    <input class="
                    {{ session()->has('has_chosen_add_option') ? (session()->get('has_chosen_add_option') == false ? 'is-invalid' : '') : ''  }}
                        form-check-input"
                           type="checkbox"
                           id="add_all_contacts"
                           name="add_all_contacts"
                           value="1">
                    <label for="add_all_contacts"
                           class="form-check-label">@lang('custom_label.add_all_contacts')</label>
                </div>
                <div class="form-group ml-4">
                    <input class="
                        {{ session()->has('has_chosen_add_option') ? (session()->get('has_chosen_add_option') == false ? 'is-invalid' : '') : ''  }}
                        form-check-input"
                           type="checkbox"
                           id="add_to_all_rooms"
                           name="add_to_all_rooms"
                           value="1">
                    <label for="add_to_all_rooms"
                           class="form-check-label">@lang('custom_label.add_to_all_rooms')</label>
                </div>
                <span class="invalid-feedback mt-0" role="alert">
                    <strong>{{ session()->has('has_chosen_add_option') ? (session()->get('has_chosen_add_option') == false ? 'You must choose at least 1 option' : '') : ''  }}</strong>
                </span>

                <!-- Buttons -->
                <div class="form-group mt-4">
                    <input hidden type="text" name="user_id" value={{$userId}}>
                    <!--Submit button -->
                    <button type="submit" class="btn btn-primary">@lang('custom_label.update')</button>

                    <!-- Back button -->
                    <a class="btn btn-danger ml-2"
                       onclick="window.location='/system-admin/user-management-for-app-chat/add-contact'"
                       role="button">@lang('custom_label.back')</a>

                </div>
            </form>
            <form id="form-reset-pass" method="post" action="{{route('LAKA user manage.LAKA User reset password')}}">
                @csrf
                <input hidden type="text" name="user_id" value={{$userId}}>
                <!-- Btn reset password -->
                <button class="btn btn-warning" type="submit"
                >@lang('custom_label.reset_password')</button>
            </form>
        </div>


    </div>
@endsection
