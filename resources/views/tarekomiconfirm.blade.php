@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="p-4　bg-info d-flex align-items-center justify-content-center">
        <form method="post" action="{{route('store')}}">
        @csrf
            <div class="row">
            <label class="col-sm-2 control-label" for="username">名前：</label>
            <div class="border col-sm-10">  {{$input["name"]}}</div>
            </div>
            <div class="row">
                <label class="col-sm-2 control-label" for="gunle">ジャンル：</label>
                <div class="border col-sm-10">  {{$input["gunle"]}}</div>
            </div>
            <div class="row">
                <label class="col-sm-2 control-label" for="title">タイトル：</label>
                <div class="border col-sm-10">  {{$input["title"]}}</div>
            </div>
            <div class="row">
                <label class="col-sm-2 control-label" for="message">メッセージ：</label>
                <div class="border col-sm-10">  {{$input["message"]}}</div>
            </div>
        </form>
    </div>
</div>  
@endsection