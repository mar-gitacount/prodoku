@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card top_wrap">
                <div class="card-header">{{ __('ライブカメラ好きのためのサイト') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('Letsprograming!!') }}
                </div>
                <div id="app">
                    <router-view></router-view>
                </div>

                <!-- <div id="navi">
                    <navigationcomponent></navigationcomponent>
                    
                </div> -->
                <!-- <div id="app">
                    <example-component></example-component>
                </div> -->
            </div>
        </div>
        {{-- {{$tarekomis}} --}}
        {{-- @foreach ($tarekomis as $item)
            {{$item}}
        @endforeach --}}
    </div>
</div>
@endsection
