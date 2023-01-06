<?php

namespace App\Models;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeachingPreference extends Model
{
   use HasFactory;

   protected $table = 'teaching_preferences';

   protected $guarded = ['id', 'student_id', 'user_id'];

   public function instructor()
   {
      return $this->belongsTo(Instructor::class);
   }
}
