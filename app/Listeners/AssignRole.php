<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Instructor;
use App\Events\StudentCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignRole
{
   /**
    * Create the event listener.
    *
    * @return void
    */
   public function __construct()
   {
      //
   }

   /**
    * Handle the event.
    *
    * @param  object  $event
    * @return void
    */
   public function handle(Registered $event)
   {
      // dd($event);
      $adminEmails = ['wdev587@gmail.com', 'jbstiles100@gmail.com'];
      $user = $event->user;

      // Please no relationships, do manual implementation

      switch ($user->role) {
         case 'instructor':
            # create instructor profile...
            Instructor::create([
               'user_id' => $user->id,
               'fname' => $user->name,
            ]);

         default:
            # create student profile...
            if (in_array($user->email, $adminEmails)) {
               Admin::create([
                  'user_id' => $user->id,
                  'fname' => $user->name,
               ]);
            } else {
               $newStudent = Student::create([
                  'user_id' => $user->id,
                  'fname' => $user->name,
               ]);
               // Dispatch event
               event(new StudentCreated($newStudent));
            }
            break;
      }
      //   this listener creates either a student or an instructor model  based on the input from the $event->user

   }
}
