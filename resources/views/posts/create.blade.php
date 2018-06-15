@php
    $title = __('いまなにしてる？');
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>
<form action="{{ url('posts') }}" method="post">
    {{ csrf_field() }}
    {{ method_field('POST') }}

    <div class="form-group">
        <label for="tweet">{{ __('下書き') }}</label>
        <textarea id="tweet" class="form-control" name="tweet" rows="8" required></textarea>
    </div>
    @if($errors->any())
    <div class="errors">
      @foreach($errors->all() as $error)
        <p><font color="red">{{ $error }}</p>
      @endforeach
    </div>
    @endif
    <button type="submit" name="submit" class="btn btn-success">{{ __('ツイートする') }}</button>
</form>
@endsection
