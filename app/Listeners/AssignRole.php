<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Instructor;
use App\Events\AdminCreated;
use App\Events\StudentCreated;
use App\Events\InstructorCreated;
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
      // {udo} will work on this later, all of them events need to be created
      switch ($user->role) {
         case 'instructor':
            # create instructor profile...
            $newInstructor = Instructor::create([
               'user_id' => $user->id,
               'fname' => $user->name,
            ]);
            event(new InstructorCreated($newInstructor));   // Dispatch event
         default:
            # create student profile...
            if (in_array($user->email, $adminEmails)) {
               $newAdmin = Admin::create([
                  'user_id' => $user->id,
                  'fname' => $user->name,
               ]);
               event(new AdminCreated($newAdmin));   // Dispatch event

            } else {
               $newStudent = Student::create([
                  'user_id' => $user->id,
                  'fname' => $user->name,
               ]);
            }
            break;
      }
      //   this listener creates either a student or an instructor model  based on the input from the $event->user

   }
}
