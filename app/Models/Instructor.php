<?php

namespace App\Models;

use App\Models\TeachingPreference;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
   use HasFactory;

   protected $guarded = ['id'];


   // relationships
   /**
    * this method returns the learning preference for a specific student
    * 
    * 
    */
   public function teachingPreference()
   {
      return $this->hasOne(TeachingPreference::class);
   }



   public function courses(){
      return $this->hasMany(Course::class);
   }
}
