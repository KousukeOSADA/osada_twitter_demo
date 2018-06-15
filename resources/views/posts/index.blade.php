
@php
    $title = __('Tweets');
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('ユーザー')}}</th>
                <th>{{ __('ツイート') }}</th>
                <th>{{ __('日付') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
        @if(auth()->user()->isFollowing($post->user->id) || $post->user->id == auth()->user()->id)
            <tr>
                <td>
                    <a>
                        {{ $post->user->name }}
                    </a>
                </td>

                <td>
                  @if($post->user->id == auth()->user()->id)
                    <a href="{{ url('posts/'.$post->id) }}">{!! nl2br($post->tweet,true) !!}</a>
                  @else
                    {{ $post->tweet }}
                  @endif
                </td>
                <td>{{ $post->updated_at }}</td>
             </tr>
        @endif
        @endforeach
        </tbody>
    </table>
</div>
@endsection
