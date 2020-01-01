@extends('projects.layout')

@section('title', 'Edit project')

@section('content')

    <h1 class="title">Edit Project</h1>

    @include('formErrors')

    <form action="/projects/{{ $project->id }}" method="post" style="margin-bottom: 1em;">

        @csrf

        @method('PATCH')

        <div class="field">
            <label class="label" for="title">Title:</label>
            <div class="control">
                <input type="text" name="title" class="input" placeholder="title" value="{{ $project->title }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description:</label>
            <div class="control">
                <textarea name="description" class="textarea" required>{{ $project->description }}</textarea>
            </div>
        </div>


        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>

    </form>

    <form action="/projects/{{ $project->id }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Delete Project</button>
            </div>
        </div>

    </form>

@endsection