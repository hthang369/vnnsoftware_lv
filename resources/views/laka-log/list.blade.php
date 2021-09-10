@extends('components.system-admin.list')

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
    {{--    @parent--}}
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr scope="header">
            <td>No.</td>
            <td>Name</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
            @foreach($data as $name)
                <tr scope="row">
                    <td>1</td>
                    <td>{{$name}}</td>
                    <td>
                        <div>
                            <a class="btn btn-sm btn-primary" href="{{route('laka-log.download-record')}}" title="table.btn_edit">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

