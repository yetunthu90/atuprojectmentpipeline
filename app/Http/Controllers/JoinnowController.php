<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class JoinnowController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('join_now', compact('courses'));
    }
}
