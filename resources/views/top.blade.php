
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card top_wrap">
                <div class="card-header">{{ __('北斎漫画や浮世絵のニュースを毎日更新!!') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('日替わりで北斎漫画を楽しもう') }}
                </div>
                <ul class="channels" id="channels">
                    <li id="top" class="channel_section pickup"><div class=""><router-link to="/">本日の北斎漫画</router-link></div></li>
                    <li id = "sinbutu" class= "channel_section"><div class=""><router-link to="/sinbutu">神仏,神話</router-link></div></li>
                    <li id = "edopeople" class= "channel_section"><div class=""><router-link to="/edopeople">江戸の人々</router-link></div></li>
                    <li id = "animal" class= "channel_section"><div class=""><router-link to="/animal">動物</router-link></div></li>
                    <li id="youkai" class= "channel_section"><div class=""><router-link to="/youkai">妖怪</router-link></div></li>
                    <li id = "news" class= "channel_section"><div class=""><router-link to="/news">浮世絵ニュース</router-link></div></li>
                    <li class="channel_section"><div class=""><router-link to="/example">管理人youutube</router-link></div></li>
                    <li class= "channel_section"><div class="">でじたる北斎漫画びよりについて</div></li>
                </ul>
                <div id="app">
                    <router-view></router-view>
                </div>
                <div class=""><router-link to="/privacy_policy">プライバシープライバシー</router-link></div>
            </div>
        </div>
    </div>
</div>
@endsection

