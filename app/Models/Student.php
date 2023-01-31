<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

   // Relationships
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

   /**
    * this method returns the learning preference for a specific student
    */
   public function learningPreference()
   {
      return $this->hasOne(LearningPreference::class);
   }


   // presenter

   public function presentLearningPreference(string $db_col = null): string
   {

      // AI programming has begun .... alot of if statements bro
      // use a switch to determine the score level
      $thedb_col = $this->learningPreference[$db_col];
      // $thedb_col2 = $this->learningPreference;
      // dd($thedb_col2, 'fiufu');
      $final_sms = '';

      switch ($thedb_col) {
         case '0':
         case '1':
         case '2':
         case '3':
            $final_sms = 'does not like this learning mode';
            break;
         case '4':
         case '5':
         case '6':
            $final_sms = 'partially likes this learning mode';

            break;
         case '7':
         case '8':
            $final_sms = 'likes this learning mode';
            break;
         case '9':
         case '10':
            $final_sms = 'loves and enjoys this learning mode';
            break;

         default:
            # code...
            break;
      }

      // summary message for every learning preference
      return $item_summary = "$this->name $final_sms";
   }

}
