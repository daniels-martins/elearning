<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LearningPreferenceController;

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

Route::get('/dashboard', function () {
   $this_route = ucwords(str_replace('_', ' ', basename(url()->current())));
   return view('dashboard', compact('this_route'));
})->middleware(['auth', 'verified'])->name('dashboard');

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

   Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

   // teaching preferences routes
   Route::get('/learning_style', [LearningPreferenceController::class, 'index'])->name('learning_preference.index');
});

require __DIR__ . '/auth.php';
