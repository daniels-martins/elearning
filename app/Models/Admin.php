<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   use HasFactory;


   /**
    * this method returns the learning preference for a specific student
    * 
    * 
    */
   public function adminPreference()
   {
      return $this->hasOne(AdminPreference::class);
   }
}
