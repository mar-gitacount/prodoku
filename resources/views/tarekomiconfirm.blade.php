@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="p-4　bg-info ">
        <form method="post" action="{{route('store')}}">
        @csrf
        　　 <div class="border-bottom row">
            　　　<label class="col-sm-2 control-label" for="name">名前</label>
            　　　<div class="col-sm-10">  {{$input["name"]}}</div>
        　　 </div>

            <div class="border-bottom row">
                <label class="col-sm-2 control-label" for="gunle">ジャンル：</label>
                <div class="col-sm-10">  {{$input["gunle"]}}</div>
            </div>
            <div class="border-bottom row">
                <label class="col-sm-2 control-label" for="title">タイトル：</label>
                <div class="col-sm-10">  {{$input["title"]}}</div>
            </div>
            <div class="border-bottom row">
                <label class="col-sm-2 control-label" for="message">メッセージ：</label>
                <div class="col-sm-10">  {{$input["message"]}}</div>
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary">
                    投稿する
                </button>
            </div>
        </form>
        <div class="mt-10">
            <button class="btn btn-secondary" onclick="history.back(-1)">戻る</button>
        </div>
    </div>
</div>  
@endsection