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
                </div>
                <ul class="channels" id="channels">
                    <li class="channel_section channel_section_achtive pickup"><div class=""><router-link to="/">本日の北斎漫画</router-link></div></li>
                    <li class= "channel_section"><div class="">北斎漫画日和について</div></li>
                    <li class="channel_section"><div class=""><router-link to="/example">管理人youutube</router-link></div></li>
                </ul>
                <div id="app">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
</script>
</body>
</html>
