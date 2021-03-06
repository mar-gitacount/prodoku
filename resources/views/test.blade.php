@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                タレコミ一覧
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    </thead>
                    <tbody>
                        @foreach ($tarekomis as $item)
                        @csrf
                        <tr>
                            <td class="table-text">
                                <div class="table-text">
                                    <a href="{{ route('testarticle', ['tarekomi' => $item->id])}}">
                                        {{$item -> title}}
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <td class="table-text">
                            <div class="table-text">
                                <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="file">
                                    <button type="submit">保存</button>
                                </form>
                            </div>
                        </td>
                        <tr>
                            <td>
                                <img src="{{ Storage::disk('s3')->url("cFkb9hkHsKOoz4r9UjAX81DNEKuJdS2wklMzsPe2.png")}}" class="card-img-top" alt="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div id="tarekomiapi">
                                    <tarekomiapicomponent></tarekomiapicomponent>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
