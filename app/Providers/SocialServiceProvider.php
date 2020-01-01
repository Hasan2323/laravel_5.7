<?php

namespace App\Providers;

use App\Services\Twitter;
use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton(Twitter::class, function (){
            return new Twitter(config('services.twitter.secret'));
        });

        $this->app->bind(
          \App\Repositories\UserRepositories::class,
          \App\Repositories\DbUserRepo::class
        );
    }
}
