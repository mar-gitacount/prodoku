@extends('layouts.app')
{{-- 
　"name" => "匿名希望"
  "title" => "tesa"
  "gunle" => "5"
  "message" => "tatreta" 
--}}

@section('content')
<form action="post" >
    {{$input["name"]}}
    {{$input["gunle"]}}
    {{$input["title"]}}
    {{$input["message"]}}
</form>

@endsection