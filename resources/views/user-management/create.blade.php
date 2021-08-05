@extends('components.system-admin.create')

@section('form_content')
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label required">@lang('custom_label.name')</x-form-label>
        <x-form-input type="text" name="name" groupClass="col-sm-10 form-row"
            placeholder="{{__('custom_label.name')}}" required autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label required">@lang('custom_label.password')</x-form-label>
        <x-form-input type="password" name="password" groupClass="col-sm-10 form-row"
            placeholder="{{__('custom_label.password')}}" required autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label required">@lang('custom_label.email')</x-form-label>
        <x-form-input type="email" name="email" groupClass="col-sm-10 form-row"
            placeholder="{{__('custom_label.email')}}" required autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label">@lang('custom_label.phone')</x-form-label>
        <x-form-input type="text" name="phone" groupClass="col-sm-10 form-row"
            placeholder="{{__('custom_label.phone')}}" autocomplete />
    </x-form-group>
    <x-form-group :inline="true">
        <x-form-label class="col-sm-2 col-form-label">@lang('custom_label.address')</x-form-label>
        <x-form-textarea name="address" groupClass="col-sm-10 form-row" :rows="5"
            placeholder="{{__('custom_label.address')}}" autocomplete />
    </x-form-group>

    <x-form-group :inline="true">
        {!! Form::label('roles', __('custom_label.role'), ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10 form-row mx-0">
            @foreach ($data['roles_all'] as $role)
            <div class="custom-control custom-checkbox mr-2">
                {!! Form::checkbox("check-{$role->level}", 1, false, ['class' => 'custom-control-input', 'id' => "check-{$role->level}"]) !!}
                {!! Form::label("check-{$role->level}", $role->name, ['class' => 'custom-control-label']) !!}
            </div>
            @endforeach
        </div>
    </x-form-group>
@endsection
