@extends('components.system-admin.create')

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
    <x-forms.input type="text" name="name" group="row"
        placeholder="{{__('custom_label.name')}}" required autocomplete
        label="{{__('custom_label.name')}}" />

    <x-forms.input type="email" name="email" group="row" required
        placeholder="{{__('custom_label.email')}}"
        label="{{__('custom_label.email')}}" />

    <x-forms.input type="text" name="phone" group="row" required
        placeholder="{{__('custom_label.phone')}}"
        label="{{__('custom_label.phone')}}" />

    <x-forms.input type="text" name="address" group="row"
        placeholder="{{__('custom_label.address')}}"
        label="{{__('custom_label.address')}}" />

    <x-forms.select name="business_plan" group="row"
        options="{{$data['listBusinessPlan']->pluck('name', 'id')}}"
        placeholder="{{__('custom_label.business_plan')}}"
        label="{{__('custom_label.business_plan')}}" />
@endsection
