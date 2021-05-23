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

{{--            <div class="card-header">--}}
{{--                Search Data--}}
{{--            </div>--}}
            <div class="card-body">
                <div class="search-form">
                    <form action="{{route('Version Deploy.Deploy index.Search LogRelease')}}" method="post">
                        @csrf

                        <div class="search-group">
                            <div class="input-search">
                                <input name="keyword" class="form-control" id="exampleDataList"
                                       placeholder="Type to search..."
                                       required>
                            </div>
                            {{--                <div class="form-check form-check-inline">--}}
                            {{--                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">--}}
                            {{--                    <label class="form-check-label" for="inlineCheckbox1">User ID</label>--}}
                            {{--                </div>--}}
                            {{--                <div class="form-check form-check-inline">--}}
                            {{--                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">--}}
                            {{--                    <label class="form-check-label" for="inlineCheckbox1">User ID</label>--}}
                            {{--                </div>--}}
                            {{--                <div class="form-check form-check-inline">--}}
                            {{--                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">--}}
                            {{--                    <label class="form-check-label" for="inlineCheckbox1">User ID</label>--}}
                            {{--                </div>--}}
                            {{--                <div class="form-check form-check-inline">--}}
                            {{--                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">--}}
                            {{--                    <label class="form-check-label" for="inlineCheckbox2">2</label>--}}
                            {{--                </div>--}}
                            {{--                <div class="">--}}

                            {{--                    <select class="form-control " id="exampleFormControlSelect1" name="filter_field">--}}
                            {{--                        <option selected disabled>Field Filter</option>--}}
                            {{--                        <option value="user_id">User ID</option>--}}
                            {{--                        <option value="user_name">User name</option>--}}
                            {{--                        <option value="redmine_id">Redmine ID</option>--}}
                            {{--                        <option value="version">Version</option>--}}

                            {{--                    </select>--}}
                            {{--                </div>--}}
                            {{--                <div class="">--}}
                            {{--                    <select class="form-control " id="exampleFormControlSelect1">--}}
                            {{--                        <option selected disabled>Release Type</option>--}}
                            {{--                        <option value="0">New</option>--}}
                            {{--                        <option value="1">Back</option>--}}
                            {{--                    </select>--}}
                            {{--                </div>--}}
                            {{--                <div class="">--}}
                            {{--                    <select class="form-control " id="exampleFormControlSelect1">--}}
                            {{--                        <option selected disabled>Enviroment</option>--}}
                            {{--                        <option value="development">Development</option>--}}
                            {{--                        <option value="staging">Staging</option>--}}
                            {{--                        <option value="production">Production</option>--}}
                            {{--                    </select>--}}
                            {{--                </div>--}}

                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Advance Search
                            </button>
                            <button class="btn btn-success" type="submit">Search</button>
{{--                            <div class="">--}}
{{--                                <p>--}}
{{--                                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">--}}
{{--                                        Link with href--}}
{{--                                    </a>--}}
{{--                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">--}}
{{--                                        Button with data-target--}}
{{--                                    </button>--}}
{{--                                </p>--}}
{{--                                <div class="collapse" id="collapseExample">--}}
{{--                                    <div class="card card-body">--}}
{{--                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </form>
                </div>
            </div>

{{--        <div class="card-body">--}}
{{--            --}}
{{--        </div>--}}
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
                                {{--                    <td><a href="{{ route('Log Activity By User Id', $log->user_id) }}">{{ $log->user_name }}</a></td>--}}
                                {{--                    <td width="140px">--}}
                                {{--                                            <p>{{ Carbon\Carbon::createFromTimeStamp(strtotime($log->created_at))->diffForHumans() }}</p>--}}
                                {{--                                            <p>{{ $log->created_at }}</p>--}}
                                {{--                    </td>--}}
                                {{--                    <td width="250px">{{ $log->agent }}</td>--}}
                                {{--                    <td style="width:350px;word-break:break-all">{{ $log->input }}</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

