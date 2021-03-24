@extends('admin::layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ trans('admin::configs.web_card_title') }}</h3>
            </div>
            <div class="card-body">
                {!! form($form) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ trans('admin::configs.web_card_home') }}</h3>
            </div>
            <div class="card-body">
                {!! form($formHome) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ trans('admin::configs.web_card_map') }}</h3>
            </div>
            <div class="card-body">
                {!! form($formMap) !!}
            </div>
        </div>
    </div>
</div>
@endsection
