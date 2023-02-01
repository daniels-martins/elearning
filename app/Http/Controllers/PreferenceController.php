<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningPreference;
use Illuminate\Support\Facades\Auth;
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

        $preferences_array = $this->getFormattedPreferencesArray($preference_iterator);
      
        return view('student.learning_style.index', compact('preference_iterator', 'student', 'preferences_array'));
    }


    // helpers


    private function getFormattedPreferencesArray($preference_iterator)
    {
        $totalPrefVal = $this->getTotalPreferenceValue($preference_iterator);
        $preferences_array = [];
        foreach ($preference_iterator as $key => $value) {
            $prefVal = Auth::user()->preferences->$value;
            // get the percentage equivalent of each preference
            $prefValPercent = ($prefVal / $totalPrefVal) * 100;
            // round off to 2dp
            $preferences_array[$value] = round($prefValPercent, 1);
        }
        return $preferences_array;
    }
    /**
     * This function can return any value between 40 to 100, depending on user preference
     */
    private function getTotalPreferenceValue($preference_iterator)
    {
        $totalPrefVal = 0;
        foreach ($preference_iterator as $i) {
            // echo Auth::user()->preferences->$i . '<br>';
            $totalPrefVal += (int)Auth::user()->preferences->$i;
        }
        return  $totalPrefVal;
    }

    /**
     * This function should return 100 as in 100%
     */
    private function getTotalPreferenceValuePercentage($preference_iterator)
    {
        $totalPrefValPercentage = 0;
        $totalPrefVal = $this->getTotalPreferenceValue($preference_iterator);
        foreach ($preference_iterator as $i) {
            $prefVal =  Auth::user()->preferences->$i;
            $prefValPercent =  ($prefVal / $totalPrefVal) * 100;
            // echo $prefVal, ' ==> ', $prefValPercent, '<br>';
            $totalPrefValPercentage += $prefValPercent;
        }
        return $totalPrefValPercentage;
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
        $outOfBounds = ['id', 'student_id', 'created_at', 'updated_at'];


        // let's filter the iterator
        // these are fields that need message so as to make meaning to the user
        $needs_message = ['video', 'audio', 'text', 'practicals', 'theories', 'self_paced', 'instructor_led'];

        $preference_iterator = array_filter($preference_iterator_all_columns,  fn ($value) => !in_array($value, $outOfBounds));
        $student = !request()->user()->isLearner() ?: request()->user()->getStudent();

        return view('student.learning_style.edit', compact('preference_iterator', 'preference', 'needs_message'));
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
        //   dd($request->except(['_token', '_method']));
        $raw_requestData = $request->except(['_token', '_method']);
        $requestData = array();
        // filter away null values
        foreach ($raw_requestData as $key => $data)
            if (!empty($data))   $requestData[$key] = $data;
        // dd('hi', $requestData);
        if ($preference->update($requestData))
            return back()->with('success', 'preference-updated')->with('styling', 'success');
        return back()->with('success', 'preference-update-failed')->with('styling', 'danger');
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
