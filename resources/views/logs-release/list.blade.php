@extends('layouts.system-admin')

@section('title', 'Log Release List')

@section('sidebar')
    @parent
@endsection

@section('style')




@endsection
<style>
    .search-group {
        /*margin: 20px 0px 25px 0;*/
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .search-group .input-search {
        width: 75%;

    }

    @media screen and (max-width: 1400px) {
        .data-table {
            height: 450px;

            overflow-x: scroll;
            overflow-y: scroll;
        }
    }

    .data-table {

    }

    .select-group {
        display: flex;
        justify-content: space-around;
    }

</style>
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>

    <div class="card">
        <div class="card-header">
            Data Table
        </div>
        <div class="card-body">
            <div class="search-form">
                <form method="get" action="{{route('Version Deploy.Deploy index.Search LogRelease')}}">
                                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">User ID</span>
                                </div>
                                <input type="text" class="form-control" placeholder="User ID.."
                                       aria-describedby="addon-wrapping" name="user_id"
                                       @isset($user_id) value="{{$user_id}}" @endisset


                                >
                            </div>

                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">User Name</span>
                                </div>
                                <input type="text" class="form-control" placeholder="User name.." aria-label="Username"
                                       aria-describedby="addon-wrapping" name="user_name"
                                       @isset($user_name) value="{{$user_name}}" @endisset>
                            </div>

                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Redmine ID</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Redmine ID.."
                                       aria-describedby="addon-wrapping" name="redmine_id"
                                       @isset($redmine_id) value="{{$redmine_id}}" @endisset>

                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Version</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Version.."
                                       aria-describedby="addon-wrapping" name="version"
                                       @isset($version) value="{{$version}}" @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">

                                <select class="form-control " id="exampleFormControlSelect1" name="release_type">
                                    <option selected value="default">-- Release Type --</option>
                                    <option value="0"
                                            @isset($release_type) @if($release_type==0) selected @endif @endisset> New
                                    </option>
                                    <option value="1"
                                            @isset($release_type) @if($release_type==1) selected @endif @endisset>Back
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <select class="form-control " id="exampleFormControlSelect1" name="environment">
                                    <option selected value="default">-- Enviroment --</option>
                                    <option value="development"
                                            @isset($environment) @if($environment=='development') selected @endif @endisset>
                                        Development
                                    </option>
                                    <option value="staging"
                                            @isset($environment) @if($environment=='staging') selected @endif @endisset>
                                        Staging
                                    </option>
                                    <option value="production"
                                            @isset($environment) @if($environment=='production') selected @endif @endisset>
                                        Production
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">

                                <select class="form-control " id="exampleFormControlSelect1" name="deploy_server_id">
                                    <option selected value="default">
                                       -- Deploy Server --
                                    </option>
                                    @foreach($deploy_server as $key => $value)
                                        <option value={{$value->id}} @isset($deploy_server_id) @if($deploy_server_id==$value->id) selected @endif @endisset>
                                            {{$value->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Search</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </form>
            </div>
        </div>


        <div class="card-body">
            <div class="data-table table-responsive-md">
                <div class="table-log">
                    <table class="table table-hover table-bordered" style="font-size: 13px;">
                        <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Log ID</th>
                            <th scope="col">User ID</th>

                            <th scope="col">User name</th><th scope="col">Deploy Server </th>
                            <th scope="col">Redmine ID</th>
                            <th scope="col">Version</th>
                            <th scope="col">Release Type</th>
                            <th scope="col">Environment</th>
                            <th scope="col">Release at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logReleaseList as $log)
                            <tr>

                                <td>{{ $log->id }}</td>
                                <td>
                                    {{$log->user_id}}
                                </td>
                                <td>
                                    <a href="{{route('Version Deploy.Deploy index.Show Log Release By User Id',['user_id'=>$log->user_id])}}">{{ $log->user->name }}</a>
                                </td>
                                <td>{{$log->server->name}}</td>
                                <td>{{$log->redmine_id}}</td>
                                <td>{{ $log->version }}</td>
                                <td>
                                    @if($log->release_type===0)
                                        New
                                    @else
                                        Back
                                    @endif
                                </td>
                                <td>{{ $log->environment }}</td>
                                <td>
                                    <p>{{ Carbon\Carbon::createFromTimeStamp(strtotime($log->created_at))->diffForHumans() }}</p>
                                    <p>{{ $log->created_at }}</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
{{$logReleaseList->links()}}
        </div>
    </div>
@endsection
<script>

</script>
