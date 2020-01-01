<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Events\ProjectCreated as ProjectCreatedForEvent;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');

        // two more options
        //  $this->middleware('auth')->only('create', 'index'); or $this->middleware('auth')->only(['create', 'index']);
        // $this->middleware('auth')->except('index','create'); or $this->middleware('auth')->except(['index','create']);

        $this->middleware('can:view,project')->only('show', 'edit');
    }

    public function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'max:100', 'min:3']
        ]);
    }

    public function index()
    {
        $records = auth()->user()->projects;

//  2   $records = Project::where('owner_id', auth()->id())->get(); //auth()->id() is going to give me null if the user is a guest or give me user_id if the user currently signed In.
        //$records = Project::where('owner_id', auth()->id())->take(2)->get();

//  1   $records = Project::latest()->get();


        return view('projects.index', ["records" => $records]);
    }

    public function create()
    {
        return view('Projects.create');
    }

    public function store()
    {
        $project = Project::create(
            $this->validateProject() + ['owner_id' => auth()->id()]
        );

//        OR
//        $validated = request()->validate([
//
////            'title' => 'required|min:3|max:8',  both are correct
//            'title' => ['required', 'min:4', 'max:7'],
//            'description' => 'required'
//
//        ]);

        // or $validated['owner_id'] = auth()->id();
//
//        Project::create($validated + ['owner_id' => auth()->id()]);

//        OR
//        $project = new Project();
//
//        $project->title = request('title');
//        $project->description = request('description');
//
//        $project->save();

        // Sending Mail process(rule no 1) in Controller
//        Mail::to($project->owner->email)->send(  //send() takes a little bit of times. to get rid of it, here you can use queue() in lieu of send()
//            new ProjectCreated($project)
//        );    this Mail portion moved to Project Model. Another process in ProjectCreated Event class.

        //event(new ProjectCreatedForEvent($project)); //this calling/announcement of an event portion can also be done by eloquent model.
        // this event() function is used to make an announcement throughout your entire system.
        // Now anywhere you can LISTEN for that event, hook in and respond any kind of side effect that you need.

        return redirect('/projects');
    }

    public function show(Project $project)
    {

 //       winner is 5 no, we will use it insha ALLAH.

//  for 5-8 , you need to create policy file


//    8    abort_unless(auth()->user()->can('view', $project), 403);
//    8   abort_if(auth()->user()->cannot('view', $project), 403);

//    7 no is using middleware('can:view,project'); in web.php file or __construct method in here.

//    6    abort_unless(\Gate::allows('view', $project), 403);
//    6    abort_if(\Gate::denies('view', $project), 403);

//   5 no
//       $this->authorize('view', $project);

//  4      abort_if(! auth()->user()->owns($project), 403); for this you must have to write owns() method in User Model.
        // OR
//  3      abort_unless(auth()->user()->owns($project), 403);
        // OR
//  2      abort_if($project->owner_id !== auth()->id(), 403);
        // OR
// 1       if($project->owner_id !== auth()->id()){
//            abort(403);
//        }



        //$project = Project::findOrFail($id);

        return view('projects.show', compact('project'));

    }

    public function edit(Project $project)
    {
//        $this->authorize('view', $project);

        //$project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));

    }

    public function update(Project $project)
    {
        $project->update($this->validateProject());

        // OR
//        $project->update(request(['title','description']));
        // OR
//        $project = Project::findOrFail($id);
//
//        $project->title = request('title');
//        $project->description = request('description');
//
//        $project->save();

        return redirect('/projects/'.$project->id);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        //Project::findOrFail($id)->delete();

        return redirect('/projects');

    }
}
