@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">@lang('custom_title.company')</h5>

        @if(count($listBusinessPlan) == 0)
            <div class="alert alert-warning">
                <strong>Do not have Business plan, create Business plan first to create Company</strong>
            </div>
            <a class="my-2 btn btn-primary" href="/system-admin/business-plan/new"
               role="button">+ @lang('custom_label.add_new') Business plan</a>
        @else
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="form-group ">
                        <label class="required">@lang('custom_label.name')</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.name')" name="name"
                               value="{{ old('name', $company->name) }}" autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="required">@lang('custom_label.email')</label>
                        <input class="form-control @error('email')
                            is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.email')" name="email"
                               value="{{ old('email', $company->email) }}" autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="required">@lang('custom_label.phone')</label>
                        <input
                            class="form-control @error('phone') is-invalid @enderror"
                            type="text"
                            placeholder="@lang('custom_label.phone')"
                            name="phone" value="{{ old('phone', $company->phone) }}" autocomplete="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="required">@lang('custom_label.address')</label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text"
                               placeholder="@lang('custom_label.address')" name="address"
                               value="{{ old('address', $company->address) }}" autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="required">@lang('custom_label.business_plan')</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="business_plan_id"
                                value="{{ old('businessPlan', $company->businessPlan) }}">
                            @foreach($listBusinessPlan as $i => $businessPlan)
                                <option
                                    value="{{$businessPlan->id}}" {{ (old('business_plan_id') ? old('business_plan_id') : $company->business_plan_id) == $businessPlan->id ? 'selected' : '' }}>
                                    {{$businessPlan->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('custom_label.save')</button>
                    <a class="btn btn-danger ml-2" onclick="history.back()" role="button">@lang('custom_label.back')</a>
                </form>
            </div>
        @endif
    </div>
@endsection
