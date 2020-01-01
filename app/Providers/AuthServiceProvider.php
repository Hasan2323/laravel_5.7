<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Project' => 'App\Policies\ProjectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            if($user->id == 3){ //this is an admin ID.
                return true;
            }
        });

//        use below code, you have to do two thing.
//        at first edit 25 no line like this way> boot(Gate $gate)
//        then put this line on the top of this page> use Illuminate\Contracts\Auth\Access\Gate;

//        $gate->before(function ($user){
//           if ($user->id == 3){ //this is an admin ID.
//               return true;
//           }
//        });
    }
}
