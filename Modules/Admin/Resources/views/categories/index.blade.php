@extends('admin::layouts.master')

@section('content')
@php
    // dd($data);
@endphp
    {!! $data['grid']->render() !!}
@endsection
