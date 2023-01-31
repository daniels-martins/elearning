<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {

        if (request()->user()->isAdmin()) {
            return view('dashboard3');
        }
        if (request()->user()->isTeacher()) {
            return view('dashboard2');
        }
        // default config is for learner (request()->user()->isLearner())
        $full_sms = $this->generateStudentProfileSummary();

        return view('dashboard', compact('full_sms'));
    }

    private function generateStudentProfileSummary()
    {
        $rand = rand(2, 5);
        $sms = '';
        switch ($rand) {
            case (1):
                $sms = 'I sincerely doubt you will make it in this institution'; //highly duobtful
                break;

            case (2):
                $sms = 'I sincerely doubt you will make it in this institution'; //doubtful
                break;

            case (3):
                $sms = 'I Hope you buckle up in time, so as to make it in this institution'; //average
                break;

            case (4):
                $sms = "You're doing a good job, keep it up and you will make it in this institution"; //keep it up
                break;

            case (5):
                $sms = "Now that's what a nerd looks like"; //excellent
                break;

            default:
        }
        $random_gpa = $rand > 1 ? $rand  * 0.98   :  $rand * 1.1;
         return $full_sms = ucfirst(auth()->user()->name) . ", $sms, " . 'with an average GPA of ' . $random_gpa;

    }

    # code...
}
