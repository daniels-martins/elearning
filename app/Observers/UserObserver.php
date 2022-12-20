<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Instructor;

class UserObserver
{
   /**
    * Handle the User "created" event.
    *
    * @param  \App\Models\User  $user
    * @return void
    */
   public function created(User $user)
   {
      $adminEmails = ['wdev587@gmail.com', 'jbstiles100@gmail.com'];

      // step 1: 
      $step1 = $this->generateProfilesBasedOnRoles($user);

      if ($step1) $step2 = $this->setDefaultUserPreferences($user);
   }

   /**
    * Handle the User "updated" event.
    *
    * @param  \App\Models\User  $user
    * @return void
    */
   public function updated(User $user)
   {
      //
   }

   /**
    * Handle the User "deleted" event.
    *
    * @param  \App\Models\User  $user
    * @return void
    */
   public function deleted(User $user)
   {
      //delete the corresponding student data
      $relatedStudent  = Student::where('user_id', $user->id)->first();
      $relatedStudent->delete();
   }

   /**
    * Handle the User "restored" event.
    *
    * @param  \App\Models\User  $user
    * @return void
    */
   public function restored(User $user)
   {
      //
   }

   /**
    * Handle the User "force deleted" event.
    *
    * @param  \App\Models\User  $user
    * @return void
    */
   public function forceDeleted(User $user)
   {
      //
   }





   // helpers

   private function generateProfilesBasedOnRoles(User $user)
   {
      switch ($user->role) {
         case 'instructor':
            # create instructor profile...
            $newInstructor = Instructor::create([
               'user_id' => $user->id,
               'fname' => $user->name,
            ]);
            if ($newInstructor) return true;
            
         default:
            # create admin profile...
            if (in_array($user->email,['wdev587@gmail.com', 'jbstiles100@gmail.com'])) {
               $newAdmin = Admin::create([
                  'user_id' => $user->id,
                  'fname' => $user->name,
               ]);
               if ($newAdmin) return true;

               # create student profile...
            } else {
               $newStudent = Student::create([
                  'user_id' => $user->id,
                  'fname' => $user->name,
               ]);
               if ($newStudent) return true;
            }
            break;
      }
   }

   private  function setDefaultUserPreferences(User $user)
   {
      // step 2 add default preferences to every generated profile(eg. student, instructor, and admin)
      if ($user->preferences()->create()) //all are nullable fields
      {
         print("\n\n we did it, . $user->role . preferences created for this new  $user->role, but it is nullable though\n\n");
      }
   }
}
