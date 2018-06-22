@php
    $title = __('ユーザー一覧');
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('ナンバー') }}</th>
                <th>{{ __('名前') }}</th
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ url('users/'.$user->id) }}">{{ $user->name }}</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
