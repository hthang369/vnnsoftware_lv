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
                        <label class="required">@lang('custom_label.password')</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                               placeholder="@lang('custom_label.name')" name="password" value="{{ old('password', $user->password) }}"
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
                        <label class="required">@lang('custom_label.role')</label>
                        <div class="form-group @error('role') border border-danger @enderror ">
                            @if(request()->id)
                                @foreach($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <input
                                            {{in_array($role->id, $userRoleIds) ? 'checked' : ''}} class="form-check-input"
                                            type="checkbox" name="role[]" value="{{$role->id}}">
                                        <label class="form-check-label">{{$role->name}}</label>
                                    </div>
                                @endforeach
                            @else
                                @foreach($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="role[]"
                                               value="{{$role->id}}">
                                        <label class="form-check-label">{{$role->name}}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @error('role')
                            <strong class="text-danger" >{{ $message }}</strong>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                    <a class="btn btn-danger ml-2" href="/system-admin/user-management"
                       role="button">@lang('custom_label.cancel')</a>
                </form>

        </div>
    </div>
@endsection
