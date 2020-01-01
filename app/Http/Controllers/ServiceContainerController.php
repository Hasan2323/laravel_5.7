<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositories;
use App\Services\Twitter;
use Illuminate\Http\Request;

class ServiceContainerController extends Controller
{

    public function show(Twitter $twitter)
    {
        //$twitter = app('twitter');

        dd($twitter);
    }

    public function intface(UserRepositories $userRepositories)
    {
        dd($userRepositories->create('Hola'));
    }
}
