<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createCourses();
    }


   public function createCourses(){
      
      Course::create([
         'code' => 'CSC110',
         'title' => 'Introduction to Computing',
         'credits' => '3',
         'status' => 'core'
      ]);

      Course::create([
         'code' => 'MTH110',
         'title' => 'Algebra and Trigonometry',
         'credits' => '3',
         'status' => 'core'
      ]);

      Course::create([
         'code' => 'MTH112',
         'title' => 'Calculus',
         'credits' => '3',
         'status' => 'core'
      ]);

      Course::create([
         'code' => 'PHY111',
         'title' => 'Mechanics, Thermal Physics',
         'credits' => '3',
         'status' => 'core'
      ]);

      Course::create([
         'code' => 'PHY111',
         'title' => 'Mechanics, Thermal Physics',
         'credits' => '3',
         'status' => 'core'
      ]);

      Course::create([
         'code' => 'GST111',
         'title' => 'Use of English I',
         'credits' => '2',
         'status' => 'core'
      ]);

      
   }
}
