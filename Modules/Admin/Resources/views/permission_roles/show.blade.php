@extends('admin::layouts.master')

@section('content')
    {!! Form::open(['route' => ['role_has_permissions.update', $role_id]]) !!}
    {!! $grid !!}
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
