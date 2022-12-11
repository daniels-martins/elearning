<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'name',
      'email',
      'role',
      'password',
   ];


   /**
    * Check if the user is a student or learner
    */
   public function isLearner(User $user)
   {
      return $user->role == 'student';
   }

   /**
    * Check if the user is an instructor or teacher
    */
   public function isTeacher(User $user)
   {
      return $user->role == 'instructor';
   }

   /**
    * Check if the user is an admin
    */
   public function isAdmin(User $user)
   {
      return $user->role == 'admin';
   }


   // Relationships

   public function learningPreference()
   {
      return $this->hasOne(LearningPreference::class);
   }




   // presenter

   public function presentLearningPreference(string $param): string
   {

      // AI programming has begun .... alot of if statements bro
      // use a switch to determine the score level
      $theparam = $this->learningPreference[$param];
      $final_sms = '';
      switch ($theparam) {
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

      return $item_summary = "$this->name $final_sms";
   }




























































   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password',
      'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
      'email_verified_at' => 'datetime',
   ];
}
