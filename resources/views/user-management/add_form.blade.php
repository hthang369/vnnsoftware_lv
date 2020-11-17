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
                    <input class="form-control @error('email')
                        is-invalid @enderror" type="text"
                           placeholder="Email" name="email"
                           value="{!! isset($isNew) ? old('email') : (old('email') ? old('email') : $user->email) !!}" autocomplete="email">
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
                    <div class="form-group">
                        @if(isset($isNew))
                        @foreach($roles as $role)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="role[]" value="{{$role->id}}">
                                <label class="form-check-label" >{{$role->name}}</label>
                            </div>
                        @endforeach
                        @else
                            @foreach($roles as $role)
                                <div class="form-check form-check-inline">
                                    <input {{in_array($role->id, $userRoleIds) ? 'checked' : ''}} class="form-check-input" type="checkbox" name="role[]" value="{{$role->id}}">
                                    <label class="form-check-label" >{{$role->name}}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
