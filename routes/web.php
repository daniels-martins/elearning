<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\InstructorCourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome1');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    /*
   |--------------------------------------------------------------------------
   | Student Routes
   |--------------------------------------------------------------------------
   |
   */
    //  courses routes

    // hybrid route
    // register courses for a student or instructor
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

    // only Admins can add a course to the curriculum
    // you can't post to courses unless you're admin
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

    /*
   |--------------------------------------------------------------------------
   | Student Courses route
   |--------------------------------------------------------------------------
   */
    //   display all registered courses for a student
    Route::get('student/courses', [StudentCourseController::class, 'index'])->name('student_courses.index');

    // register a course for a student
    Route::post('student/courses', [StudentCourseController::class, 'store'])->name('student_courses.store');






    // learning preferences routes
    Route::get('/learning_style', [PreferenceController::class, 'index'])->name('learning_preference.index');

    // configure learning preferences
    Route::get('/learning_style/{preference}/edit', [PreferenceController::class, 'edit'])->name('learning_preference.edit');
    Route::patch('/learning_style/{preference}', [PreferenceController::class, 'update'])->name('learning_preference.update');



    /*
   |--------------------------------------------------------------------------
   | Instructor Routes
   |--------------------------------------------------------------------------
   |
   */


    // teaching preferences routes
    // none
    // configure teaching preferences
    // none


    #-------------------------------------------
    ######## For student administration ########
    #--------------------------------------------
    //    get the list of all students for an instructor
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');

    // show details for a particular student to an instructor
    Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');



    /*
   |--------------------------------------------------------------------------
   | Instructor Courses route
   |--------------------------------------------------------------------------
   */
    // display all registered courses for an instructor
    Route::get('instructor/courses', [InstructorCourseController::class, 'index'])->name('instructor_courses.index');

    // register a course under an instructor
    Route::post('instructor/courses', [InstructorCourseController::class, 'store'])->name('instructor_courses.store');
});

require __DIR__ . '/auth.php';
