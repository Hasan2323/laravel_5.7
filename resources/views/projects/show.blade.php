@extends('projects.layout')

@section('content')

    <h1 class="title">{{ $project->title }}</h1>

    <div class="content">{{ $project->description }}</div>

    @can('view', $project)

        <p>
            <a href="/projects/{{ $project->id }}/edit" class="button is-link">Edit</a>
        </p>
        <h1>Only Account owner can see this line</h1>

    @endcan



    @if($project->tasks->count())
        <div>
            <div>
                @foreach($project->tasks as $task)

                    <form action="/tasks/{{ $task->id }}" method="post" style="margin-top: 1em;">
                        @csrf
                        @method('PATCH')

                        <label class="checkbox" for="completed">
                            <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                            <span class="{{ $task->completed ? 'is-complete' : ''}}">{{ $task->description }}</span>
                            @if($task->completed)
                                <span>&#9989;</span>
                            @else
                                <span>&#10062;</span>
                            @endif
                        </label>

                    </form>

                @endforeach
            </div>
        </div>
    @endif
    <br>

    @can('view', $project)
        <div>

            <h1 class="title">Add new Task for this project</h1>

            @include('formErrors')

            <form class="box" action="/projects/{{ $project->id }}/tasks" method="post">

                @csrf

                <div class="field">
                    <label class="label" for="description">New Task:</label>
                    <div class="control">
                        <input type="text" name="description" class="input {{ ($errors->has('description') ? 'is-danger' : '') }}" placeholder="Enter description" value="{{ old('description') }}" required>
                    </div>
                </div>

                <br>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">Add Task</button>
                    </div>
                </div>

            </form>
        </div>
    @endcan

@endsection