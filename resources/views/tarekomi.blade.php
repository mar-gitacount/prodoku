@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            インフルエンサーのタレコミをする。
        </h1>
        <form method="post" action="{{route('store')}}">
            @csrf
            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        あなたの名前(匿名でも構いません)
                    </label>
                    <input
                        id="name"
                        name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="匿名希望" 
                        value="{{ old('name') }}"
                        type="text"
                    >
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        タイトル(オンラインサロンや宗教の場合そのリーダーや教祖の名前も一緒に記載して下さいね)
                    </label>
                    <input
                        id="title"
                        name="title"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                        value="{{ old('title') }}"
                        type="text"
                    >
                    @if ($errors->has('subject'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subject') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tarekomigunle">
                        ジャンル
                    </label>
                    <div class="">
                        <select>
                            @foreach (config('tarekomigunle') as $key => $tarekomigunle)
                                <option value="{{$key}}">{{ $tarekomigunle['label'] }}</option>
                                dump($key);
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-grop">
                    <label for="message">
                        内容:10000文字で以内でお願いします。細かい日付や時間を記載しても良いですし、ざっくりした内容でも大丈夫です。
                    </label>
                    <textarea name="message" id="message"  class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" cols="30" rows="10">
                        {{ old('message') }}
                    </textarea>
                </div>
            </fieldset>
        </form>
    <div>
</div>




@endsection
