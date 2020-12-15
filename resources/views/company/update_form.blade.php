@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Update company</h5>
        @if(count($listBusinessPlan) == 0)
            <div class="alert alert-warning">
                <strong>Do not have Business plan, create Business plan first to create Company</strong>
            </div>
            <a class="my-2 btn btn-primary" href="/system-admin/business-plan/new" role="button">+ @lang('custom_label.add_new') Business plan</a>
        @else
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="form-group required">
                        <label>Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{{ old('name') ? old('name') : $company->name }}" autocomplete="name" autofocus>
                        @error('name')
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
                               value="{{ old('email') ? old('email') : $company->email }}" autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Phone" name="phone" value="{{ old('phone') ? old('phone') : $company->phone }}" autocomplete="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Address" name="address" value="{{ old('address') ? old('address') : $company->address }}" autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Business plan</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="business_plan_id" value="{{ old('business_plan_id') ? old('business_plan_id') : $company->business_plan_id }}">
                            @foreach($listBusinessPlan as $i => $businessPlan)
                                <option value="{{$businessPlan->id}}" {{ (old('business_plan_id') ? old('business_plan_id') : $company->business_plan_id) == $businessPlan->id ? 'selected' : '' }}>
                                    {{$businessPlan->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-danger ml-2" href="{{ route('company.list') }}" role="button">Cancel</a>
                </form>
            </div>
        @endif
    </div>
@endsection
