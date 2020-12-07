@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">User management</h5>
        <div class="card-body">
            @if(count($roles) == 0)
                <div class="alert alert-warning">
                    <strong>Do not have Role, create create Role first to create Company</strong>
                </div>
            @else
                <form method="POST">
                    @csrf
                    <div class="form-group required">
                        <label>Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name"
                               name="name"
                               value="{!! request()->id ?(old('name') ? old('name') : $user->name) :  old('name') !!}"
                               autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                               placeholder="Password" name="password" value="{{ old('password') }}"
                               autocomplete="password">
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
                               value="{!! request()->id ? (old('email') ? old('email') : $user->email) : old('email') !!}"
                               autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Phone"
                               name="phone"
                               value="{!! request()->id ? (old('phone') ? old('phone') : $user->phone) : old('phone') !!}"
                               autocomplete="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text"
                               placeholder="Address" name="address"
                               value="{!! request()->id ? (old('address') ? old('address') : $user->address) : old('address')!!}"
                               autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <div class="form-group">
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
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-danger ml-2" href="{{ route('user-management.list') }}" role="button">Cancel</a>
                </form>

        </div>
    </div>
@endsection
