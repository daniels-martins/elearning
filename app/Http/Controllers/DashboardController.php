<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {
      if (request()->user()->isLearner()) {
         return view('dashboard');
      }
      
      if (request()->user()->isTeacher()) {
         return view('dashboard2');
      }
      
      # code...
    }

}
