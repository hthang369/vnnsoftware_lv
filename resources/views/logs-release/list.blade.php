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
                <form method="get" action="{{route('Version Deploy.Deploy index.Search LogRelease')}}" >

                    @isset($user_id)
                        <input type="hidden" value="{{$user_id}}" name="log_user_id">
                    @endisset

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">User ID</span>
                                </div>
                                <input type="text" class="form-control" placeholder="User ID.." aria-label="Username"
                                       aria-describedby="addon-wrapping" name="user_id">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">User Name</span>
                                </div>
                                <input type="text" class="form-control" placeholder="User name.." aria-label="Username"
                                       aria-describedby="addon-wrapping" name="user_name">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Redmine ID</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Redmine ID.." aria-label="Username"
                                       aria-describedby="addon-wrapping" name="redmine_id">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Version</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Version.." aria-label="Username"
                                       aria-describedby="addon-wrapping" name="version">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Release Type</span>
                                </div>
                                <select class="form-control " id="exampleFormControlSelect1" name="release_type">
                                    <option selected disabled>Release Type</option>
                                    <option value="0">New</option>
                                    <option value="1">Back</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Enviroment</span>
                                </div>
                                <select class="form-control " id="exampleFormControlSelect1" name="environment">
                                    <option selected disabled>Enviroment</option>
                                    <option value="development">Development</option>
                                    <option value="staging">Staging</option>
                                    <option value="production">Production</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success" type="submit">Search</button>
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
                            <th scope="col">User name</th>
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

        </div>
    </div>
@endsection
<script>
    $(function () {
        var requiredCheckboxes = $('.browsers :checkbox[required]');
        requiredCheckboxes.change(function () {
            if (requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });
</script>
