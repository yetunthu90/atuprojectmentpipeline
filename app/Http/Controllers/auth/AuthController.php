<?php

namespace App\Http\Controllers\auth;

use App\Mail\PasswordResetMail; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{  
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
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
             return redirect()->route('login')->with('success', 'Account created successfully!');
        }
            else{
                return redirect()->route('registeration')->with('error', 'Failed to create account!');
            }
    }
    public function login()
    {
      
        return view('auth.login');
    }
    

    public function dologin(Request $request)
    {
        $input=['email'=>request('email'),'password'=>request('password')];
        if(auth()->attempt($input)){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login')->with('message','Login is Invalid');
            }
        }
    public function forgotPassword(){
        return view('auth.forgot-password');
    }
    public function doForgotPassword(){
        
        $users= User::where('email',request('email'))->first();
        $token = Str::random(120);
        $users->update(['password_reset_token'=>$token]);
        Mail::to(request('email'))->send(new PasswordResetMail($users,$token));
        return $token;

    }

}
