@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">User management</h5>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group required">
                    <label>Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{!! isset($isNew) ? old('name') : (old('name') ? old('name') : $user->name) !!}" autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" value="{{ old('password') }}" autocomplete="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" value="{!! isset($isNew) ? old('email') : (old('email') ? old('email') : $user->email) !!}" autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Phone" name="phone" value="{!! isset($isNew) ? old('phone') : (old('phone') ? old('phone') : $user->phone) !!}" autocomplete="phone">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Address" name="address" value="{!! isset($isNew) ? old('address') : (old('address') ? old('address') : $user->address) !!}" autocomplete="address">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Role</label>
                    @if(isset($isNew))
                        <select class="form-control" id="exampleFormControlSelect1" name="role_id" value="{{ old('role_id') }}">
                            <option value="1"  {{ old('role_id') == 1 ? 'selected' : '' }}>
                                Item 1
                            </option>
                            <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>
                                Item 2
                            </option>
                            <option value="3" {{ old('role_id') == 3 ? 'selected' : '' }}>
                                Item 3
                            </option>
                        </select>
                    @else
                        <select class="form-control" id="exampleFormControlSelect1" name="role_id" value="{{ old('role_id') ? old('role_id') : $user->role_id }}">
                            <option value="1"  {{ (old('role_id') ? old('role_id') : $user->role_id) == 1 ? 'selected' : '' }}>
                                Item 1
                            </option>
                            <option value="2" {{ (old('role_id') ? old('role_id') : $user->role_id) == 2 ? 'selected' : '' }}>
                                Item 2
                            </option>
                            <option value="3" {{ (old('role_id') ? old('role_id') : $user->role_id) == 3 ? 'selected' : '' }}>
                                Item 3
                            </option>
                        </select>
                    @endif
                </div>
                <div class="form-group">
                    <label>Status</label>
                    @if(isset($isNew))
                        <select class="form-control" id="exampleFormControlSelect2" name="status" value="{{ old('status') }}">
                            <option value="0"  {{ old('status') == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                        </select>
                    @else
                        <select class="form-control" id="exampleFormControlSelect1" name="status" value="{{ old('status') ? old('status') : $user->status }}">
                            <option value="0"  {{ (old('status') ? old('status') : $user->status) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                            <option value="1" {{ (old('status') ? old('status') : $user->status) == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                        </select>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
