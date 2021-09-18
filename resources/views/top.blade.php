
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card top_wrap">
                <div class="card-header">{{ __('北斎漫画や浮世絵のニュースを毎日更新!!') }}
                <!-- <div class="search_wrap"><img id="search_megane" src="https://masarubucket.s3.ap-northeast-1.amazonaws.com/hokusaimanga/search/magnifying-glass.png" alt=""></div> -->
                </div>
                {{$update}}
                <ul class="channels" id="channels">
                    <li id="top" class="channel_section pickup"><div class=""><router-link to="/">本日の北斎漫画</router-link></div></li>
                    <li id = "sinbutu" class= "channel_section"><div class=""><router-link to="/sinbutu">神仏,神話</router-link></div></li>
                    <li id = "edopeople" class= "channel_section"><div class=""><router-link to="/edopeople">江戸の人々</router-link></div></li>
                    <li id = "animal" class= "channel_section"><div class=""><router-link to="/animal">動物</router-link></div></li>
                    <li id = "youkai" class= "channel_section"><div class=""><router-link to="/youkai">妖怪</router-link></div></li>
                    <li id = "news" class= "channel_section"><div class=""><router-link to="/news">浮世絵ニュース</router-link></div></li>
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

