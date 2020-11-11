@extends('layouts.system-admin')

@section('title', 'Business Plan details')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Business Plan Details</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label>Business Plan name</label>
                    <input class="form-control" placeholder="Lampart">
                </div>
                <div class="form-group">
                    <label>Business plan</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Premium</option>
                        <option>Gold</option>
                        <option>Silver</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" placeholder="lampart@gmail.com">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" placeholder="abc/123">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" placeholder="4875559892">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
