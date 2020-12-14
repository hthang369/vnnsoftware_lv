@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Role</h5>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group required">
                    <label>Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name"
                           name="name"
                           value="{{ old('name') ? old('name') : $role->name }}"
                           autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Role rank</label>
                    <input class="form-control @error('role_rank')
                        is-invalid @enderror" type="text"
                           placeholder="Role rank" name="role_rank"
                           value="{{ old('role_rank') ? old('role_rank') : $role->role_rank }}"
                           autocomplete="role_rank">
                    @error('role_rank')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" type="text"
                              placeholder="Description" name="description"
                              autocomplete="description">{{ old('description') ? old('description') : $role->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger ml-2" href="{{ route('role.list') }}" role="button">Cancel</a>
            </form>
        </div>
    </div>
@endsection
