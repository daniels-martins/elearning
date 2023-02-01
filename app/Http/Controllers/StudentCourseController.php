<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource for this student
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->user()->isLearner()) {
            $courses = request()->user()->getStudent()->courses;
            return view('student.courses.index', compact('courses'));
        }
        dd('Student not found: No permission to view this page');
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
        $request->user()->isLearner() ? $authStudent  = $request->user()->getStudent() :  dd('student not found');

        // dd($request->all());
        $courses = Course::all();
        // attach course to student only
        // better solution
        // $duplicate = DB::table('course_student')->whereStudentId($authStudent->id)->whereCourseId($request->course)->count();

        // best solution
        $duplicate = $authStudent->courses->contains($request->course);

        if ($duplicate) {
            Session::flash('warning', 'Course already registered');
            return redirect()->route('courses.index')->with('courses', $courses);
        }
        // attach course to student. NB: attach() returns null by default when successful.
        $operation = $authStudent->courses()->attach($request->course);
        if ($operation !== null) {
            Session::flash('danger', 'Oops! Course registration failed');
            return redirect()->route('courses.index')->with('courses', $courses);
        }
        Session::flash('success', 'Course registered successfully');
        return redirect()->route('courses.index')->with('courses', $courses);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        // policy check
        $authStudent  = Auth::user()->getStudent();
        $policyCheck = $authStudent->courses->contains($course->id);
        $successful_unlink = $authStudent->courses()->detach($course->id); //detach() returns true;

        return ($policyCheck and $successful_unlink)
            ? back()->with('success', 'You have unregistered from this Course')
            : back()->with('error', 'Oops! Error occured. Try again');
    }
}
