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
        $customerRequests = CustomerRequest::with(['course', 'payment'])->get();
        return view('enquiry.index', compact('customerRequests'));
    }

    public function index()
    {
        $courses = Course::all();
        $payments= Payment::all();
        return view('join_now', compact('courses','payments'));
    }
}
