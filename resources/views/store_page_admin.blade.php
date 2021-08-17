<!DOCTYPE html>
<html lang="ja">

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

<body>
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h4 mb-4 font-weight-bold">
                youtube投稿
            </h1>
            <form method="post" action="{{route('admin.store')}}">
                @csrf
                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="name">
                            youtubeid
                        </label>
                        <input id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="匿名希望" value="{{ old('name') }}" type="text">
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">
                            youtubeタイトル
                        </label>
                        <input id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" type="text">
                        @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tarekomigunle">
                            ジャンル
                        </label>
                        <div class="">
                            <select name="gunle">
                                @foreach (config('tarekomigunle') as $key => $tarekomigunle)
                                <option value="{{$key}}">{{ $tarekomigunle['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-grop">
                        <label for="message">
                        iframe
                        </label>
                        <textarea name="message" id="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" cols="30" rows="10">
                        {{ old('message') }}
                        </textarea>
                        @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                        @endif
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">
                            確認する。
                        </button>
                    </div>
                </fieldset>
            </form>
        <div>
    </div>
</body>

</html>
