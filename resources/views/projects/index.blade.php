@extends('projects.layout')

@section('title')
    Projects
@endsection

@section('content')

    <div class="navbar">

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

    </div>

    <h1 class="title">Projects list!</h1>

    <a href="/projects/create" class="button is-link">Create</a>

    @foreach($records as $record)

        <ul>
            <li><a href="/projects/{{ $record->id }}">{{ $record->title }}</a></li>
        </ul>

    @endforeach

@endsection



