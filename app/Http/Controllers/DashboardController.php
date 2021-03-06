<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\EmployeeDetails;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        // echo Document::with('approvers.employee_details', 'creator')->get();
        // return;
       
        return view('dashboard')->with('documents', Document::with('approvers.employee_details', 'creator')->get())->with('approvers', EmployeeDetails::all());
    }
}
