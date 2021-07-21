@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in') }}
                </div>
                <div id="app">
                    <example-component></example-component>
                </div>
            </div>
        </div>
        {{-- {{$tarekomis}} --}}
        {{-- @foreach ($tarekomis as $item)
            {{$item}}
        @endforeach --}}
    </div>
</div>
@endsection