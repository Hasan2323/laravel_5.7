<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $project;

    // Most Important: any public property you specify here will be available within
    // the view [below markdown() i mean in project-created.blade.php file] you load.
    // so don't use any protected/private property.
    // for example

    public $foo = 'bar'; //this public property $foo can be accessible in project-created.blade.php file

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mail.project-created');
    }
}
