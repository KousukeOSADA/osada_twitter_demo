@extends('layouts.my')
@section('content')
<h1>{{ $user->name }}<font size="5" color="#777777">{{ '@'.$user->id }}</font></h1>

<!-- フォローボタン -->
@if(auth()->user()->isFollowing($user->id))
<form action="{{route('unfollow', ['id' => $user->id])}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" id="delte-follow-{{ $user->id }}" class="btn btn-danger">
      {{ __('UnFollow') }}
    </button>
</form>
@else
<form action="{{route('follow', ['id' => $user->id])}}" method="post">
    {{ csrf_field() }}
    <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-primary">
      {{ __('Follow') }}
    </button>
</form>
@endif

<!-- ツイートリスト -->
<br>
<h2>{{ __('Tweets') }}</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Tweets') }}</th>
                <th>{{ __('Created') }}</th>
                <th>{{ __('Updated') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->posts as $post)
                <tr>
                    <td>{{ $post->tweet }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                 </tr>
            @endforeach
        </tbody>
    </table>
</div>
</br>
@endsection
