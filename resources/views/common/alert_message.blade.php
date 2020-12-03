@extends('layouts.system-admin')

@section('title', 'Company Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-warning mt-4" role="alert">
        {{$message}}
    </div>
@endsection
