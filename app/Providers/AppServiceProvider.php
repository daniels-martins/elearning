<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Student;
use App\Models\Instructor;
use App\Observers\UserObserver;
use App\Observers\StudentObserver;
use App\Observers\InstructorObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      // for observers
      User::observe(UserObserver::class);//this is the only thing that works
      Instructor::observe(InstructorObserver::class);
      
      // Student::observe(StudentObserver::class);//redundant
    }
}
