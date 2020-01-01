<?php

namespace App;

use App\Mail\ProjectCreated;
use App\Events\ProjectCreated as ProjectCreatedEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
//    protected $fillable = [
//      'title', 'description'
//    ];

    protected $guarded = [];

/*    sending Mail (process no 3) by Event & listener class by App\Events\ProjectCreated.php

New Section: This is sending Mail process(rule no 2) by Model hooks into Events
    public static function boot()
    {
        parent::boot();

        static::created(function ($project){    //this method will occur automatically when a new Model/Project is created.
           Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
           );
        });

        you can also use the following method if you need to do any additional task when a Project is updated/Deleted etc.

        static::updated(function ($project){ this method will occur automatically when a new Model/Project is updated.

        });

        static::deleted(function ($project){ this method will occur automatically when a new Model/Project is deleted.

        });

    }
*/

// New Section: Calling or announcement of an event by Eloquent model

    // Eloquent automatically fired its own event when a project is created.
    // We just need to link or dispatch it with the App\Events\ProjectCreated event.

    protected $dispatchesEvents = [
        'created' => ProjectCreatedEvent::class
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()  //whenever we call it..we have to call it like a property. i.e App\Project::first()->tasks instead of tasks();
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($description)
    {
        $this->tasks()->create($description);

//        return Task::create([
//           'project_id' => $this->id,
//           'description' => $description['description']
//        ]);
    }

}
