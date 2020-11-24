@extends('layouts.system-admin')

@section('title', 'Business Plan details')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Business Plan</h5>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label>Business Plan name</label>
                    @if(isset($isNew))
                        <input name="name" class="form-control" placeholder="Business Plan name">
                    @else
                        <input name="name" class="form-control" value="{{$businessPlan->name}}" placeholder="Business Plan name">
                    @endif
                </div>
                <div class="form-group">
                    <label>Maximum storage</label>
                    @if(isset($isNew))
                        <input name="maximum_storage_file" class="form-control" placeholder="Maxium storage">
                    @else
                        <input name="maximum_storage_file" class="form-control" value="{{$businessPlan->maximum_storage_file}}" placeholder="Maxium storage">
                    @endif
                </div>
                <div class="form-group">
                    <label>Description</label>
                    @if(isset($isNew))
                        <input name="description" class="form-control" placeholder="Description">
                    @else
                        <input name="description" class="form-control" value="{{$businessPlan->description}}" placeholder="Description">
                    @endif

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger ml-2" href="{{ route('business-plan.list') }}" role="button">Cancel</a>
            </form>
        </div>
    </div>
@endsection
