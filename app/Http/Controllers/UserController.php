<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
    //    Fetch all User by desc oder
        $Users = User::orderBy('created_at', 'DESC')->get();

        // Pass data to the index view
        return view('users.index',compact('Users'));
        
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
          
        $users = new User();
        $users->first_name = $request->first_name;
        $users->last_name  = $request->last_name;
        $users->email      = $request->email;
        $users->password   = Hash::make($request->password);
        if ($users->save()) {
             return redirect()->route('users')->with('success', 'User Added Successfully!');
        }
            else{
                return redirect()->route('users')->with('error', 'Failed to add User!');
            }
    }
    public function edit($id)
    {
        $User = User::findOrFail($id);
        return view('users.edit', compact('User'));
    }
    public function update(Request $request, $id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id), // Ignore the current user's email
            ],
            'password' => 'sometimes|string|min:8',
        ]);

        // Update the user
        $user->update($request->only(['first_name', 'last_name', 'email', 'password']));

        return redirect()->route('users')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully.');
    }
    public function show($id)
    {
        $user = User::findOrFail($id); // Fetch the course data by ID
        return view('users.show', compact('user'));
    }
}
