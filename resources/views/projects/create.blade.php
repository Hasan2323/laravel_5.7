@extends('projects.layout')

@section('title', 'Create project')


@section('content')

    <h1 class="title">Create a new Project</h1>

    @include('formErrors')

    <form action="/projects" method="post">

        @csrf

        <div class="field">
            <label class="label" for="title">Title:</label>
            <div class="control">
                <input type="text" name="title" class="input {{ ($errors->has('title') ? 'is-danger' : '') }}" placeholder="Enter title" value="{{ old('title') }}" required>
            </div>
        </div>


        <div class="form-group">
            <label class="label" for="description">Description:</label>
            <div class="control">
                <textarea name="description" class="textarea {{ ($errors->has('description') ? 'is-danger' : '') }}" placeholder="Enter Description" required>{{ old('description') }}</textarea>
            </div>
        </div><br>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Project</button>
            </div>
        </div>

    </form>

@endsection