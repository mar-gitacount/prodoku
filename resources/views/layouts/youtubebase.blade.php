@extends('layouts.app')
@section('content')
<div class="container">
    <div class="items">{{$items}}</div>
    <div id="app">
        <youtubebaseviewcomponent></youtubebaseviewcomponent>
    </div>
    <div class="basecontact">
    @yield('basecontent')
    </div>
</div>
@endsection
