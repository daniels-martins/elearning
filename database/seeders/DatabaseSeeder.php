<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
      // \App\Models\User::factory(10)->create();
      $this->good();
   }

   public function good()
   {
      // external
      $this->call(CourseSeeder::class);
      
      $this->createUserForStudent();
      $this->createUserForInstructor();
      $this->createUserForAdmin();
      
      
   }


   private function createUserForStudent()
   {
      $user = \App\Models\User::factory()->create([
         'name' => 'test_student',
         'email' => 'test@student.com',
         'role' => 'student',
         'password' => Hash::make('password'),
      ]);
   }

   private function createUserForInstructor()
   {
      $user = \App\Models\User::factory()->create([
         'name' => 'test_instructor',
         'email' => 'test@instructor.com',
         'role' => 'instructor',
         'password' => Hash::make('password'),
      ]);
   }


   private function createUserForAdmin()
   {
      $user = \App\Models\User::factory()->create([
         'name' => 'test_admin',
         'email' => 'wdev587@gmail.com',
         'role' => 'admin',
         'password' => Hash::make('password'),
      ]);
   }
}
