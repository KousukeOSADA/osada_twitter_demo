
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
                <th>{{ __('User')}}</th>
                <th>{{ __('Tweet') }}</th>
                <th>{{ __('Created') }}</th>
                <th>{{ __('Updated') }}</th>
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
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
             </tr>
        @endif
        @endforeach
        </tbody>
    </table>
</div>
@endsection
