@extends('components.system-admin.update')

@php
    request()->merge($data);
@endphp

@section('form_content')
    <x-forms.input type="text" name="name" group="row"
        placeholder="{{__('custom_label.name')}}" required autocomplete
        label="{{__('custom_label.name')}}" />

    <x-forms.input type="password" name="password" group="row"
        placeholder="{{__('custom_label.password')}}" autocomplete
        label="{{__('custom_label.password')}}" />

    <x-forms.input type="email" name="email" group="row"
        placeholder="{{__('custom_label.email')}}" required autocomplete
        label="{{__('custom_label.email')}}" />

    <x-forms.input type="text" name="phone" group="row"
        placeholder="{{__('custom_label.phone')}}" autocomplete
        label="{{__('custom_label.phone')}}" />

    <x-forms.textarea type="text" name="description" group="row"
        placeholder="{{__('custom_label.description')}}" autocomplete
        label="{{__('custom_label.description')}}" />

    <div class="form-group row">
        {!! Form::label('roles', __('custom_label.role'), ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10 form-row mx-0">
            @foreach ($data['roles_all'] as $role)
            <div class="custom-control custom-checkbox mr-2">
                {!! Form::checkbox("roles[{$role->name}]", 1, isset($data['roles'][$role->id]), ['class' => 'custom-control-input', 'id' => "{$role->name}"]) !!}
                {!! Form::label("{$role->name}", $role->name, ['class' => 'custom-control-label']) !!}
            </div>
            @endforeach
        </div>
    </div>

@endsection
