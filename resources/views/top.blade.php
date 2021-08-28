<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
</head>
<body>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card top_wrap">
                <div class="card-header">{{ __('毎日変わる北斎漫画サイト') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('今日も北斎を楽しもう') }}
                    <router-link to="/example">example</router-link>
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
<script>
    
</script>
</body>
</html>
