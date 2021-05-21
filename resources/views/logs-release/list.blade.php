@extends('layouts.system-admin')

@section('title', 'Log Release List')

@section('sidebar')
    @parent
@endsection

@section('style')




@endsection
<style>
    .search-group {
        margin: 20px 0px 25px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .search-group .input-search {
        width: 50%;

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
    <div class="data-table table-responsive-md">

        <form action="{{route('Version Deploy.Deploy index.Get Log Release By User Keyword')}}" method="get">
            @csrf
            <div class="search-group">
                <div class="input-search">
                    <input class="form-control" id="exampleDataList" placeholder="Type to search..." required>
                </div>

                <div class="">

                    <select class="form-control " id="exampleFormControlSelect1" name="filter_field">
                        <option selected disabled>Filter</option>
                        <option value="user_id">User ID</option>
                        <option value="user_name">User name</option>
                        <option value="redmine_id">Redmine ID</option>
                        <option value="version">Version</option>

                    </select>
                </div>
                <div class="">
                    <select class="form-control " id="exampleFormControlSelect1">
                        <option selected disabled>Release Type</option>
                        <option value="0">New</option>
                        <option value="1">Back</option>
                    </select>
                </div>
                <div class="">
                    <select class="form-control " id="exampleFormControlSelect1" >
                        <option selected disabled>Enviroment</option>
                        <option value="development">Development</option>
                        <option value="staging">Staging</option>
                        <option value="production">Production</option>
                    </select>
                </div>


                <button class="btn btn-success" type="submit">Search</button>
        </form>
    </div>

    </div>

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

@endsection

