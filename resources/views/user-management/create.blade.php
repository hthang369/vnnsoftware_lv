@extends('components.system-admin.create')

@section('form_content')
    <x-forms.input type="text" name="name" group="row"
        placeholder="{{__('custom_label.name')}}" required autocomplete
        label="{{__('custom_label.name')}}" />

    <x-forms.input type="password" name="password" group="row"
        placeholder="{{__('custom_label.password')}}" required autocomplete
        label="{{__('custom_label.password')}}" />

    <x-forms.input type="email" name="email" group="row"
        placeholder="{{__('custom_label.email')}}" required autocomplete
        label="{{__('custom_label.email')}}" />

    <x-forms.input type="text" name="phone" group="row"
        placeholder="{{__('custom_label.phone')}}" autocomplete
        label="{{__('custom_label.phone')}}" />

    <x-forms.textarea type="text" name="address" group="row"
        placeholder="{{__('custom_label.address')}}" autocomplete
        label="{{__('custom_label.address')}}" />

    <div class="form-group row">
        {!! Form::label('roles', __('custom_label.role'), ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10 form-row mx-0">
            @foreach ($data['roles_all'] as $role)
            <div class="custom-control custom-checkbox mr-2">
                {!! Form::checkbox("check-{$role->level}", 1, false, ['class' => 'custom-control-input', 'id' => "check-{$role->level}"]) !!}
                {!! Form::label("check-{$role->level}", $role->name, ['class' => 'custom-control-label']) !!}
            </div>
            @endforeach
        </div>
    </div>
@endsection
