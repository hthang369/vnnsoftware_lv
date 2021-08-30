@extends('components.system-admin.detail')

@section('body_content')
    @foreach (['log_level' => 'Level', 'ip' => 'Ip', 'date_log' => 'Date log', 'message' => 'Message'] as $key => $label)
        <x-form-group class="row">
            <x-form-label class="col-md-2">{{$label}}:</x-form-label>
            <x-form-label class="col-md-8">{{$data[$key]}}</x-form-label>
        </x-form-group>
    @endforeach
@endsection
