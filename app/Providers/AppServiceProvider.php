<?php

namespace App\Providers;

use App\Models\Settings\Category;
use App\Models\Settings\Priority;
use App\Models\Settings\Project;
use App\Models\Settings\Status;
use App\Models\User;
use Exception;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       try{
           View::share('users', User::whereIsActive(true)->orderBy('name')->pluck('name', 'id')->toArray());
           View::share('projects', Project::orderBy('name')->pluck('name', 'id')->toArray());
       }catch (Exception $e){

       };
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
