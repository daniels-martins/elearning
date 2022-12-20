<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PreferenceController;

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
   Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

   // teaching preferences routes
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
  Route::get('/student', [StudentController::class, 'index'])->name('student.index');
  Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');

});

require __DIR__ . '/auth.php';
