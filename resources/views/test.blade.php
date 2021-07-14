@extends('layouts.app')

@section('content')
@foreach ($tarekomis as $item)
    {{$item -> message}}
@endforeach

@endsection