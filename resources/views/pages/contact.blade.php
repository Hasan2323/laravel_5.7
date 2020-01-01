@extends('layout') {{-- don't need to put semicolon at the end --}}

@section('content')

    <h2>This is the contact Page - {{ $title }}</h2>

    @foreach($tasks as $task)
        <ul>
            <li>{{ $task }}</li>
        </ul>
    @endforeach

@endsection

@section('title', 'Contact Us') {{-- evabe o dewa jai --}}


