@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.user_management_for_app_chat')</h5>
        @if(count($listCompany) == 0)
            <div class="alert alert-warning">
                <strong>@lang('custom_message.alert_no_company')</strong>
            </div>
            <a class="my-2 btn btn-primary" href="/system-admin/company/new"
               role="button">+ @lang('custom_label.add_new') @lang('custom_title.company')</a>
        @else
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="required">@lang('custom_label.name')</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.name')"
                               name="name"
                               value="{{ old('name') }}"
                               autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="required">@lang('custom_label.email')</label>
                        <input class="form-control @error('email')
                            is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.email')" name="email"
                               value="{{ old('email')  }}"
                               autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="required">@lang('custom_label.password')</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                               placeholder="@lang('custom_label.password')"
                               name="password"
                               value="{{ old('password') }}"
                               autocomplete="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="required">@lang('custom_label.password_confirmation')</label>
                        <input class="form-control @error('c_password') is-invalid @enderror" type="password"
                               placeholder="@lang('custom_label.password_confirmation')" name="c_password"
                               value="{{ old('c_password') }}"
                               autocomplete="c_password">
                        @error('c_password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <!-- Options -->
                    <div class="form-group">
                        <label class="required">@lang('custom_label.company')</label>
                        <select class="form-control @error('company_id') is-invalid @enderror"
                                id="exampleFormControlSelect1" name="company_id"
                                value="{{ old('company_id') }}">
                            <option value=""></option>
                            @foreach($listCompany as $i => $company)
                                <option
                                    value="{{$company->id}}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                    {{$company->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('company_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <!-- Radio buttons -->
                    <label class="mt-1 mb-2">@lang('custom_label.add_contact_option')</label>
                    <div class="form-group ml-4">
                        <input class="form-check-input"
                               type="checkbox"
                               id="add_all_contacts"
                               name="add_all_contacts"
                               value="1">
                        <label for="add_all_contacts" class="form-check-label">@lang('custom_label.add_all_contacts')</label>
                    </div>
                    <div class="form-group ml-4">
                        <input class="form-check-input"
                               type="checkbox"
                               id="add_to_all_rooms"
                               name="add_to_all_rooms"
                               value="1">
                        <label for="add_to_all_rooms" class="form-check-label">@lang('custom_label.add_to_all_rooms')</label>
                    </div>
                    <span class="invalid-feedback mt-0" role="alert">
                        <strong>{{ session()->has('has_chosen_add_option') ? (session()->get('has_chosen_add_option') == false ? 'You must choose at least 1 option' : '') : ''  }}</strong>
                    </span>

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                    <a class="btn btn-danger ml-2" onclick="history.back()" role="button">@lang('custom_label.back')</a>

                </form>
            </div>
        @endif
    </div>
@endsection
