
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card top_wrap">
                <div class="card-header">{{ __('でじたる北斎漫画びより') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('デジタルタッチで描いた北斎漫画を楽しもう') }}
                </div>
                <ul class="channels" id="channels">
                    <li class="channel_section channel_section_achtive pickup"><div class=""><router-link to="/">本日の北斎漫画</router-link></div></li>
                    <li class= "channel_section"><div class=""><router-link to="/sinbutu">神仏,神話</router-link></div></li>
                    <li class= "channel_section"><div class=""><router-link to="/edopeople">江戸の人々</router-link></div></li>
                    <li class= "channel_section"><div class="">動物</div></li>
                    <li class= "channel_section"><div class="">妖怪</div></li>
                    <li class= "channel_section"><div class="">でじたる北斎漫画びよりについて</div></li>
                    <li class= "channel_section"><div class="">北斎ニュース</div></li>
                    <li class="channel_section"><div class=""><router-link to="/example">管理人youutube</router-link></div></li>
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

