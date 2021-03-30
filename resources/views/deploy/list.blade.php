@extends('layouts.system-admin')

@section('title', 'Danh sách version')

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(session()->has('status'))
        <div class="alert {{session()->get('status') == true ? 'alert-success' : 'alert-danger' }}">
            Deployed to: <strong>server {{session()->get('server')}}</strong>
            <br>
            Environment: <strong>{{session()->get('environment')}}</strong>
            <br>
            Input version: <strong>{{session()->get('version')}}</strong>
            <br>
            Message: <strong> {{session()->get('message')}}</strong>
            <br>
        </div>
    @endif
    <div class="card mb-5">
        <div class="text-white card-header bg-primary">
            <h2>{{$environment}} </h2>
        </div>
        <div class="card-body ">
            @foreach($serverArray as $key => $value)
                <div class="well mb-4">
                    <h3>{{$value->server}}</h3>
                    <div>Current version: <b>{{$value->version}}</b></div>
                    <form method="post">
                        @csrf
                        <input class="form-control" name="version" placeholder="ID commit / Version">
                        <input type="hidden" class="form-control" name="server" value="{{$value->server}}">
                        <input type="hidden" class="form-control" name="environment" value="{{$environment}}">
                        <button class="btn btn-primary mt-1">
                            Deploy
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

    </div>
@endsection

