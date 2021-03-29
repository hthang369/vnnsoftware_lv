@extends('layouts.system-admin')

@section('title', 'Danh sách version')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h2>Server Frontend</h2>
    <div class="well">
        <h3>Environment: <b>Dev</b></h3>
        <div>Current version: <b>v1.1</b></div>
        <form method="post">
        @csrf
        <input class="form-control" name="tag" placeholder="ID commit / Version">
        <input type="hidden" class="form-control" name="server" value="frontend">
        <button class="btn btn-primary">
            Deploy
        </button>
    </form>
    </div>
    <div class="well">
        <h3>Environment: <b>Staging</b></h3>
        <div>Current version: <b>v1.1</b></div>
        <form method="post">
            @csrf
            <input class="form-control" name="tag" placeholder="ID commit / Version">
            <input type="hidden" class="form-control" name="server" value="frontend">
            <button class="btn btn-primary">
                Deploy
            </button>
        </form>
    </div>
    <div class="well">
        <h3>Environment: <b>Production</b></h3>
        <div>Current version: <b>v1.1</b></div>
        <form method="post">
            @csrf
            <input class="form-control" name="tag" placeholder="ID commit / Version">
            <input type="hidden" class="form-control" name="server" value="frontend">
            <button class="btn btn-primary">
                Deploy
            </button>
        </form>
    </div>
    <hr>
    <h2>Server Backend</h2>
    <div class="well">
        <h3>Environment: <b>Dev</b></h3>
        <div>Current version: <b>v1.1</b></div>
        <form method="post">
            @csrf
            <input class="form-control" name="tag" placeholder="ID commit / Version">
            <input type="hidden" class="form-control" name="server" value="frontend">
            <button class="btn btn-primary">
                Deploy
            </button>
        </form>
    </div>
    <div class="well">
        <h3>Environment: <b>Staging</b></h3>
        <div>Current version: <b>v1.1</b></div>
        <form method="post">
            @csrf
            <input class="form-control" name="tag" placeholder="ID commit / Version">
            <input type="hidden" class="form-control" name="server" value="frontend">
            <button class="btn btn-primary">
                Deploy
            </button>
        </form>
    </div>
    <div class="well">
        <h3>Environment: <b>Production</b></h3>
        <div>Current version: <b>v1.1</b></div>
        <form method="post">
            @csrf
            <input class="form-control" name="tag" placeholder="ID commit / Version">
            <input type="hidden" class="form-control" name="server" value="frontend">
            <button class="btn btn-primary">
                Deploy
            </button>
        </form>
    </div>
@endsection

