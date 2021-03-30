@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.user')</h5>
        <div class="card-body">
            @if(count($roles) == 0)
                <div class="alert alert-warning">
                    <strong>@lang('custom_message.alert_no_role')</strong>
                </div>
            @else
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="required">@lang('custom_label.name')</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.name')"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>@lang('custom_label.password')</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                               placeholder="@lang('custom_label.password')" name="password" value="{{ old('password') }}"
                               autocomplete="password">
                        @error('password')
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
                               value="{{ old('email', $user->email) }}"
                               autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>@lang('custom_label.phone')</label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.phone')"
                               name="phone"
                               value="{{ old('phone', $user->phone) }}"
                               autocomplete="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>@lang('custom_label.address')</label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.address')" name="address"
                               value="{{ old('address', $user->address) }}"
                               autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>@lang('custom_label.role')</label>
                        <div class="form-group @error('role') border border-danger @enderror ">
                            @foreach($roles as $role)
                                <div class="form-check form-check-inline">
                                    <input
                                        @if(is_array(old('role')) && in_array($role->id, old('role'))) checked @endif
                                        @if(is_array(old('role')) == false) {{in_array($role->id, $userRoleIds) ? 'checked' : ''}} @endif
                                        type="checkbox"
                                        name="role[]"
                                        value="{{$role->id}}">
                                    <label class="form-check-label">{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('role')
                        <strong class="text-danger" >{{ $message }}</strong>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                    <a class="btn btn-danger ml-2" onclick="history.back()" role="button">@lang('custom_label.back')</a>
                </form>

        </div>
    </div>
@endsection