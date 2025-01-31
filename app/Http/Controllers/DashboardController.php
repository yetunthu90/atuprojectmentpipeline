<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Course;
use App\Models\User;
use App\Models\CustomerRequest;

class DashboardController extends Controller
{
    public function index()
    {
        // Count total payment methods
        $totalPayments = Payment::count();

        // Count total courses
        $totalCourses = Course::count();

        // Count total users
        $totalUsers = User::count();

        // Count total enquiries
        $totalEnquiries = CustomerRequest::count();

        $Customer_request = CustomerRequest::all();

        // Pass data to the dashboard view
        return view('dashboard', compact('totalPayments', 'totalCourses', 'totalUsers', 'totalEnquiries' , 'Customer_request'));

    }

}
