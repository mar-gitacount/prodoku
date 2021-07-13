@extends('layouts.app')

@section('content')

@foreach ($input as $item)
    {{$item}}
@endforeach
@endsection