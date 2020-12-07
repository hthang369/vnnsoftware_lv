@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Add company</h5>
        @if(count($listBusinessPlan) == 0)
            <div class="alert alert-warning">
                <strong>Do not have Business plan, create Business plan first to create Company</strong>
            </div>
            <a class="m-2 btn btn-primary" href="/system-admin/business-plan/new" role="button">+ Add New Business
                plan</a>
        @else
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="form-group required">
                        <label>Name</label>
<<<<<<< HEAD
                        <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name"
                               name="name"
                               value="{!! request()->id ? (old('name') ? old('name') : $company->name) : old('name') !!}"
                               autocomplete="name" autofocus>
=======
                        <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{!! old('name') !!}" autocomplete="name" autofocus>
>>>>>>> origin/master
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
<<<<<<< HEAD
                               value="{!! request()->id ? (old('email') ? old('email') : $company->email) : old('email')  !!}"
                               autocomplete="email">
=======
                               value="{!! old('email') !!}" autocomplete="email">
>>>>>>> origin/master
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
<<<<<<< HEAD
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Phone"
                               name="phone"
                               value="{!! request()->id ? (old('phone') ? old('phone') : $company->phone) : old('phone') !!}"
                               autocomplete="phone">
=======
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Phone" name="phone" value="{!! old('phone') !!}" autocomplete="phone">
>>>>>>> origin/master
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
<<<<<<< HEAD
                        <input class="form-control @error('address') is-invalid @enderror" type="text"
                               placeholder="Address" name="address"
                               value="{!! request()->id ? (old('address') ? old('address') : $company->address) : old('address') !!}"
                               autocomplete="address">
=======
                        <input class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Address" name="address" value="{!! old('address') !!}" autocomplete="address">
>>>>>>> origin/master
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Business plan</label>
<<<<<<< HEAD
                        @if(request()->id)
                            <select class="form-control" id="exampleFormControlSelect1" name="business_plan_id"
                                    value="{{ old('business_plan_id') ? old('business_plan_id') : $company->business_plan_id }}">
                                @foreach($listBusinessPlan as $i => $businessPlan)
                                    <option
                                        value="{{$businessPlan->id}}"
                                        {{ (old('business_plan_id')
                                            ? old('business_plan_id')
                                            : $company->business_plan_id) == $businessPlan->id ? 'selected' : '' }}
                                    >
                                        {{$businessPlan->name}}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <select class="form-control" id="exampleFormControlSelect1" name="business_plan_id"
                                    value="{{ old('business_plan_id') }}">
                                @foreach($listBusinessPlan as $i => $businessPlan)
                                    <option
                                        value="{{$businessPlan->id}}" {{ old('business_plan_id') == $businessPlan->id ? 'selected' : '' }}>
                                        {{$businessPlan->name}}
                                    </option>
                                @endforeach
                            </select>
                        @endif
=======
                        <select class="form-control" id="exampleFormControlSelect1" name="business_plan_id" value="{{ old('business_plan_id') }}">
                            @foreach($listBusinessPlan as $i => $businessPlan)
                                <option value="{{$businessPlan->id}}" {{ old('business_plan_id') == $businessPlan->id ? 'selected' : '' }}>
                                    {{$businessPlan->name}}
                                </option>
                            @endforeach
                        </select>
>>>>>>> origin/master
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-danger ml-2" href="{{ route('company.list') }}" role="button">Cancel</a>
                </form>
            </div>
        @endif
    </div>
@endsection
