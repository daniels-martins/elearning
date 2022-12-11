<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningPreference extends Model
{
   use HasFactory;

   protected $table = 'learning_preferences';



   // Relationships
   

   public function owner()
   {
      return $this->belongsTo(User::class);
   }

}
