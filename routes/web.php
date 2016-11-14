<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('tasks');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::resource('tasks', 'TaskController');
    Route::put('tasks/task-complete/{task_id}', 'TaskController@updateTaskStatus');
    Route::resource('users', 'UserController');
    Route::resource('notes', 'NoteController');

    Route::group(['prefix' => 'settings', 'namespace' => 'Settings'], function () {
        //PROJECT ROUTES
        Route::get('/projects', ['as' => 'settings.projects.index', 'uses' => 'ProjectController@index']);
        Route::post('/projects', ['as' => 'settings.projects.store', 'uses' => 'ProjectController@store']);
        Route::get('/projects/create', ['as' => 'settings.projects.create', 'uses' => 'ProjectController@create']);
        Route::put('/projects/{project}', ['as' => 'settings.projects.update', 'uses' => 'ProjectController@update']);
        Route::patch('/projects/{project}', ['as' => 'settings.projects.update', 'uses' => 'ProjectController@update']);
        Route::delete('/projects/{project}/delete', ['as' => 'settings.projects.destroy', 'uses' => 'ProjectController@destroy']);
        Route::get('/projects/{project}', ['as' => 'settings.projects.show', 'uses' => 'ProjectController@show']);
        Route::get('/projects/{project}/edit', ['as' => 'settings.projects.edit', 'uses' => 'ProjectController@edit']);
    });
});