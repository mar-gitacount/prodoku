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
<div class="container">
    <div class="col-sm-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li>投稿一覧</li>
                </ul>
                <ul>
                    <li><a href="{{ route('admin.storepageadmin')}}">youtube投稿作成</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    </thead>
                    <tbody>
                        @foreach ($tarekomis as $item)
                        <tr>
                            <td class="table-text">
                                <div class="table-text">
                                    <!-- ['tarekomi' => $item->id]で値をコントローラに値を渡している。 -->
                                    <a href="{{ route('admin.article_tarekomi', ['tarekomi' => $item->id])}}">
                                        {{$item -> title}}
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <td class="table-text">
                            <div class="table-text">
                                <form action="{{route('admin.upload')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="file">
                                    <button type="submit">保存</button>
                                </form>
                            </div>
                        </td>
                        <tr>
                            <td>
                                <img src="{{ Storage::disk('s3')->url("cFkb9hkHsKOoz4r9UjAX81DNEKuJdS2wklMzsPe2.png") }}"
                                    class="card-img-top" alt="" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</html>
