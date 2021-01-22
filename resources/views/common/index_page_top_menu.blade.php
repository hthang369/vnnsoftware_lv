@extends('layouts.system-admin')

@section('title', 'Company Details')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="alert alert-info mt-4" role="alert">
        @foreach($TOPMENU as $itemTop)
            @if(substr(Route::currentRouteName(), 0, strpos(Route::currentRouteName(), '.')) == $itemTop->group)
                {{$itemTop->description}}
                @break
            @endif
        @endforeach
    </div>
@endsection
