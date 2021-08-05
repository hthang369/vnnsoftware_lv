@extends('components.system-admin.create')

@section('form_content')
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label required">@lang('custom_label.level')</x-form-label>
        <x-form-input type="text" name="level" groupClass="col-sm-10 form-row"
            placeholder="{{__('custom_label.level')}}" required autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label required">@lang('custom_label.name')</x-form-label>
        <x-form-input type="text" name="name" groupClass="col-sm-10 form-row"
            placeholder="{{__('custom_label.name')}}" required autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label required">@lang('custom_label.role_rank')</x-form-label>
        <x-form-input type="text" name="role_rank" groupClass="col-sm-10 form-row"
            placeholder="{{__('custom_label.role_rank')}}" required autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label">@lang('custom_label.description')</x-form-label>
        <x-form-textarea :rows="5" name="description" groupClass="col-sm-10 form-row"
            placeholder="{{__('custom_label.description')}}" autocomplete />
    </x-form-group>

@endsection
