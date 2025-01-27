<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use App\Models\CustomerRequest;

class JoinnowController extends Controller
{
    public function enquiry_list()
    {
       // Fetch all courses
        $customerrequest = CustomerRequest::all();

        // Pass data to the index view
        return view('enquiry.index', compact('customerrequest'));
        // return view('courses.index');
    }

    public function index()
    {
        $courses = Course::all();
        $payments= Payment::all();
        return view('join_now', compact('courses','payments'));
    }
}
