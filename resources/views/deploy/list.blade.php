@extends('layouts.system-admin')

@section('title', 'Danh sách version')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h2>Server Frontend</h2>
    <div class="well">
        <form method="post">
        @csrf
        <input class="form-control" name="tag" placeholder="ID commit / Version">
        <input type="hidden" class="form-control" name="server" value="frontend">
        <button class="btn btn-primary">
            Deploy
        </button>
    </form>
    </div>
    <h2>Server Backend</h2>
    <div class="well">
        <form method="post">
        @csrf
        <input class="form-control" name="tag" placeholder="ID commit / Version">
        <input type="hidden" class="form-control" name="server" value="backend">
        <button class="btn btn-primary">
            Deploy
        </button>
    </form>
    </div>
    <h2>Server API</h2>
    <div class="well">
        <form method="post">
        @csrf
        <input class="form-control" name="tag" placeholder="ID commit / Version">
        <input type="hidden" class="form-control" name="server" value="api">
        <button class="btn btn-primary">
            Deploy
        </button>
    </form>
    </div>
    <h2>Server Socket</h2>
    <div class="well">
        <form method="post">
        @csrf
        <input class="form-control" name="tag" placeholder="ID commit / Version">
        <input type="hidden" class="form-control" name="server" value="socket">
        <button class="btn btn-primary">
            Deploy
        </button>
    </form>
    </div>

@endsection

