@extends('components.system-admin.create')

@section('form_content')
    <x-forms.input type="text" name="name" group="row"
        placeholder="{{__('users.fields.name')}}" required autocomplete
        label="{{__('users.fields.name')}}" />

    <x-forms.input type="email" name="email" group="row"
        placeholder="{{__('users.fields.email')}}" required autocomplete
        label="{{__('users.fields.email')}}" />

    <x-forms.input type="password" name="password" group="row"
        placeholder="{{__('users.fields.password')}}" required autocomplete
        label="{{__('users.fields.password')}}" />

    <x-forms.input type="password" name="confirm_password" group="row"
        placeholder="{{__('users.fields.confirm_password')}}" required autocomplete
        label="{{__('users.fields.confirm_password')}}" />

    <x-forms.select name="company_id" group="row"
        :options="$data['company_list']"
        placeholder=" "
        label="{{__('users.laka.fields.company')}}" />

    <div class="form-group row">
        {!! Form::label('', __('users.laka.add_contact_option'), ['class' => 'col-2 col-form-label required']) !!}
        <div class="col-10">
            @foreach (['add_all_contacts', 'add_to_all_rooms'] as $item)
            <div class="custom-control custom-checkbox mr-2">
                {!! Form::checkbox($item, 1, (bool)$value, ['class' => "custom-control-input $has_option_class", 'id' => $item]) !!}
                {!! Form::label($item, __("users.laka.$item"), ['class' => 'custom-control-label']) !!}
            </div>
            @endforeach
        </div>
    </div>
@endsection
