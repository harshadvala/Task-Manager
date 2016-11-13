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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::resource('tasks', 'TaskController');
Route::put('tasks/task-complete/{task_id}', 'TaskController@updateTaskStatus');
Route::resource('users', 'UserController');
Route::resource('notes', 'NoteController');
Route::get('settings/projects', ['as'=> 'settings.projects.index', 'uses' => 'Settings\ProjectController@index']);
Route::post('settings/projects', ['as'=> 'settings.projects.store', 'uses' => 'Settings\ProjectController@store']);
Route::get('settings/projects/create', ['as'=> 'settings.projects.create', 'uses' => 'Settings\ProjectController@create']);
Route::put('settings/projects/{project}', ['as'=> 'settings.projects.update', 'uses' => 'Settings\ProjectController@update']);
Route::patch('settings/projects/{project}', ['as'=> 'settings.projects.update', 'uses' => 'Settings\ProjectController@update']);
Route::delete('settings/projects/{project}/delete', ['as'=> 'settings.projects.destroy', 'uses' => 'Settings\ProjectController@destroy']);
Route::get('settings/projects/{project}', ['as'=> 'settings.projects.show', 'uses' => 'Settings\ProjectController@show']);
Route::get('settings/projects/{project}/edit', ['as'=> 'settings.projects.edit', 'uses' => 'Settings\ProjectController@edit']);
