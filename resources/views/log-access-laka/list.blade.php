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
            List Log Access Laka
        </div>
        <div class="card-body">
            @if(!in_array('LMT log manage.Search Log Access Laka',$NOT_HAS_PERMISSION))
                <div class="search-form">
                    <form method="get" action="{{route('LMT log manage.Search Log Access Laka')}}">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Result</span>
                                    </div>
                                    <select class="custom-select" name="result"
                                            id="result">
                                        <option selected value="">Choose...</option>

                                        <option value="success" @if($oldRequest['result']=='success') selected @endif>
                                           Success
                                        </option>
                                        <option value="error" @if($oldRequest['result']=='error') selected @endif>
                                            Error
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Year</span>
                                    </div>
                                    <select class="custom-select" name="year"
                                            id="year">
                                        <option selected value="">Choose...</option>
                                        @foreach($listYear as $key => $year)
                                            <option value="{{$year}}"
                                                    @if($oldRequest['year']==$year) selected @endif>{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Month</span>
                                    </div>
                                    <select class="custom-select" name="month"
                                            id="month">
                                        <option selected value="">Choose...</option>
                                        @foreach($listMonth as $key=> $month)
                                            <option value="{{$key+1}}"
                                                    @if($oldRequest['month']==$key+1) selected @endif>{{$month}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Date</span>
                                    </div>
                                    <select class="custom-select" name="day"
                                            id="day">
                                        <option selected value="">Choose...</option>
                                        @foreach($listDay as $value=> $day)
                                            <option value="{{$day}}"
                                                    @if($oldRequest['day']==$day) selected @endif>{{$day}}</option>
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
            @endif
        </div>
        <div class="card-body">
            <div class="select-perpage">
                <form method="get"
                      action="{{route($currentRoute)}}">
                    Show
                    <select name="perPage" onchange="this.form.submit()">
                        <option value="5" @if($perPage == "5") selected @endif>5</option>
                        <option value="10" @if($perPage == "10") selected @endif>10</option>
                        <option value="15" @if($perPage == "15") selected @endif>15</option>
                        <option value="20" @if($perPage == "20") selected @endif>20</option>
                    </select>

                    @if($oldRequest!=null)
                        <input type="hidden" name="result" value="{{$oldRequest['result']}}">
                        <input type="hidden" name="day"
                               value="{{$oldRequest['day']}}">
                        <input type="hidden"
                               name="month"
                               value="{{$oldRequest['month']}}">
                        <input type="hidden" name="year" value="{{$oldRequest['year']}}">
                    @endif
                </form>
            </div>
            <div class="data-table table-responsive-md">
                <div class="table-log">
                    <table class="table table-hover table-bordered" style="font-size: 13px;">
                        <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Log ID</th>
                            <th scope="col">Date Sent Request</th>
                            <th scope="col">Time Sent Request</th>
                            <th scope="col">Result</th>
                            <th scope="col">Message</th>
                            <th scope="col">Url Download</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $log)
                            <tr class="text-center">
                                <td>{{ $log->id }}</td>
                                <td>
                                    <p><b>{{$log->date_sent_request}}</b></p>
                                </td>
                                <td>
                                    <p><b>{{$log->time_sent_request}}</b></p>
                                    <p>{{ Carbon\Carbon::createFromTimeStamp(strtotime($log->time_sent_request))->diffForHumans() }}</p>
                                </td>
                                <td>
                                    {{$log->result}}
                                </td>
                                <td>{{$log->message}}</td>
                                <td style="word-break: break-all">
                                    <a href="{{$log->url_download}}">{{$log->url_download}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination d-flex justify-content-center mt-2">
                {{$list->appends(request()->input())->links()}}
            </div>
        </div>

    </div>
    </div>
@endsection
@section('script')
    <script>
        const btnReset = document.getElementById("reset-search-form");
        const selectYear = document.getElementById("year");
        const selectMonth = document.getElementById("month");
        const selectDay = document.getElementById("day");
        const selectResult = document.getElementById("result");
        btnReset.addEventListener("click", function () {
            selectResult.selectedIndex = "0";
            selectYear.selectedIndex = "0";
            selectMonth.selectedIndex = "0";
            selectDay.selectedIndex = "0";
        });
    </script>
@endsection
