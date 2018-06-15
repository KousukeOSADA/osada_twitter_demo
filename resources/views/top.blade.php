@php
    $title = config('app.name');
@endphp

@extends('layouts.my')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<p>
    {{ __('by KosukeOSADA.') }}
</p>
@endsection
