@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Company</h5>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group required">
                    <label>Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                    @error('email')
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
                    <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Phone" name="phone" value="{{ old('phone') }}" autocomplete="phone">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Address" name="address" value="{{ old('address') }}" autocomplete="address">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="role" value="{{ old('role') }}">
                        <option value="1"  {{ old('role') == 1 ? 'selected' : '' }}>
                            Item 1
                        </option>
                        <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>
                            Item 2
                        </option>
                        <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>
                            Item 3
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
