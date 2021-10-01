<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@mar78780798"/>
    <meta property="og:url" content="https://hokusaimanga.herokuapp.com" /> 
    <meta property="og:title" content="HokusaiManga!!" />
    <meta property="og:description" content="毎日変わる北斎漫画の絵や浮世絵、アートに関するニュースをチェックしよう!!" />
    <meta name="twitter:image" content="https://masarubucket.s3.ap-northeast-1.amazonaws.com/youkai/IMG_4919.JPG" /> 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '北斎漫画') }}</title>
    <meta name="google-site-verification" content="yBJnoe-4vMoYIKvlBGc7xfOhwqIc5aZ9vw5mTpLBCj8" />
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/main.js') }}" defer></script>
    <!-- <script src="{{ secure_asset('js/format.js') }}" defer></script> -->
    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon1.ico">
    <link rel="icon" href="/favicon1.ico" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="ovarlay">
            <!-- <ul class="mobile-menu">
                <li id="top" class="channel_section pickup mobile-menu-item"><div class=""><router-link to="/"><span>本日の北斎漫画</span></router-link></div></li>            
                <li id="top" class="channel_section pickup mobile-menu-item"><div class=""><router-link to="/"><span>本日の北斎漫画</span></router-link></div></li>            
                <li id="top" class="channel_section pickup mobile-menu-item"><div class=""><router-link to="/"><span>本日の北斎漫画</span></router-link></div></li>            
                <li id="top" class="channel_section pickup mobile-menu-item"><div class=""><router-link to="/"><span>本日の北斎漫画</span></router-link></div></li>            
            </ul> -->
        </div>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        @yield('nav_head')
            <div class="navi-bar-container">
                <div class="navibar-title-logo">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://masarubucket.s3.ap-northeast-1.amazonaws.com/%E3%82%BF%E3%82%A4%E3%83%88%E3%83%AB%E5%80%99%E8%A3%9C2.png" alt="">
                    <!-- {{ config('app.name', '北斎漫画') }} -->
                    </a>
                </div>
                    <div class="gunle-wrap">
                        <ul>
                            <li>Japan-Culture</li>
                            <li>Japan-Culture</li>
                        </ul>
                    </div>
                <!-- <div id="search_wrap" class="">
                    <router-link to="/search"><img id="search_megane" src="https://masarubucket.s3.ap-northeast-1.amazonaws.com/hokusaimanga/search/magnifying-glass.png" alt=""></router-link>
                </div> -->
                <!-- 更新ボタンを出現させる。ローカルのみ出現する -->
                
                <!-- スマホ版のみ検索機能や北斎漫画の概要が開かれる仕組みにする。 -->
                <button class="navbar-toggler navbar-toggler-original" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon top-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
