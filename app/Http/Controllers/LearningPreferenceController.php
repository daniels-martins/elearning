<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningPreference;
use Illuminate\Support\Facades\Schema;

class LearningPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //   format this route to be pretty
      $this_route = ucwords( str_replace('_', ' ', basename( url()->current() ) ) );

      $preference_iterator = Schema::getColumnListing('learning_preferences');

      // lets filter the iterator
      $outOfBounds = ['id', 'created_at', 'updated_at'];
      
      $preference_iterator = array_filter($preference_iterator,  fn ($value) => !in_array($value, $outOfBounds));


      return view('student.learning_style.index', compact('this_route', 'preference_iterator'));
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
     * @param  \App\Models\LearningPreference  $learningPreference
     * @return \Illuminate\Http\Response
     */
    public function show(LearningPreference $learningPreference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LearningPreference  $learningPreference
     * @return \Illuminate\Http\Response
     */
    public function edit(LearningPreference $learningPreference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LearningPreference  $learningPreference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LearningPreference $learningPreference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LearningPreference  $learningPreference
     * @return \Illuminate\Http\Response
     */
    public function destroy(LearningPreference $learningPreference)
    {
        //
    }
}
