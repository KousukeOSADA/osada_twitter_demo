@php
    $user = __('Edit') . ': ' . $post->user->name;
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $user }}</h1>
<form action="{{ url('posts/'.$post->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="tweet">{{ __('Tweet') }}</label>
        <textarea id="tweet" class="form-control" name="tweet" rows="8" required>{{ $post->tweet }}</textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-success">{{ __('Submit') }}</button>
</form>
@endsection
