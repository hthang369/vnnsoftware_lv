@extends('components.system-admin.update')

@php
    request()->merge($data);
@endphp

@section('message_content')
    @if ($data['listBusinessPlan']->count() == 0)
        <x-alert type="warning">
            <strong>@lang('custom_message.alert_no_business_plan')</strong>
        </x-alert>
        {!! link_to(route('business-plan.create'),
            '+' . __('custom_label.add_new') .' '. __('custom_title.business_plan'),
            ['class' => 'my-2 btn btn-sm btn-primary']) !!}
    @endif
@endsection

@section('form_content')
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label required">@lang('custom_label.name')</x-form-label>
        <x-form-input type="text" name="name" groupClass="col-sm-10 form-row" value="{{request('name')}}"
            placeholder="{{__('custom_label.name')}}" required autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label required">@lang('custom_label.email')</x-form-label>
        <x-form-input type="email" name="email" groupClass="col-sm-10 form-row" value="{{request('email')}}"
            placeholder="{{__('custom_label.email')}}" required autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label">@lang('custom_label.phone')</x-form-label>
        <x-form-input type="text" name="phone" groupClass="col-sm-10 form-row" value="{{request('phone')}}"
            placeholder="{{__('custom_label.phone')}}" autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label">@lang('custom_label.address')</x-form-label>
        <x-form-textarea name="address" groupClass="col-sm-10 form-row" :rows="5" value="{{request('address')}}"
            placeholder="{{__('custom_label.address')}}" autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label">@lang('custom_label.business_plan')</x-form-label>
        <x-form-select name="business_plan" :items="$data['listBusinessPlan']->pluck('name', 'id')" placeholder=" "
            groupClass="col-sm-10 form-row" selected="{{request('business_plan_id')}}" />
    </x-form-group>

@endsection
