@extends('components.system-admin.create')

@section('form_content')
    <x-forms.input type="text" name="level" group="row"
        placeholder="{{__('custom_label.level')}}" required autocomplete
        label="{{__('custom_label.level')}}" />

    <x-forms.input type="text" name="name" group="row"
        placeholder="{{__('custom_label.name')}}" required autocomplete
        label="{{__('custom_label.name')}}" />

    <x-forms.input type="text" name="role_rank" group="row"
        placeholder="{{__('custom_label.role_rank')}}" required autocomplete
        label="{{__('custom_label.role_rank')}}" />

    <x-forms.textarea type="text" name="description" group="row"
        placeholder="{{__('custom_label.description')}}" autocomplete
        label="{{__('custom_label.description')}}" />
@endsection
