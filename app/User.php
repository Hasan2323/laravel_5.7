<?php

namespace App;

use App\Events\UserCreated;
use App\Notifications\WelcomeRegisteredUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        'created' => UserCreated::class
    ];

/*
    public static function boot()
    {
        parent::boot();

        static::created(function ($user){
            $user->notify(new WelcomeRegisteredUser($user));
        });
    }

*/

    public function owns($project)
    {
        return $project->owner_id == $this->id;
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'owner_id'); // in this method, 2nd parameter is foreignKey
    }
}
