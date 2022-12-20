<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningPreference;
use Illuminate\Support\Facades\Schema;

/**
 * This is the student preferences controller
 */
class PreferenceController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //   format this route to be pretty
      $preference_iterator_all_columns = Schema::getColumnListing('learning_preferences');


      // let's filter the iterator
      $outOfBounds = ['id', 'created_at', 'updated_at'];

      $preference_iterator = array_filter($preference_iterator_all_columns,  fn ($value) => !in_array($value, $outOfBounds));

      $student = !request()->user()->isLearner() ?: request()->user()->getStudent();

      return view('student.learning_style.index', compact('preference_iterator', 'student'));
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
    * @param  \App\Models\LearningPreference  $preference
    * @return \Illuminate\Http\Response
    */
   public function show(LearningPreference $preference)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\LearningPreference  $preference
    * @return \Illuminate\Http\Response
    */
   public function edit(LearningPreference $preference)
   {
      //   format this route to be pretty
      $preference_iterator_all_columns = Schema::getColumnListing('learning_preferences');

      // let's filter the iterator
      $outOfBounds = ['id', 'created_at', 'updated_at'];

      
      // let's filter the iterator
      // these are fields that need message so as to make meaning to the user
      $needs_message = ['video', 'audio', 'text', 'practicals', 'theories', 'self_paced', 'instructor_led'];

      $preference_iterator = array_filter($preference_iterator_all_columns,  fn ($value) => !in_array($value, $outOfBounds));

      return view('student.learning_style.edit', compact('preference_iterator', 'preference', 'needs_message'));
      dd('lets edit this authUser preference');
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\LearningPreference  $preference
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, LearningPreference $preference)
   {
      // dd($request->except(['_token', '_method']));
      $raw_requestData = $request->except(['_token', '_method']);
      $requestData = array();
      // remove null values
      foreach ($raw_requestData as $key => $data)
         if (!empty($data))   $requestData[$key] = $data;
      if ($preference->update($requestData))
         return back()->with('status', 'preference-updated')->with('styling', 'success');
      return back()->with('status', 'preference-update-failed')->with('styling', 'danger');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\LearningPreference  $preference
    * @return \Illuminate\Http\Response
    */
   public function destroy(LearningPreference $preference)
   {
      //
   }
}
