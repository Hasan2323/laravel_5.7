@extends('projects.layout')

@section('title')
    Projects
@endsection

@section('content')

    <h1 class="title">Projects list!</h1>

    <a href="/projects/create" class="button is-link">Create</a>

    @foreach($records as $record)

        <ul>
            <li><a href="/projects/{{ $record->id }}">{{ $record->title }}</a></li>
        </ul>

    @endforeach

@endsection



