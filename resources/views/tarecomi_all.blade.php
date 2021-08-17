<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '確バイアス防止ツール') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>
<div class="container mt-4">
    <div class="p-4 bg-info ">
        @foreach ($tarecomi_all as $item)
        <form method="post" action="{{ route('admin.edit', ['id' => $item->id])}}" >
        {{ csrf_field() }}
            <div class="form-group">
                <div class="border-bottom row">
                        <label class="col-sm-2 control-label" for="name">名前</label>
                        <!-- <div class="col-sm-10"> {{$item -> name}}</div> -->
                        <input id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"  value="{{$item -> name}}" type="text">
                </div>
            </div>
            <div class="form-group">
                <div class="border-bottom row">
                        <label class="col-sm-2 control-label" for="gunle">ジャンル：</label>
                        <select name="gunle">
                                @foreach (config('tarekomigunle') as $key => $tarekomigunle)
                                <option value="{{$item -> gunle}}">{{ $tarekomigunle['label'] }}</option>
                                @endforeach
                        </select>
                </div>
            </div>
            <div class="form-group">
                <div class="border-bottom row">
                    <label class="col-sm-2 control-label" for="title">タイトル：</label>
                    <input id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"  value="{{$item -> title}}" type="text">
                </div>
            </div>
            <div class="form-group">
                <div class="border-bottom row">
                    <label class="col-sm-2 control-label" for="message">メッセージ：</label>
                    <textarea class="form-control" rows="200" cols="100" name="message" name="contents" id="message" style="resize:none">
                        {{$item -> message}}
                    </textarea>
                </div>
            </div>
            <div class="border-bottom row">
                <label class="col-sm-2 control-label" for="message">id：</label>
                <div class="col-sm-10"> {{$item -> id}}</div>
            </div>
            <div class="mt-5">
                <input type="submit" class="btn btn-primary" value = "編集する" onclick='return confirm("編集しますか?");'>
            </div>
        </form>
        <div class="">
            <form action="{{ route('admin.delete', ['id' => $item->id])}}" method="post">
                @method('DELETE')
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger" value="削除する" onclick='return confirm("削除しますか?");'>
            </form> 
        </div>
        @endforeach
        <div class="mt-10">
            <button class="btn btn-secondary" onclick="history.back(-1)">戻る</button>
        </div>
    </div>
</div>

</html>
