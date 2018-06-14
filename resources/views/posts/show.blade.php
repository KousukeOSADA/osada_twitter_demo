@extends('layouts.my')
@section('content')
<h1 id="post-user">
    <font size="6">
        {{ $post->user->name }}
    </font>
    <font size="5">
        <a href="{{ url('users/'.$post->user->id) }}">
            {{ '@'.$post->user->id }}
        </a>
    </font>
</h1>


<!-- 記事内容 -->
<hr>
<div id="post-tweet">
    <dt>Tweet:</dt>
    <dd>{!! nl2br($post->tweet,true) !!}</dd>
</div>

<dl class="row">
    <dt class="col-md-2">Created:</dt>
    <dd class="col-md-10">
        <time itemprop="dateCreated" datetime="{{ $post->created_at }}">
            {{ $post->created_at }}
        </time>
    </dd>
    <dt class="col-md-2">Updated:</dt>
    <dd class="col-md-10">
        <time itemprop="dateModified" datetime="{{ $post->updated_at }}">
            {{ $post->updated_at }}
        </time>
    </dd>
</dl>

<!-- 編集・削除ボタン -->
<div class="edit">
    <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-primary">
        {{ __('Edit') }}
    </a>
    @component('components.btn-del')
        @slot('table', 'posts')
        @slot('id', $post->id)
    @endcomponent
</div>

@endsection
