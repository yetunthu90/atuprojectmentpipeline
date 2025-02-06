<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
       // Fetch all courses
        $courses = Course::all();
        $loggedInUser = auth()->user();
        // Pass data to the index view
        return view('courses.index', compact('courses','loggedInUser'));
        // return view('courses.index');
    }
    public function create()
    {
        return view('courses.create');
    }
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'course_name' => 'required|unique:courses,course_name|max:255',  // Ensure course name is unique
            'duration' => 'required|integer',
            'start_date' => 'required|date|after_or_equal:today',  // Start date must be today or in the future
            'end_date' => 'required|date|after:start_date',  // End date must be after the start date
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string|max:1000',  // Optional: Set a max length for description

        ]);
         // Create the course using the validated data
        Course::create([
            'course_name' => $request->course_name,
            'duration' => $request->duration,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect()->route('courses')->with('success', 'Course created successfully.');
    }
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required',
            'duration' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('courses')->with('success', 'Course updated successfully.');
    }
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses')->with('success', 'Course deleted successfully.');
    }
    public function show($id)
    {
        $course = Course::findOrFail($id); // Fetch the course data by ID
        return view('courses.show', compact('course'));
    }

    public function courselist()
    {
       
        return 'hiii';
    }

}
