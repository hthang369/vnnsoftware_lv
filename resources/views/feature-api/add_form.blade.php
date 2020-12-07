@extends('layouts.system-admin')

@section('title', ' ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">Feature api {{request()->id ? 'update' : 'new' }}</h5>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group required">
                    <label>Feature</label>
                    <input class="form-control @error('feature') is-invalid @enderror" type="text" placeholder="Feature"
                           name="feature"
                           value="{!!request()->id ? (old('feature') ? old('feature') : $featureApi->feature) : old('feature') !!}"
                           autocomplete="name" autofocus>
                    @error('feature')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Api</label>
                    <input class="form-control @error('api') is-invalid @enderror" type="text" placeholder="Api"
                           name="api"
                           value="{!! request()->id ?(old('api') ? old('api') : $featureApi->api) :  old('api')!!}"
                           autocomplete="description">
                    @error('api')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger ml-2" href="{{ route('feature-api.list') }}" role="button">Cancel</a>
            </form>
        </div>
    </div>
@endsection
