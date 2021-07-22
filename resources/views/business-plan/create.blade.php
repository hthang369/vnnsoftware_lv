@extends('components.system-admin.create')

@section('form_content')
    <x-forms.input type="text" name="name" group="row"
        placeholder="{{__('custom_label.name')}}" required autocomplete
        label="{{__('custom_label.name')}}" />

    <x-forms.input type="text" name="maximum_storage_file" group="row"
        placeholder="{{__('custom_label.maximum_storage_file')}}" required autocomplete
        label="{{__('custom_label.maximum_storage_file')}}" />

    <x-forms.textarea type="text" name="description" group="row"
        placeholder="{{__('custom_label.description')}}" required autocomplete
        label="{{__('custom_label.description')}}" />

@endsection
