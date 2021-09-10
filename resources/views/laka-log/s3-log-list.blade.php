@extends('layouts.system-admin')

@section('title', $titlePage)

@section('content')
    <!-- TITLE -->
@section('header_page')
    <h2 class="card-header px-0">
        @lang($headerPage)
    </h2>
@show

<div class="card-body px-0">
    @section('message_content')
        @if (session('message'))
            <x-alert type="info" dismissible>{{session('message')}}</x-alert>
        @endif
    @show
    @section('caption_page')
            <x-form route="laka-log.index">
            <x-form-group :inline="true">
                <div class="col-2">
                    <x-datepicker name="dtFrom" :value="$dtFrom" />
                </div>
                <span>~</span>
                <div class="col-2">
                    <x-datepicker name="dtTo" :value="$dtTo" />
                </div>
                <x-button type="submit" variant="primary" text="Search" />
            </x-form-group>
        </x-form>
    @show
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr scope="header">
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['paginator']->items() as $key => $value)
            <tr scope="row">
                <td>{{$key}}</td>
                <td>{{$value['name']}}</td>
                <td>
                    <div>
                        <form action="{{route('laka-log.download-log')}}" method="POST">
                            @csrf
                            {!! Form::hidden('name', $value['name']) !!}
                            @if($value['isDownloaded'] == true)
                                <button type="submit" class="btn btn-sm btn-secondary" disabled>
                                    <i class="fas fa-download"></i>
                                </button>
                            @else
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-download"></i>
                                </button>
                            @endif
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--        @if ($data->hasMorePages())--}}
{{--            <li><a href="{{ $data->nextPageUrl() }}" rel="next">→</a></li>--}}
{{--        @else--}}
{{--            <li class="disabled"><span>→</span></li>--}}
{{--        @endif--}}

        @if ($data['paginator']->lastPage() > 1)
            <ul class="pagination">
                <li class="{{ ($data['paginator']->currentPage() == 1) ? ' disabled' : '' }} page-item">
                    <a class="page-link" href="{{ $data['paginator']->url(1) }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $data['paginator']->lastPage(); $i++)
                    <li class="{{ ($data['paginator']->currentPage() == $i) ? ' active' : '' }} page-item">
                        <a class="page-link" href="{{ $data['paginator']->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="{{ ($data['paginator']->currentPage() == $data['paginator']->lastPage()) ? ' disabled' : '' }} page-item">
                    <a class="page-link" href="{{ $data['paginator']->url($data['paginator']->currentPage()+1) }}" >Next</a>
                </li>
            </ul>
        @endif
</div>

@yield('footer_page')
@endsection

@push('scripts')
    <script>
        (function($) {
            var grid = "#gridData";
            var filterForm = "";
            var searchForm = "";
            _grids.grid.init({
                id: grid,
                filterForm: filterForm,
                dateRangeSelector: '.date-range',
                searchForm: searchForm,
                pjax: {
                    pjaxOptions: {
                        scrollTo: false,
                    },
                    // what to do after a PJAX request. Js plugins have to be re-intialized
                    afterPjax: function(e) {
                        _grids.init();
                    },
                },
            });
            _grids.init()

        })(jQuery);
    </script>
@endpush
