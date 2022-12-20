<?php

namespace App\Observers;

use App\Models\Course;
use App\Models\Instructor;

class InstructorObserver
{
   /**
    * Handle the Instructor "created" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
   public function created(Instructor $instructor)
   {
      //Systematically assign a course to the new instructor
      $sms =  $this->assignCourse($instructor)
         ? 'New Instructor has been assigned a new course'
         : 'Error occured while assigning course to new instructor';

      print($sms. "\n\n");
   }

   /**
    * Handle the Instructor "updated" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
   public function updated(Instructor $instructor)
   {
      //
   }

   /**
    * Handle the Instructor "deleted" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
   public function deleted(Instructor $instructor)
   {
      //
   }

   /**
    * Handle the Instructor "restored" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
   public function restored(Instructor $instructor)
   {
      //
   }

   /**
    * Handle the Instructor "force deleted" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
   public function forceDeleted(Instructor $instructor)
   {
      //
   }










   // helpers


   public function assignCourse(Instructor $instructor): Course
   {
      $availableCourse = Course::whereNull('instructor_id')->first();
      return $instructor->courses()->save($availableCourse);
   }
}
