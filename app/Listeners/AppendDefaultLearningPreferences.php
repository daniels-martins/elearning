<?php

namespace App\Listeners;

use App\Models\Student;
use App\Events\StudentCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppendDefaultLearningPreferences
{


   /**
    * Create the event listener.
    *
    * @return void
    */

   public function __construct()
   {
   }

   /**
    * Handle the event.
    *
    * @param  object  $event
    * @return void
    */
   public function handle(StudentCreated $event)
   {
      // dd('oly');
      dd($event);
      // $user = $event->student;
      // $user->learningPreference()->create(); //all are nullable fields
   }
}
