@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Company</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label>Company name</label>
                    <input class="form-control" placeholder="Company name">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" placeholder="Address">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <label>Business plan</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Premium</option>
                        <option>Gold</option>
                        <option>Silver</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">@lang('custom_label.update')</button>
                <button type="button" class="btn btn-danger">@lang('custom_label.delete')</button>
            </form>
        </div>
    </div>
@endsection
