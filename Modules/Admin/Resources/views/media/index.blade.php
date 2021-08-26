@extends('admin::layouts.master')

@section('content')
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="{{route('ckfinder_browser')}}"></iframe>
</div>
@endsection
