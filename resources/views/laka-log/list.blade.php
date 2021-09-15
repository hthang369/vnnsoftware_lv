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
    @parent
@endsection