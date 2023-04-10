<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class StudentController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $students = Student::all();
      return view('instructor.students.index', compact('students'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
   public function show(Student $student)
   {
      $preference_iterator_all_columns = Schema::getColumnListing('learning_preferences');


      // let's filter the iterator
      $outOfBounds = ['id', 'created_at', 'updated_at'];

      $preference_iterator = array_filter($preference_iterator_all_columns,  fn ($value) => !in_array($value, $outOfBounds));
      // dd($student);
      return view('instructor.students.show', compact('preference_iterator', 'student'));

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
   public function edit(Student $student)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Student $student)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
   public function destroy(Student $student)
   {
      //
   }
}
