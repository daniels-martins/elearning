<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LearningPreference extends Model
{
   use HasFactory;

   protected $table = 'learning_preferences';

   protected $guarded = ['id', 'student_id', 'user_id'];

   // Relationships
   

   public function owner()
   {
      return $this->belongsTo(Student::class);
   }

}
