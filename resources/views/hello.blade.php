@extends('layout')

@section('content')

    <h1>Welcome to our site {{ $foo }}</h1>

    @foreach($tasks as $task)
        <ul>
            <li>{{ $task }}</li>
        </ul>
    @endforeach

@endsection