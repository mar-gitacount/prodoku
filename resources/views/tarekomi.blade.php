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
                        名前
                    </label>
                    <input
                        id="name"
                        name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
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
                        タイトル
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
                    <select>
                        @foreach (config('tarekomigunle') as $key => $tarekomigunle)
                            <option value="{{$key}}">{{ $tarekomigunle['label'] }}</option>
                            
                        @endforeach
                    </select>
                </div>
            </fieldset>
        </form>
    <div>
</div>




@endsection
