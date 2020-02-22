<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/session', function (\Illuminate\Http\Request $request){

    // difference b2in flash and session
    // flash a data just 1 bar er jonno thake. Page load hole data gayeb.
    // and session ta data gula theke jai..

    // rule 2
    $request->session()->put('name', 'Hasan');

    return $request->session()->get('name', 'default value');

    // rule 1
    //session(['name' => 'Hasan']);
    //session()->forget('name');

    //return session('name','default value');

});

//Route::get('/', function (){
//   return view('welcome');
//});

Route::get('/', 'ServiceContainerController@show');
Route::get('/interface', 'ServiceContainerController@intface');

//Routes for PagesController

//Route::get('/', 'PagesController@home');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');
Route::get('/culture', 'PagesController@culture');

//Routes for ProjectsController
// 7 line vs 1 line

//Route::get('/projects', 'ProjectsController@index');
//Route::get('/projects/create', 'ProjectsController@create');
//Route::post('/projects', 'ProjectsController@store');
//Route::get('/projects/{project}', 'ProjectsController@show');
//Route::get('/projects/{project}/edit', 'ProjectsController@edit');
//Route::patch('/projects/{project}', 'ProjectsController@update');
//Route::delete('/projects/{project}', 'ProjectsController@destroy');

// or

Route::resource('projects', 'ProjectsController');

//Route::resource('projects', 'ProjectsController')->middleware('can:view,project');
//   logged in user 'can' 'view' the 'project' and
// 'project' word must be similar to route parameter(in 2nd bracket) i.e Route::get('/projects/{project}', '');


//Routes for tasks

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
