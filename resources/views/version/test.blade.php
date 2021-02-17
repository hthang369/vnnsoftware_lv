@extends('layouts.system-admin')

@section('title', 'Danh sách version')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        <h1>@lang('custom_title.version')</h1>
    </div>
    <div class="mt-5">

            <div><span class="badge badge-success">id </span> {{$versions['id']}}</div>



            <div><span class="badge badge-success">username</span> {{$versions['username']}} </div>



            <div><span class="badge badge-success">email</span> {{$versions['email']}} </div>


            <span class="badge badge-success">password</span>      {{$versions['password']}}

    </div>

@endsection

