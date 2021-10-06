@extends('admin::layouts.master')

@section('content')
@include('ckfinder::setup')

<script>
	CKFinder.start();
</script>
@endsection
