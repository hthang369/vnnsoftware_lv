@extends('admin::layouts.master')

@section('content')
    {!! $data['grid']->render() !!}
@endsection
