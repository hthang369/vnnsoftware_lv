@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Role has feature api</h5>
        @if(count($listRole) == 0)
            <div class="alert alert-warning">
                <strong>Do not have Role, create Role first to create Role has feature api</strong>
            </div>
            <a class="m-2 btn btn-primary" href="/system-admin/role/new" role="button">+ Add New Role</a>
        @endif
        @if(count($listFeatureApi) == 0)
            <div class="alert alert-warning">
                <strong>Do not have Feature api, create Feature api first to create Role has feature api</strong>
            </div>
            <a class="m-2 btn btn-primary" href="/system-admin/feature-api/new" role="button">+ Add New Feature api</a>
        @endif
        @if(count($listRole) > 0 && count($listFeatureApi) > 0)
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Role</label>
                        @if(isset($isNew))
                            <select class="form-control" id="exampleFormControlSelect1" name="role_id" value="{{ old('role_id') }}">
                                @foreach($listRole as $i => $role)
                                    <option value="{{$role->id}}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{$role->name}}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <select class="form-control" id="exampleFormControlSelect1" name="role_id" value="{{ old('role_id') ? old('role_id') : $roleHasFeatureApi->role_id }}">
                                @foreach($listRole as $i => $role)
                                    <option value="{{$role->id}}" {{ (old('role_id') ? old('role_id') : $roleHasFeatureApi->role_id) == $role->id ? 'selected' : '' }}>
                                        {{$role->name}}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        @endif
    </div>
@endsection
