@extends('layouts.system-admin')

@section('title', 'Chi tiết công ty')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>

@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Company Details</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <strong>Company name:</strong>
                    <label>Premium</label>
                </div>
                <div class="form-group">
                    <strong>Business plan:</strong>
                    <label>Gold</label>
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <label>lampart@gmail.com</label>
                </div>
                <div class="form-group">
                    <strong>Address:</strong>
                    <label>bv/123</label>
                </div>
                <div class="form-group">
                    <strong>Phone:</strong>
                    <label>444555666</label>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
