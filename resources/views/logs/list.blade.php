@extends('layouts.system-admin')

@section('content')

<style>

  .table-log{
    position:relative;
    width:100%;
    height: 800px;
    overflow-y: scroll;
  }
  .table-log table{
    position:absolute;
    width:1400px;
    height:100%;
  }

  @media screen and (max-width: 1400px) {
    .table-log{
      height:500px;
      overflow-x: scroll;
      overflow-y: scroll;
    }
  }

</style>
<div class="table-log">
  <table class="table table-hover table-bordered" style="font-size: 13px;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Subject</th>
        <th scope="col">Url</th>
        <th scope="col">Method</th>
        <th scope="col">Ip</th>
        <th scope="col">User_id</th>
        <th scope="col">User_name</th>
        <th scope="col">Time</th>
        <th scope="col">Agent</th>
        <th scope="col">Input</th>
      </tr>
    </thead>
    <tbody>
      @foreach($logs as $log)
          <tr>
            <th scope="row">{{ $log->id }}</th>
            <td width="250px"><b>{{ $log->subject }}</b></td>
            <td>{{ $log->url }}</td>
            <td>{{ $log->method }}</td>
            <td>{{ $log->ip }}</td>
            <td>{{ $log->user_id }}</td>
            <td><a href="{{ route('Log Activity By User Id', $log->user_id) }}">{{ $log->user_name }}</a></td>
            <td width="140px">
                <p>{{ Carbon\Carbon::createFromTimeStamp(strtotime($log->created_at))->diffForHumans() }}</p>
                <p>{{ $log->created_at }}</p>
            </td>
            <td width="250px">{{ $log->agent }}</td>
            <td style="width:350px;word-break:break-all">{{ $log->input }}</td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>

  {{ $logs->links() }}

@endsection