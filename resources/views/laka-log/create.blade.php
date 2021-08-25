@extends('components.system-admin.form')

@section('body_content')
<x-form method="POST" route="laka-log.store">
<div class="row">
    <div class="col-3">
        <ul class="list-group">
            @foreach ($data['files'] as $file)
            <li class="list-group-item w-100">{{$file}}</li>
            {!! Form::hidden('files[]', $file) !!}
            @endforeach
        </ul>
    </div>
    <div class="col-9">
        <x-button variant="primary" text="Parse" type="submit" />
    </div>
</div>
</x-form>
@endsection
