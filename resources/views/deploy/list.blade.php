@extends('layouts.system-admin')

@section('title', 'Danh sách version')

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(session()->has('status'))
        <div class="alert {{session()->get('status') == true ? 'alert-success' : 'alert-danger' }}">
            Deployed to:  <strong>server {{session()->get('environment')}}</strong>
            <br>
            Environment: <strong>{{session()->get('type')}}</strong>
            <br>
            Input version: <strong>{{session()->get('version')}}</strong>
            <br>
            Message: <strong> {{session()->get('message')}}</strong>
            <br>
        </div>
    @endif
    @foreach($environmentArray as $env => $obj)
        <div class="card mb-5">
            <div class="text-white card-header bg-primary">
                <h2>Server {{$env}}</h2>
            </div>
            @foreach($obj as $key => $value)
                <div class="card-body ">
                    <div class="well mb-1">
                        <h3>Environment: <b>{{$value->type}}</b></h3>
                        <div>Current version: <b>{{$value->version}}</b></div>
                        <form method="post">
                            @csrf
                            <input class="form-control" name="version" placeholder="ID commit / Version">
                            <input type="hidden" class="form-control" name="environment" value="{{$env}}">
                            <input type="hidden" class="form-control" name="type" value="{{$value->type}}">
                            <button class="btn btn-primary mt-1">
                                Deploy
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    @endforeach

@endsection

