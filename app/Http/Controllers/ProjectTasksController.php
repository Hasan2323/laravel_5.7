<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{

    public function store(Project $project)
    {
        $attributes = request()->validate([ 'description' => 'required|min:3' ]);

        $project->addTask($attributes);


//        request()->validate([
//            'description' => 'required|min:3'
//        ]);
//
//        Task::create([
//           'project_id'  => $project->id,
//           'description' => request('description')
//        ]);

        return back();
    }


    public function update(Task $task)
    {
        request()->has('completed') ? $task->complete() : $task->incomplete();
        // Or
//        $method = request()->has('completed') ? 'complete' : 'incomplete';
//
//        $task->$method();





        //$task->complete(request()->has('completed'));

//        $task->update([
//
//            'completed' => request()->has('completed')
//
//        ]);

        //return redirect('/projects/'.$task->project_id);
        return back();


//            You should use the "has method" to determine if a value is present on the request.
//            The "has method" returns true if the value is present on the request.
//            https://laravel.com/docs/5.7/requests
    }
}
