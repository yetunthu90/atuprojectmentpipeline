<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;

class JoinnowController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $payments= Payment::all();
        return view('join_now', compact('courses','payments'));
    }
}
