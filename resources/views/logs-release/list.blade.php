@extends('layouts.system-admin')

@section('title', 'Log Release List')

@section('sidebar')
    @parent
@endsection

@section('bootstrap-css')
    <style>

        @media screen and (max-width: 1400px) {
            .data-table {
                height: 450px;

                overflow-x: scroll;
                overflow-y: scroll;
            }
        }
    </style>
@section('content')
    <div class="card">
        <div class="card-header">
            Log Release List
        </div>
        <div class="card-body">
            <div class="search-form">
                <form method="get" action="{{route('Version Deploy.Deploy index.Search LogRelease')}}">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">User ID</span>
                                </div>
                                <input id="user-id" type="text" class="form-control" placeholder="User ID.."
                                       aria-describedby="addon-wrapping" name="user_id"
                                       value="{{$user_id}}"
                                >
                           </div>

                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">User Name</span>
                                </div>
                                <input id="user-name" type="text" class="form-control" placeholder="User name.."
                                       aria-label="Username"
                                       aria-describedby="addon-wrapping" name="user_name"
                                       value="{{$user_name}}">
                            </div>

                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Redmine ID</span>
                                </div>
                                <input id="redmine-id" type="text" class="form-control" placeholder="Redmine ID.."
                                       aria-describedby="addon-wrapping" name="redmine_id"
                                       value="{{$redmine_id}}">

                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Version</span>
                                </div>
                                <input id="version" type="text" class="form-control" placeholder="Version.."
                                       aria-describedby="addon-wrapping" name="version"
                                       value="{{$version}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">

                                <select class="form-control" name="release_type"
                                        id="release-type">
                                    <option selected value="">-- Release Type --</option>
                                    <option value="New"
                                            @if($release_type=="New") selected @endif >
                                        New
                                    </option>
                                    <option value="Back"
                                            @if($release_type=="Back") selected @endif>
                                        Back
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">
                                <select class="form-control" name="environment"
                                        id="environment">
                                    <option selected value="">-- Enviroment --</option>
                                    <option value="development"
                                            @if($environment=='development') selected @endif >
                                        Development
                                    </option>
                                    <option value="staging"
                                            @if($environment=='staging') selected @endif >
                                        Staging
                                    </option>
                                    <option value="production"
                                            @if($environment=='production') selected @endif >
                                        Production
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group flex-nowrap">

                                <select class="form-control " name="deploy_server_id"
                                        id="deploy-server">
                                    <option selected value="">
                                        -- Deploy Server --
                                    </option>
                                    @foreach($deploy_server as $key => $value)
                                        <option
                                            value={{$value->id}} @isset($deploy_server_id) @if($deploy_server_id==$value->id) selected @endif @endisset>
                                            {{$value->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <button class="btn btn-success mr-2" type="submit">Search</button>
                        <button id="reset-search-form" type="button" class="btn btn-danger ml-2">Reset</button>
                    </div>

                </form>

            </div>
        </div>
        <div class="card-body">
            <div class="select-perpage">
                <form method="get"
                      action="{{route($currentRoute,['user_id'=>$user_id])}}">
                    Show
                    <select name="perPage" onchange="this.form.submit()">
                        <option value="5" @if($perPage == "5") selected @endif>5</option>
                        <option value="10" @if($perPage == "10") selected @endif>10</option>
                        <option value="15" @if($perPage == "15") selected @endif>15</option>
                        <option value="20" @if($perPage == "20") selected @endif>20</option>
                    </select>
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <input type="hidden" name="user_name"
                           value="{{$user_name}}">
                    <input type="hidden"
                           name="redmine_id"
                           value="{{$redmine_id}}">
                    <input type="hidden" name="release_type" value="{{$release_type}}">
                    <input type="hidden" name="environment"
                           value="{{$environment}}">
                    <input type="hidden" name="deploy_server_id"
                           value="{{$deploy_server_id}}">
                </form>
            </div>
            <div class="data-table table-responsive-md">
                <div class="table-log">
                    <table class="table table-hover table-bordered" style="font-size: 13px;">
                        <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Log ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">User name</th>
                            <th scope="col">Deploy Server</th>
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
                                    @if($log->release_type=="New")
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
            <div class="pagination d-flex justify-content-center mt-2">
                {{$logReleaseList->appends(request()->input())->links()}}
            </div>


        </div>
    </div>
@endsection
@section('script')
    <script>
        const btnReset = document.getElementById("reset-search-form");
        const inputUserID = document.getElementById("user-id");
        const inputUserName = document.getElementById("user-name");
        const inputRedmineID = document.getElementById("redmine-id");
        const inputVersion = document.getElementById("version");
        const selectRelease = document.getElementById("release-type");
        const selectEnvironment = document.getElementById("environment");
        const selectDeployServer = document.getElementById("deploy-server");
        btnReset.addEventListener("click", function () {
            inputUserID.value = "";
            inputUserName.value = "";
            inputRedmineID.value = "";
            inputVersion.value = "";
            selectRelease.selectedIndex = "0";
            selectEnvironment.selectedIndex = "0";
            selectDeployServer.selectedIndex = "0";
        });
    </script>
@endsection

