<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //   return 'the courses page';
      $this_route = ucwords(str_replace('_', ' ', basename(url()->current())));
      return view('student.courses.index', compact('this_route'));
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
    * @param  \App\Models\Course  $course
    * @return \Illuminate\Http\Response
    */
   public function show(Course $course)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Course  $course
    * @return \Illuminate\Http\Response
    */
   public function edit(Course $course)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Course  $course
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Course $course)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Course  $course
    * @return \Illuminate\Http\Response
    */
   public function destroy(Course $course)
   {
      //
   }
}
